<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\ModelImgPro;
use Illuminate\Support\Facades\DB;
use File;

class ModelProduct extends Model
{
    protected $table='product';
    protected $fillable = [
        'id', 'name', 'price', 'preview', 'detail', 'keywords', 'description', 'title', 'slug', 'count_like', 'count_view', 'status', 'date_create', 'count_cm', 'tag', 'id_user', 'picture', 'id_cate'
    ];
    public $timestamps=false;

    public function getItems($number){
    	return ModelProduct::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItemsAll(){
        return ModelProduct::select('*')->orderBy('id', 'desc')->get();
    }

    public function getItem($id){
        return ModelProduct::find($id);
    }

    public function getItemsByCate($idCate, $number){
        return ModelProduct::select('*')->where('id_cate', $idCate)->orderBy('id', 'desc')->paginate($number);
    }

    public function getItemsRand($number){
        return ModelProduct::select('*')->orderBy('id', 'RAND()')->paginate($number);
    }

    public function addItem($request){
    	$Pro=new ModelProduct;
    	$file_name='not_img.jpg';
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Pro->name=$request->name;
        $Pro->price=$request->price;
        $Pro->preview=$request->preview;
        $Pro->detail=$request->detail;
        $Pro->keywords=$request->keywords;
        $Pro->description=$request->description;
        $Pro->title=$request->title;
        $Pro->slug="";
        $Pro->count_like=0;
        $Pro->count_view=0;
        $Pro->status=1;
        $Pro->date_create=Carbon::now();
        $Pro->count_cm=0;
        $Pro->tag=$request->tag;
        $Pro->id_user=1;
        // $Pro->id_user=Auth::user()->id;
        $Pro->picture=$file_name;
        $Pro->id_cate=$request->id_cate;
        $Pro->save();
    	$Pro->slug=str_slug($request->name)."-".$Pro->id;
        if ($request->id_img!=null) {
            $arr_img=[];
            foreach ($request->id_img as $value) {
                $file_name1 = $value->getClientOriginalName();
                $file_name1=change_name($file_name1);
                $value->move('resources/upload/imgpro', $file_name1);
                array_push($arr_img, ['picture'=>$file_name1, 'id_pro'=>$Pro->id]);
            }
            DB::table('img_pro')->insert($arr_img);
        }
    	return $Pro->save();
    }

    public function editItem($id, $request){
        $Pro=ModelProduct::find($id);
        $file_name=$Pro['picture'];
        if($request->picture != null){
            File::delete('resources/upload/'.$Pro->picture);
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Pro->name=$request->name;
        $Pro->price=$request->price;
        $Pro->preview=$request->preview;
        $Pro->detail=$request->detail;
        $Pro->keywords=$request->keywords;
        $Pro->description=$request->description;
        $Pro->title=$request->title;
        $Pro->tag=$request->tag;
        // $Pro->id_user=Auth::user()->id;
        $Pro->picture=$file_name;
        $Pro->id_cate=$request->id_cate;
        $Pro->slug=str_slug($request->name)."-".$Pro->id;
            if ($request->id_img!=null) {
            $arr_img=[];
            foreach ($request->id_img as $value) {
                $file_name1 = $value->getClientOriginalName();
                $file_name1=change_name($file_name1);
                $value->move('resources/upload/imgpro', $file_name1);
                array_push($arr_img, ['picture'=>$file_name1, 'id_pro'=>$Pro->id]);
            }
            DB::table('img_pro')->insert($arr_img);
        }
        $Pro->save();
        return $Pro->save();
    }

    public function delItem($id){
        $Pro=ModelProduct::find($id);
        if ($Pro!=null) {
            return $Pro->delete();
        }else{
            return 0;
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;

class ModelPost extends Model
{
    protected $table='post';
    protected $fillable = [
        'id', 'id_user', 'name', 'id_cate', 'picture', 'preview', 'detail', 'count_like', 'count_view', 'date_create', 'status', 'title', 'keywords', 'description', 'slug', 'count_cm', 'tag'
    ];
    public $timestamps=false;

    public function getItems($number){
    	return ModelPost::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItem($id){
    	return ModelPost::find($id);
    }

    public function getItemsByCate($idCate, $number){
        return ModelPost::select('*')->where('id_cate', $idCate)->orderBy('id', 'desc')->paginate($number);
    }

    public function getItemsRand($number){
        return ModelPost::select('*')->orderBy('id', 'RAND()')->paginate($number);
    }

    public function addItem($request){
    	$Post=new ModelPost;
    	$file_name='not_img.jpg';
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Post->name=$request->name;
        $Post->preview=$request->preview;
        $Post->detail=$request->detail;
        $Post->keywords=$request->keywords;
        $Post->description=$request->description;
        $Post->title=$request->title;
        $Post->slug="";
        $Post->count_like=0;
        $Post->count_view=0;
        $Post->status=1;
        $Post->date_create=Carbon::now();
        $Post->count_cm=0;
        $Post->tag=$request->tag;
        $Post->id_user=1;
        // $Pro->id_user=Auth::user()->id;
        $Post->picture=$file_name;
        $Post->id_cate=$request->id_cate;
        $Post->save();
    	$Post->slug=str_slug($request->name)."-".$Post->id;
    	return $Post->save();
    }

    public function editItem($id, $request){
    	$Post=ModelPost::find($id);
    	$file_name=$Post->picture;
        if($request->picture != null){
            File::delete('resources/upload/'.$file_name);
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Post->name=$request->name;
        $Post->preview=$request->preview;
        $Post->detail=$request->detail;
        $Post->keywords=$request->keywords;
        $Post->description=$request->description;
        $Post->title=$request->title;
        $Post->tag=$request->tag;
        $Post->picture=$file_name;
        $Post->id_cate=$request->id_cate;
    	$Post->slug=str_slug($request->name)."-".$Post->id;
    	return $Post->save();
    }

    public function delItem($id){
    	$Post=ModelPost::find($id);
    	if ($Post!=null) {
            File::delete('resources/upload/'.$Post->picture);
    		return $Post->delete();
    	}else{
    		return 0;
    	}
    }
}

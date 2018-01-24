<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;

class ModelCatePost extends Model
{
    protected $table='cate_posts';
    protected $fillable = [
        'id', 'name', 'picture', 'preview', 'status', 'title', 'keywords', 'description', 'slug', 'date_create'
    ];
    public $timestamps=false;

    public function getItemsAll(){
    	return ModelCatePost::select('*')->get();
    }

    public function getItems($number){
    	return ModelCatePost::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItem($id){
    	return ModelCatePost::find($id);
    }

    public function addItem($request){
    	$Cate=new ModelCatePost;
        $file_name='not_img.jpg';
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
    	$Cate->name=$request->name;
        $Cate->picture=$file_name;
        $Cate->preview=$request->preview;
    	$Cate->status=1;
    	$Cate->title=$request->title;
    	$Cate->keywords=$request->keywords;
    	$Cate->description=$request->description;
    	$Cate->slug="";
    	$Cate->date_create=Carbon::now();
    	$Cate->save();
    	$Cate->slug=str_slug($request->name)."-".$Cate->id;
    	return $Cate->save();
    }

    public function editItem($id, $request){
    	$Cate=ModelCatePost::find($id);
        $file_name=$Cate->picture;
        if($request->picture != null){
            File::delete('resources/upload/'.$file_name);
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Cate->name=$request->name;
        $Cate->picture=$file_name;
    	$Cate->preview=$request->preview;
    	$Cate->title=$request->title;
    	$Cate->keywords=$request->keywords;
    	$Cate->description=$request->description;
    	$Cate->slug=str_slug($request->name)."-".$Cate->id;
    	return $Cate->save();
    }

    public function delItem($id){
    	$Cate=ModelCatePost::find($id);
    	if ($Cate!=null) {
            File::delete('resources/upload/'.$Cate->picture);
    		return $Cate->delete();
    	}else{
    		return 0;
    	}
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;

class ModelCategory extends Model
{
    
    protected $table='category';
    protected $fillable = [
        'id', 'name', 'preview', 'date_create', 'slug', 'keywords', 'description', 'title', 'status', 'picture'
    ];
    public $timestamps=false;

    public function getItemsAll(){
        return ModelCategory::select('*')->get();
    }

    public function getItems($number){
    	return ModelCategory::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItem($id){
    	return ModelCategory::find($id);
    }

    public function addItem($request){
    	$Cate=new ModelCategory;
    	$file_name='not_img.jpg';
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
    	$Cate->name=$request->name;
        $Cate->preview=$request->preview;
    	$Cate->keywords=$request->keywords;
    	$Cate->description=$request->description;
    	$Cate->title=$request->title;
    	$Cate->status=1;
    	$Cate->date_create=Carbon::now();
    	$Cate->picture=$file_name;
    	$Cate->slug="";
    	$Cate->save();
    	$Cate->slug=str_slug($request->name)."-".$Cate->id;
    	return $Cate->save();
    }

    public function editItem($id, $request){
    	$Cate=ModelCategory::find($id);
    	$file_name=$Cate->picture;
        if($request->picture != null){
            File::delete('resources/upload/'.$file_name);
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
    	$Cate->name=$request->name;
        $Cate->preview=$request->preview;
    	$Cate->keywords=$request->keywords;
    	$Cate->description=$request->description;
    	$Cate->title=$request->title;
    	$Cate->picture=$file_name;
    	$Cate->slug=str_slug($request->name)."-".$Cate->id;
    	return $Cate->save();
    }

    public function delItem($id){
    	$Cate=ModelCategory::find($id);
    	if ($Cate!=null) {
            File::delete('resources/upload/'.$Cate->picture);
    		return $Cate->delete();
    	}else{
    		return 0;
    	}
    }
}

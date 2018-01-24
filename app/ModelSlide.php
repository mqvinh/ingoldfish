<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ModelSlide extends Model
{
    protected $table='slide';
    protected $fillable = [
        'id', 'name', 'preview', 'picture', 'date_create', 'status'
    ];
    public $timestamps=false;

    public function getItems($number){
    	return ModelSlide::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItemsAll(){
        return ModelSlide::select('*')->orderBy('id', 'desc')->get();
    }

    public function getItem($id){
    	return ModelSlide::find($id);
    }

    public function addItem($request){
    	$Slide=new ModelSlide;
    	$file_name='not_img.jpg';
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Slide->name=$request->name;
        $Slide->preview=$request->preview;
        $Slide->picture=$file_name;
        $Slide->date_create=Carbon::now();
        $Slide->status=1;
        return $Slide->save();
    }

    public function editItem($id, $request){
    	$Slide=ModelSlide::find($id);
    	$file_name=$Slide->picture;
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $Slide->name=$request->name;
        $Slide->preview=$request->preview;
        $Slide->picture=$file_name;
        return $Slide->save();
    }

    public function delItem($id){
    	$Slide = ModelSlide::find($id);
    	if ($Slide!=null) {
    		return $Slide->delete();
    	}else{
    		return 0;
    	}
    }
}

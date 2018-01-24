<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Request;
use App\ModelSlide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    public function getIndex(){
    	$Mslide=new ModelSlide;
    	$lSlide=$Mslide->getItems(10);
    	$active="slide";
    	return view('adgoldfish185.slide.index', compact(['active', 'lSlide']));
    }

    public function getAdd(){
    	$active="slide";
    	return view('adgoldfish185.slide.add', compact(['active']));
    }

    public function postAdd(SlideRequest $request){
    	$Mslide=new ModelSlide;
    	if ($Mslide->addItem($request)==1) {
    		return redirect()->route('adgoldfish185.slide.getIndex')->with(['add_ms'=>'Thêm thành công']);
    	}
    	return redirect()->route('adgoldfish185.slide.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getEdit($id){
    	$Mslide=new ModelSlide;
    	$Slide=$Mslide->getItem($id);
    	$active="slide";
    	return view('adgoldfish185.slide.edit', compact(['active', 'Slide']));
    }

    public function postEdit($id, SlideRequest $request){
    	$Mslide=new ModelSlide;
    	if ($Mslide->editItem($id, $request)==1) {
    		return redirect()->route('adgoldfish185.slide.getIndex')->with(['edit_ms'=>'Sửa thành công']);
    	}
    	return redirect()->route('adgoldfish185.slide.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getDel($id){
    	$Mslide=new ModelSlide;
    	if ($Mslide->delItem($id)==1) {
    		return redirect()->route('adgoldfish185.slide.getIndex')->with(['del_ms'=>'Xóa thành công']);
    	}
    	return redirect()->route('adgoldfish185.slide.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getActive(){
        if (Request::ajax()) {
            $id=Request::get('aid');
            $Mslide=new ModelSlide;
            $Slide=$Mslide->getItem($id);
            if($Slide->status==1){
                $Slide->status=0;
            }else{
                $Slide->status=1;
            }
            $Slide->save();
            return "oke";
        }
    }
}

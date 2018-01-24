<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
use App\ModelPost;
use App\ModelCatePost;

use App\Http\Requests\PostRequest;
use App\Http\Requests\CatePostRequest;

class PostController extends Controller
{
    private $Mpost;
    private $Mcate;
    public function __construct()
    {
        $this->Mpost = new ModelPost;
        $this->Mcate = new ModelCatePost;
    }

    //post
    public function getIndex(){
    	$PostC=new PostController;
    	$lPost=$PostC->Mpost->getItems(10);
        $lCate=$PostC->Mcate->getItemsAll();
    	$active="post";
    	$activei="post";
    	return view('adgoldfish185.post.index', compact(['active', 'activei', 'lPost', 'lCate']));
    }

    public function getAdd(){
    	$PostC=new PostController;
    	$lCate=$PostC->Mcate->getItemsAll();
    	$active="post";
    	$activei="post";
    	return view('adgoldfish185.post.add', compact(['active', 'activei', 'lCate']));
    }

    public function postAdd(PostRequest $request){
    	$PostC=new PostController;
    	if ($PostC->Mpost->addItem($request)==1) {
    		return redirect()->route('adgoldfish185.post.getIndex')->with(['add_ms'=>'Thêm thành công']);
    	}
    	return redirect()->route('adgoldfish185.post.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getEdit($id){
        $PostC=new PostController;
        $Post=$PostC->Mpost->getItem($id);
        $lCate=$PostC->Mcate->getItemsAll();
        $active="post";
        $activei="post";
        return view('adgoldfish185.post.edit', compact(['active', 'activei', 'Post', 'lCate']));
    }

    public function postEdit($id, PostRequest $request){
        $PostC=new PostController;
        if ($PostC->Mpost->editItem($id, $request)) {
            return redirect()->route('adgoldfish185.post.getIndex')->with(['edit_ms'=>'Sửa thành công']);
        }
        return redirect()->route('adgoldfish185.post.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getDel($id){
        $PostC=new PostController;
        if ($PostC->Mpost->delItem($id)) {
            return redirect()->route('adgoldfish185.post.getIndex')->with(['del_ms'=>'Xóa thành công']);
        }
        return redirect()->route('adgoldfish185.post.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getActive(){
        if (Request::ajax()) {
            $id=Request::get('aid');
            $PostC=new PostController;
            $Post=$PostC->Mpost->getItem($id);
            if($Post->status==1){
                $Post->status=0;
            }else{
                $Post->status=1;
            }
            $Post->save();
            return "oke";
        }
    }

    //cate
    public function getIndexCate(){
    	$PostC=new PostController;
    	$lCate=$PostC->Mcate->getItems(10);
    	$active='post';
    	$activei="catePost";
    	return view('adgoldfish185.post.indexCate', compact(['active', 'activei', 'lCate']));
    }

    public function getAddCate(){
    	$active='post';
    	$activei="catePost";
    	return view('adgoldfish185.post.addCate', compact(['active', 'activei']));
    }

    public function postAddCate(CatePostRequest $request){
    	$PostC=new PostController;
    	if ($PostC->Mcate->addItem($request)==1) {
    		return redirect()->route('adgoldfish185.post.getIndexCate')->with(['add_ms'=>'Thêm thành công']);
    	}
    	return redirect()->route('adgoldfish185.post.getIndexCate')->with(['error_ms'=>'Thất bại']);
    }

    public function getEditCate($id){
    	$PostC=new PostController;
    	$Cate=$PostC->Mcate->getItem($id);
    	$active='post';
    	$activei="catePost";
    	return view('adgoldfish185.post.editCate', compact(['active', 'activei', 'Cate']));
    }

    public function postEditCate($id, CatePostRequest $request){
    	$PostC=new PostController;
    	if ($PostC->Mcate->editItem($id, $request)==1) {
    		return redirect()->route('adgoldfish185.post.getIndexCate')->with(['edit_ms'=>'Sửa thành công']);
    	}
    	return redirect()->route('adgoldfish185.post.getIndexCate')->with(['error_ms'=>'Thất bại']);
    }

    public function getDelCate($id){
    	$PostC=new PostController;
    	if ($PostC->Mcate->delItem($id)==1) {
    		return redirect()->route('adgoldfish185.post.getIndexCate')->with(['del_ms'=>'Xóa thành công']);
    	}
    	return redirect()->route('adgoldfish185.post.getIndexCate')->with(['error_ms'=>'Thất bại']);
    }

    public function getActiveCate(){
        if (Request::ajax()) {
            $id=Request::get('aid');
    		$PostC=new PostController;
            $Cate=$PostC->Mcate->getItem($id);
            if($Cate->status==1){
                $Cate->status=0;
            }else{
                $Cate->status=1;
            }
            $Cate->save();
            return "oke";
        }
    }
}

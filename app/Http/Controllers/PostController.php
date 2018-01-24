<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCatePost;
use App\ModelCategory;
use App\ModelPost;

class PostController extends Controller
{
    public function getIndex(){
    	$Mcatepost=new ModelCatePost;
    	$Mcate=new ModelCategory;
    	$lCatePost=$Mcatepost->getItemsAll();
    	$lCate=$Mcate->getItemsAll();
    	$active='post';
        $seo=[
            'title'=>"Góc chia sẽ",
            'keywords'=>"Các sản phẩm in thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng",
            'description' =>"Nhận In thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng. Thiếp kế thiệp mời, QUảng cáo tại đà nẵng"
        ];
    	return view('public.post.index', compact(['active', 'lCatePost', 'lCate', 'seo']));
    }

    public function getPost($slug){
    	$Mpost=new ModelPost;
    	$Mcatepost=new ModelCatePost;
    	$Mcate=new ModelCategory;
    	$idCatepost=getSlug($slug)['id'];
    	$CatePost=$Mcatepost->getItem($idCatepost);
    	$lCatePost=$Mcatepost->getItemsAll();
    	$lCate=$Mcate->getItemsAll();
    	$lPost=$Mpost->getItemsByCate($idCatepost, 10);
    	$active='post';
    	$key="";
        $seo=[
            'title'=>$CatePost['title'],
            'keywords'=>$CatePost['keywords'],
            'description' =>$CatePost['description']
        ];
    	return view('public.post.cate', compact(['active', 'CatePost', 'lCate', 'lCatePost', 'seo', 'lPost', 'key']));
    }

    public function getDetail($slug, $slug1){
    	$Mpost=new ModelPost;
    	$Mcatepost=new ModelCatePost;
    	$Mcate=new ModelCategory;
    	$lCate=$Mcate->getItemsAll();
    	$lCatePost=$Mcatepost->getItemsAll();
    	$idCate=getSlug($slug)['id'];
    	$id=getSlug($slug1)['id'];
    	$CatePost=$Mcatepost->getItem($idCate);
    	$Post=$Mpost->getItem($id);
    	$active='post';
    	$key="";
        $seo=[
            'title'=>$Post['title'],
            'keywords'=>$Post['keywords'],
            'description' =>$Post['description']
        ];
        $lPostLq=$Mpost->getItemsRand(4);
    	return view('public.post.detail', compact(['active', 'CatePost', 'lCate', 'lCatePost', 'seo', 'Post', 'key', 'lPostLq']));
    }
}

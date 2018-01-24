<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelCategory;
use App\ModelProduct;
use App\ModelImgPro;

class ProductController extends Controller
{
    public function getIndex(){
    	$Mcate=new ModelCategory;
    	$lCate=$Mcate->getItemsAll();
    	$active="product";
        $seo=[
            'title'=>"Danh mục Sản phẩm",
            'keywords'=>"Các sản phẩm in thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng",
            'description' =>"Nhận In thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng. Thiếp kế thiệp mời, QUảng cáo tại đà nẵng"
        ];
    	return view('public.product.index', compact(['active', 'lCate', 'seo']));
    }

    public function getPro($slug, Request $request){
    	$Mpro=new ModelProduct;
    	$Mcate=new ModelCategory;
    	$idCate=getSlug($slug)['id'];
    	$Cate=$Mcate->getItem($idCate);
        $lCate=$Mcate->getItemsAll();
    	$active="product";
        $key="";
        $count=12;
        if($request->keyseach!=""){
            $key=$request->keyseach;
            if ($request->id_cate!=0) {
                $lPro=ModelProduct::select('*')->where('id_cate', $request->id_cate)->whereRaw("match(name) against ('".$key." ')")->paginate(12);
                $lProLq=ModelProduct::select('*')->where('id_cate', $request->id_cate)->whereRaw("match(detail) against ('".$key." ')")->orderBy('id', 'RAND()')->paginate(4);
                $Cate=$Mcate->getItem($request->id_cate);
            }else{
                $lPro=ModelProduct::select('*')->whereRaw("match(name) against ('".$key." ')")->paginate(12);
                $lProLq=ModelProduct::select('*')->whereRaw("match(detail) against ('".$key." ')")->orderBy('id', 'RAND()')->paginate(4);
            }
            $key="keyseach=".$key."&id_cate=".$request->id_cate;
        }else{
            $lProLq=$Mpro->getItemsRand(4);
    		$lPro=$Mpro->getItemsByCate($idCate, $count);
        }
        if ($count>count($lPro)) {
        	$count=count($lPro);
        }
        $seo=[
            'title'=>$Cate['title'],
            'keywords'=>$Cate['keywords'],
            'description' =>$Cate['description']
        ];
    	return view('public.product.cate', compact(['active', 'Cate', 'seo', 'lPro', 'key', 'count', 'lCate', 'lProLq']));
    }
    
    public function getDetail($slug, $slug1){
    	$Mpro=new ModelProduct;
    	$Mcate=new ModelCategory;
        $Mimg=new ModelImgPro;
    	$idCate=getSlug($slug)['id'];
    	$id=getSlug($slug1)['id'];
    	$Pro=$Mpro->getItem($id);
    	$Cate=$Mcate->getItem($idCate);
        $lCate=$Mcate->getItemsAll();
    	$active="product";
        $seo=[
            'title'=>$Pro['title'],
            'keywords'=>$Pro['keywords'],
            'description' =>$Pro['description']
        ];
        $lImg=$Mimg->getItemByPro($id);
        $lProLq=$Mpro->getItemsRand(6);
    	return view('public.product.detail', compact(['active', 'Cate', 'seo', 'Pro', 'lImg', 'lProLq', 'lCate']));
    }
}

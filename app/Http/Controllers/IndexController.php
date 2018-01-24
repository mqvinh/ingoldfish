<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelSlide;
use App\ModelProduct;
use App\ModelPost;
use App\ModelCategory;

class IndexController extends Controller
{
    public function getIndex(Request $request){
        $Mslide=new ModelSlide;
        $Mpro=new ModelProduct;
        $McatePro=new ModelCategory;
        $Mpost=new ModelPost;
        if ($request->keyseach!="" && $request->id_cate!=0) {
            $Cate=$McatePro->getItem($request->id_cate);
            return redirect()->route('public.product.getPro', [$Cate['slug'], $request]);
        }
    	$lSlide=$Mslide->getItemsAll();
    	$lPro=$Mpro->getItemsAll();
        $lCate=$McatePro->getItemsAll();
    	$lPost=$Mpost->getItems(5);
    	$active="index";
        $seo=[
            'title'=>"Trang chủ - InGoldfish",
            'keywords'=>"In thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng",
            'description' =>"Nhận In thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng. Thiếp kế thiệp mời, QUảng cáo tại đà nẵng"
        ];
    	return view('public.index', compact(['lSlide', 'lPro', 'active', 'lPost', 'seo', 'lCate']));
    }
}

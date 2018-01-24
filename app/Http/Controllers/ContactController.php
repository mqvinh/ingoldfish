<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCategory;
use App\ModelContact;

class ContactController extends Controller
{
    public function getIndex(){
        $McatePro=new ModelCategory;
        $lCate=$McatePro->getItemsAll();
    	$active="contact";
        $seo=[
            'title'=>"Trang chủ - Liên hệ",
            'keywords'=>"In thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng",
            'description' =>"Nhận In thiệp cưới, menu, quảng cáo giá rẻ tại Đà Nẵng. Thiếp kế thiệp mời, QUảng cáo tại đà nẵng"
        ];
    	return view('public.contact.index', compact(['active', 'lCate', 'seo']));
    }
}

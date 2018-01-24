<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
use File;
use App\ModelCategory;
use App\ModelProduct;
use App\ModelImgPro;

use App\Http\Requests\CateRequest;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    private $Mpro;
    private $Mcate;
    private $Mimg;
    public function __construct()
    {
        $this->Mpro = new ModelProduct;
        $this->Mcate = new ModelCategory;
        $this->Mimg = new ModelImgPro;
    }
//product
    public function getIndex(){
    	$ProC=new ProductController;
    	$lProduct=$ProC->Mpro->getItems(10);
        $lCate=$ProC->Mcate->getItemsAll();
    	$active="product";
    	$activei="product";
    	return view('adgoldfish185.product.index', compact(['active', 'activei', 'lProduct', 'lCate']));
    }

    public function getAdd(){
    	$ProC=new ProductController;
    	$lCate=$ProC->Mcate->getItemsAll();
    	$active="product";
    	$activei="product";
    	return view('adgoldfish185.product.add', compact(['active', 'activei', 'lCate']));
    }

    public function postAdd(ProductRequest $request){
    	$ProC=new ProductController;
    	if ($ProC->Mpro->addItem($request)==1) {
    		return redirect()->route('adgoldfish185.product.getIndex')->with(['add_ms'=>'Thêm thành công']);
    	}
    	return redirect()->route('adgoldfish185.product.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getEdit($id){
        $ProC=new ProductController;
        $Pro=$ProC->Mpro->getItem($id);
        $lCate=$ProC->Mcate->getItemsAll();
        $lImg=$ProC->Mimg->getItemByPro($id);
        $active="product";
        $activei="product";
        return view('adgoldfish185.product.edit', compact(['active', 'activei', 'Pro', 'lCate', 'lImg']));
    }

    public function postEdit($id, ProductRequest $request){
        $ProC=new ProductController;
        if ($ProC->Mpro->editItem($id, $request)) {
            return redirect()->route('adgoldfish185.product.getIndex')->with(['edit_ms'=>'Sửa thành công']);
        }
        return redirect()->route('adgoldfish185.product.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getDel($id){
        $ProC=new ProductController;
        if ($ProC->Mpro->delItem($id)) {
            return redirect()->route('adgoldfish185.product.getIndex')->with(['del_ms'=>'Xóa thành công']);
        }
        return redirect()->route('adgoldfish185.product.getIndex')->with(['error_ms'=>'Thất bại']);
    }

    public function getActive(){
        if (Request::ajax()) {
            $id=Request::get('aid');
            $ProC=new ProductController;
            $Pro=$ProC->Mpro->getItem($id);
            if($Pro->status==1){
                $Pro->status=0;
            }else{
                $Pro->status=1;
            }
            $Pro->save();
            return "oke";
        }
    }

    public function getDelImg(){
        if (Request::ajax()) {
            $id=Request::get('aidimg');
            $ProC=new ProductController;
            $Img=$ProC->Mimg->getItem($id);
            File::delete('resources/upload/imgpro/'.$Img->picture);
            $Img->delete();
            return "oke";
        }
    }

//cate
    public function getIndexCate(){
    	$ProC=new ProductController;
    	$lCate=$ProC->Mcate->getItems(10);
    	$active="product";
    	$activei="cate";
    	return view('adgoldfish185.product.indexCate', compact(['active', 'activei', 'lCate']));
    }

    public function getAddCate(){
    	$active="product";
    	$activei="cate";
    	return view('adgoldfish185.product.cateAdd', compact(['active', 'activei']));
    }

    public function postAddCate(CateRequest $request){
    	$ProC=new ProductController;
    	if ($ProC->Mcate->addItem($request)==1) {
    		return redirect()->route('adgoldfish185.product.getIndexCate')->with(['add_ms'=>'Thêm thành công']);
    	}
    	return redirect()->route('adgoldfish185.product.getIndexCate')->with(['error_ms'=>'Thát bại']);
    }

    public function getEditCate($id){
    	$ProC=new ProductController;
    	$Cate=$ProC->Mcate->getItem($id);
    	$active="product";
    	$activei="cate";
    	return view('adgoldfish185.product.cateEdit', compact(['active', 'activei', 'Cate']));
    }

    public function postEditCate($id, CateRequest $request){
    	$ProC=new ProductController;
    	if ($ProC->Mcate->editItem($id, $request)==1) {
    		return redirect()->route('adgoldfish185.product.getIndexCate')->with(['edit_ms'=>'Sửa thành công']);
    	}
    	return redirect()->route('adgoldfish185.product.getIndexCate')->with(['error_ms'=>'Thất bại']);
    }

    public function getDelCate($id){
    	$ProC=new ProductController;
    	if ($ProC->Mcate->delItem($id)==1) {
    		return redirect()->route('adgoldfish185.product.getIndexCate')->with(['del_ms'=>'Xóa thành công']);
    	}
    	return redirect()->route('adgoldfish185.product.getIndexCate')->with(['error_ms'=>'Thất bại']);
    }

    public function getActiveCate(){
        if (Request::ajax()) {
            $id=Request::get('aid');
            $ProC=new ProductController;
            $Cate=$ProC->Mcate->getItem($id);
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

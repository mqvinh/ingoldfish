<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelContact;

class ContactController extends Controller
{
    public function getIndex(){
    	$Mcontact=new ModelContact;
    	$lContact=$Mcontact->getItems(10);
    	$active="contact";
    	return view('adgoldfish185.contact.index', compact(['active', 'lContact']));
    }

    public function getDetail($id){
    	$Mcontact=new ModelContact;
    	$Contact=$Mcontact->getItem($id);
        $Contact->status=1;
        $Contact->save();
    	$active="contact";
    	return view('adgoldfish185.contact.detail', compact(['active', 'Contact']));
    }

    public function getDel($id){
    	$Mcontact=new ModelContact;
    	if ($Contact=$Mcontact->delItem($id)==1) {
    		return redirect()->route('adgoldfish185.contact.getIndex')->with(['del_ms'=>'Xóa thành công']);
    	}else{
    		return redirect()->route('adgoldfish185.contact.getIndex')->with(['error_ms'=>'Thất bại']);
    	}
    }
}

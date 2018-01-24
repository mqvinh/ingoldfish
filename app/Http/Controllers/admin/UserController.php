<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Request;
use App\ModelUsers;
use App\ModelLevel;

use App\Http\Requests\LevelRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;

use Carbon\Carbon;

class UserController extends Controller
{

    private $Muser;
    private $Mlevel;
    public function __construct()
    {
        $this->Muser = new ModelUsers;
        $this->Mlevel = new ModelLevel;
    }

//user
    public function getIndex(){
        $UserC=new UserController;
    	$lUser=$UserC->Muser->getItems(10);
    	$lLevel=$UserC->Mlevel->getItemsAll();
    	$active="user";
    	$activei="user";
    	return view('adgoldfish185.user.index', compact(['active', 'activei', 'lUser', 'lLevel']));
    }

    public function getAdd(){
        $UserC=new UserController;
    	$lLevel=$UserC->Mlevel->getItemsAll();
    	$active="user";
    	$activei="user";
    	return view('adgoldfish185.user.add', compact(['active', 'activei', 'lLevel']));
    }

    public function postAdd(UserRequest $request){
        $UserC=new UserController;
        if ($UserC->Muser->addItem($request)==1) {
    		return redirect()->route('adgoldfish185.user.getIndex')->with(['add_ms'=>'Thêm thành công']);
        }
    	return redirect()->route('adgoldfish185.user.getIndex')->with(['error_ms'=>'Thát bại']);
    }

    public function getEdit($id){
        $UserC=new UserController;
        $User=$UserC->Muser->getItem($id);
        $lLevel=$UserC->Mlevel->getItemsAll();
        $active="user";
        $activei="user";
        return view('adgoldfish185.user.edit', compact(['active', 'activei', 'User', 'lLevel']));
    }

    public function postEdit(UserEditRequest $request, $id){
        $UserC=new UserController;
        if ($UserC->Muser->editItem($id, $request)==1) {
            return redirect()->route('adgoldfish185.user.getIndex')->with(['edit_ms'=>'Sửa thành công']);
        }
        return redirect()->route('adgoldfish185.user.getIndex')->with(['error_ms'=>'Thát bại']);
    }

    public function getDel($id){
        $UserC=new UserController;
        if ($UserC->Muser->delItem($id)==1) {
            return redirect()->route('adgoldfish185.user.getIndex')->with(['del_ms'=>'Xóa thành công']);
        }
        return redirect()->route('adgoldfish185.user.getIndex')->with(['error_ms'=>'Thát bại']);
    }

    //active
    public function getActive(){
        if (Request::ajax()) {
            $id=Request::get('aid');
            $User=ModelUsers::find($id);
            if($User->status==1){
                $User->status=0;
            }else{
                $User->status=1;
            }
            $User->save();
            return "oke";
        }
    }
//level
    public function getIndexLevel(){
        $UserC=new UserController;
    	$lLevel=$UserC->Mlevel->getItems(10);
    	$active="user";
    	$activei="level";
    	return view('adgoldfish185.user.indexLevel', compact(['active', 'activei', 'lLevel']));
    }

    public function getAddLevel(){
    	$active="user";
    	$activei="level";
    	return view('adgoldfish185.user.levelAdd', compact(['active', 'activei']));
    }

    public function postAddLevel(LevelRequest $request){
    	$Level=new ModelLevel;
    	$Level->name=$request->name;
    	$Level->date_create=Carbon::now();
    	$Level->save();
    	return redirect()->route('adgoldfish185.level.getIndex')->with(['add_ms'=>'Thêm thành công']);
    }

    public function getEditLevel($id){
        $UserC=new UserController;
    	$Level=$UserC->Mlevel->getItem($id);
    	$active="user";
    	$activei="level";
    	return view('adgoldfish185.user.levelEdit', compact(['active', 'activei', 'Level']));
    }

    public function postEditLevel($id, LevelRequest $request){
        $UserC=new UserController;
    	$Level=$UserC->Mlevel->getItem($id);
    	$Level->name=$request->name;
    	$Level->save();
    	return redirect()->route('adgoldfish185.level.getIndex')->with(['edit_ms'=>'Sửa thành công']);
    }

    public function getDelLevel($id){
        $UserC=new UserController;
    	$Level=$UserC->Mlevel->getItem($id);
    	if ($Level!=null && $Level['id']!=1) {
    		$Level->delete();
    		return redirect()->route('adgoldfish185.level.getIndex')->with(['del_ms'=>'Xóa thành công']);
    	}
    	return redirect()->route('adgoldfish185.level.getIndex')->with(['error_ms'=>'Xóa thành công']);
    }
}

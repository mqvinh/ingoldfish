<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ModelUsers extends Model
{
    protected $table='users';
    protected $fillable = [
        'id', 'username', 'picture', 'password', 'fullname', 'id_level', 'email', 'phone', 'status', 'date_create'
    ];
    public $timestamps=false;

    public function getItems($number){
    	return ModelUsers::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItem($id){
        return ModelUsers::find($id);
    }

    public function addItem($request){
    	$file_name='not_img.jpg';
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
    	$User=new ModelUsers;
    	$User->username=$request->username;
    	$User->password=bcrypt($request->password);
        $User->fullname=$request->fullname;
    	$User->email=$request->email;
    	$User->phone=$request->phone;
    	$User->id_level=$request->id_level;
    	$User->status=1;
    	$User->date_create=Carbon::now();
    	$User->picture=$file_name;
    	return $User->save();
    }

    public function editItem($id, $request){
        $User=ModelUsers::find($id);
        $file_name=$User->picture;
        if($request->picture != null){
            $file_name = $request->file('picture')->getClientOriginalName();
            $file_name=change_name($file_name);
            $request->file('picture')->move('resources/upload/', $file_name);
        }
        $User->username=$request->username;
        if ($request->password!="") {
        $User->password=bcrypt($request->password);
        }
        $User->fullname=$request->fullname;
        $User->email=$request->email;
        $User->phone=$request->phone;
        $User->id_level=$request->id_level;
        $User->picture=$file_name;
        return $User->save();
    }

    public function delItem($id){
        $User=ModelUsers::find($id);
        if ($User!=null) {
            return $User->delete();
        }else{
            return 0;
        }
    }
}

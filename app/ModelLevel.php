<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLevel extends Model
{
    protected $table='level';
    protected $fillable = [
        'id', 'name', 'date_create'
    ];
    public $timestamps=false;

    public function getItems($number){
    	return ModelLevel::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItemsAll(){
    	return ModelLevel::select('*')->get();
    }

    public function getItem($id){
        return ModelLevel::find($id);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelImgPro extends Model
{
    protected $table='img_pro';
    protected $fillable = [
        'id', 'picture', 'id_pro'
    ];
    public $timestamps=false;

    public function getItemByPro($id){
    	return ModelImgPro::select('*')->where('id_pro', $id)->get();
    }

    public function getItem($id){
    	return ModelImgPro::find($id);
    }
}

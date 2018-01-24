<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelContact extends Model
{
    protected $table='contact';
    protected $fillable = [
        'id', 'name', 'email', 'phone', 'subject', 'content', 'status'
    ];
    public $timestamps=false;

    public function getItems($number){
    	return ModelContact::select('*')->orderBy('id', 'desc')->paginate($number);
    }

    public function getItem($id){
    	return ModelContact::find($id);
    }
}

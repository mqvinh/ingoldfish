<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex(){
    	$active="index";
    	return view('adgoldfish185.index', compact(['active']));
    }
}

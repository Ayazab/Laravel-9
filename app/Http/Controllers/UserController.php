<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //return "<h1>Getting from controller</h1>";
        return view('welcome');
    }

    public function showname($name){
        return "Show $name";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formvalidate;

class TestController extends Controller
{
    public function getUserData(){

      $studata =  formvalidate::select('id', 'fname','lname','email','phone')->get();
       return view('basicview')->with('studata', $studata);
    }
}

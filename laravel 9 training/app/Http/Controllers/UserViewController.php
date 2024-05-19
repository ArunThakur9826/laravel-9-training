<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ViewUserData;

class UserViewController extends Controller
{
   public function index (){
    $users = ViewUserData::select("*")->get();
  return view('viewuserdata')->with('users', $users);
   }
}

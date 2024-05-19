<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DemoapiController extends Controller
{
  
  public function index () {
    $userdata = User::select('id', 'name', 'email')->get();

    return $userdata;
    
  } 
}

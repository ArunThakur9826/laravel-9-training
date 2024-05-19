<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class BasicController extends Controller
{


   public function myhome()
    {
      return view ('myhome');
    }
  
   public function myabout () 
    {
       return view ('myabout');
    }

             public function index(User $key)
              {
              
                return $key;
              }


}

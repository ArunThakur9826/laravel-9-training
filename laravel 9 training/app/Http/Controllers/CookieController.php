<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CookieController extends Controller
{
    public function setcookie(Request $request){
        $email = $request->email;
        $password = $request->password;


       $minute = 1;
       $response = new Response('Cookie is set for one minute');
       $response->withCookie(cookie('name',$email,$minute));
       $response->withCookie(cookie('password',$password, $minute));

       return $response;
     
    }


   public function getCookie(Request $request) {
      $email = $request->cookie('name');
      $password = $request->cookie('password');
      echo "<b>Email : </b>" .$email. "<br><b>password : </b>" .$password;
   }

}

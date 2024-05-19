<?php

namespace App\Http\Controllers;
use App\Models\Nletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class NewsletterController extends Controller
{
 

    public function newslettr(){
        return view('newsletter.newsletter');
    }


    public function response(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:nletters',
        ],[
           'email.unique' => "You are already a subscriber",
        ]);
        if ($validator->fails()) {
            return response()->json([
            'error' => $validator->errors()->all()
          ]);
        } 

        $insert = new Nletter;
        $insert->email = $request['email'];
        $var = $insert->save();


        if($var){
           return ['status' => 'success']; 
        }
     }




     // email newsletter use

    public function emailview(){
        return view('send-mail.sendmail');
    }
}

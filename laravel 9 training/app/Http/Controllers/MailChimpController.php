<?php

namespace App\Http\Controllers;
use App\Models\Nletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MailChimpController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
       
        $email = $request['email'];

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

        $listId = env('MAILCHIMP_LIST_ID');
        $mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));

        $campaign = $mailchimp->campaigns->create('regular', [
            'list_id' => $listId,
            'subject' => 'Example Mail',
            'from_email' =>  $email,
            'from_name' => 'Arunthakur',
            'to_name' =>   $email

        ], [
            'html' => '<h1>Just testing mailchmp content</h1>',
            'text' => strip_tags('mail chim content')
        ]);

        //Send campaign
      $var = $mailchimp->campaigns->send($campaign['id']);

        // dd('Campaign send successfully.');

        if($var){
           return ['status' => 'success']; 
        }
    }
}
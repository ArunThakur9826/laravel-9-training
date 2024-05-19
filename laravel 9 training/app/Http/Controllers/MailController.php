<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function emailview(){
        return view('send-mail.sendmail');
    }


    public function index(Request $request)
    {
        $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',

        ]);

        $mail =  $request->email; 
        $name =  $request->name; 
        $subject =  $request->subject; 
        $message =  $request->message; 
        $mailData = [
            'title' => 'Mail from arunthakur.com',
            'body' => 'This is for testing email using smtp.',
            'name' => $name,
            'mail' => $mail,
            'subject' => $subject,
            'message' => $message,

        ];
        
        Mail::to($mail)->send(new DemoMail($mailData));
           
        return back()->with('success', 'You are registered successfully');
    }
}
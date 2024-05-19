<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Rules\ReCaptcha;

class formvalidate extends Model
{
    use HasFactory;

    // model with validation 


    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'password_confirmation',
        'phone',
        'gender',
        'qualification',
        'country',
        'image',
        // 'g-recaptcha-response'
    ];


        public $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:students',
            // 'password' => 'required|confirmed',
            // 'password_confirmation' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'qualification' => 'required',
            'country' => 'required',
            'image' => 'required|mimes:jpg,png',
         

        ];


        public $custom = [
            'fname.required' => 'Please first name fill up  * ',
            'lname.required' => 'Please last name fill up * ',
            'email.required' => ' Please email fill up * ',
            'email.email' => ' Please enter valid email  * ',
            'email.unique' => ' Email is already exist  * ',
            // 'password.required' => 'Please enter the password * ',
            // 'password_confirmation.required' => 'Please Re enter the password * ',
            // 'password.confirmed' => 'Do not match your password',
            'phone.required' => 'please enter your mobile number * ',
            'phone.numeric' => 'Only numeric value used * ',
            'gender.required' => 'Please choose the gender * ',
            'qualification.required' => 'Please select your qualification * ',
            'country.required' => 'Please pelect Your Country * ',
            'image.required' => 'Please upload Your Image *',
           
 
        ];


        public $rulesupdate = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|confirmed',
            // 'password_confirmation' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'qualification' => 'required',
            'country' => 'required',
            // 'image' => 'required|mimes:jpg,png',
         

        ];

        public $customupdate = [
            'fname.required' => 'Please first name fill up  * ',
            'lname.required' => 'Please last name fill up * ',
            'email.required' => ' Please email fill up * ',
            'email.email' => ' Please enter valid email  * ',
            // 'email.unique' => ' Email is already exist  * ',
            // 'password.required' => 'Please enter the password * ',
            // 'password_confirmation.required' => 'Please Re enter the password * ',
            // 'password.confirmed' => 'Do not match your password',
            'phone.required' => 'please enter your mobile number * ',
            'phone.numeric' => 'Only numeric value used * ',
            'gender.required' => 'Please choose the gender * ',
            'qualification.required' => 'Please select your qualification * ',
            'country.required' => 'Please pelect Your Country * ',
            // 'image.required' => 'Please upload Your Image *',
           
 
        ];


        protected $table = "students";
        protected $primarykey = "id";
    

        

}

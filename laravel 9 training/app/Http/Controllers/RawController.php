<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RawController extends Controller
{


    public function show(){
    
        $students = DB::select( DB::raw('SELECT * FROM students'));
        return view ('raw.data')->with('students', $students);
    }


    public function particuler($student_id){
    
        $students = DB::select( DB::raw("SELECT * FROM students Where id= $student_id"));
        return view ('raw.data')->with('students', $students);
    }

    public function des(){
    
        $students = DB::table('students')->orderbyRaw('id DESC')->get();
        return view ('raw.data')->with('students', $students);
    }


    public function limit(){
    
        $students = DB::table('students')->offset(2)->limit(5)->get();
        return view ('raw.data')->with('students', $students);
    }
}

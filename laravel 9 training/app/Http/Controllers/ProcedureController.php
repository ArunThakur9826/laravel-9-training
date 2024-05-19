<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProcedureController extends Controller
{
    public function index(){
     $postId = 2;
        $getPost = DB::select('CALL get_posts_by_userid('.$postId.')');

        return view('procedurs.procedure')->with('getPost', $getPost);
    }
}

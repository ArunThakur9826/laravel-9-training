<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
   
   public function index()
    {
      $posts = DB::table('posts')->select('id','post_name','post_description','tag')->get();
      return view('post_view')->with('posts', $posts);
    }

 

   public function ajaxindex(Request $request)
    {
      $data = $request->postdata;
        if($data == "asc"){
          $posts = DB::table('posts')->orderBy('post_name', 'ASC')->get();
        }elseif($data == "dsc"){
          $posts = DB::table('posts')->orderBy('post_name','DESC')->get();
        }elseif($data == "dateasc"){
          $posts = DB::table('posts')->orderBy('created_at', 'ASC')->get();
        }elseif($data == "datedesc"){
          $posts = DB::table('posts')->orderBy('created_at', 'DESC')->get();
        }   
           
        foreach($posts as $post){

          $order="
            <tr class='text-center' id='table_trcontroller'>
              <td id='id'>$post->id</td>
              <td id='postname'>$post->post_name</td>
              <td id='postdescription'>$post->post_description</td>
              <td id='tag'>$post->tag</td>
            <tr>
          ";
          echo $order;
        }
 
   } 

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Group;



class RelationController extends Controller
{
    public function index(){
        $data = Member::with('getgroup')->get();

        return view('eloquent_relation.hasone')->with('data',$data);
    }



    public function group(){
        $data = Group::with('member')->get();

        return view('eloquent_relation.hasnany_group_by_data', ['data'=>$data]);
    }



}

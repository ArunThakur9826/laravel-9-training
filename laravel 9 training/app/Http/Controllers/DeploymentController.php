<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Deployment;
use App\Models\Language;


class DeploymentController extends Controller
{
    
    public function index(){
      $deployement = Project::with('deployment')->get();
      
     return view('eloquent_relation.hasmany')->with('deployement', $deployement);
       }

}

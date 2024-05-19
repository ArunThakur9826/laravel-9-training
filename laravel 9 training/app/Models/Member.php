<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    function getgroup(){
        return $this->hasone('App\Models\Group', 'group_id','group_id');
    }

}

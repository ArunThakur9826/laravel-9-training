<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewUserData extends Model
{
    use HasFactory;


    public $table = "view_user_data";
    public $primarykey = "id";
    
}

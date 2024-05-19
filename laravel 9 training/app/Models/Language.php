<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $primarykey = "id";
    use HasFactory;

    public function deployment(){
        return $this->hasmany(Deployment::class);
        
    }
}

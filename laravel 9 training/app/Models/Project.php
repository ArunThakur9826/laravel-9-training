<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $primarykey = "id";
    protected $table = "projects";
    use HasFactory;



        public function deployment(){
        return $this->hasmany(Deployment::class, 'language_id', 'id');
        
    }
    public function languages(){
        return $this->hasmany(Languages::class, 'project_id', 'id');

    }



}

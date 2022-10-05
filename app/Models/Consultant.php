<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    function getSemester(){
        return $this->hasOne('App\Models\Semester','id','semester_id');
    }
}

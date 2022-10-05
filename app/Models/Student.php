<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    function getConsultant(){
        return $this->hasOne('App\Models\Consultant','id','consultant_id');
    }
    function getSemester(){
        return $this->hasOne('App\Models\Semester','id','semester_id');
    }
}

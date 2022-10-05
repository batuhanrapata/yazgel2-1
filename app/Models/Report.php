<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    function getStudent(){
        return $this->hasOne('App\Models\Student','id','student_id');
    }
    function getConsultant(){
        return $this->hasOne('App\Models\Consultant','id','consultant_id');
    }
}

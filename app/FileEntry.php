<?php

namespace App;

use App\Subject;
use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    //
    public function getSubject($id){
    	return Subject::find($id);
    }

    public function getSemester($id){
    	return Semester::find($id);	
    }

    public function getYear($id){
    	return Year::find($id);	
    }
}

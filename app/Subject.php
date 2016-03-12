<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function getSemester($id){
    	return Semester::find($id);
    }
}

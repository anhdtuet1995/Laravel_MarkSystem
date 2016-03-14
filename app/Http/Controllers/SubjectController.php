<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fileentry;
use App\Year;
use App\User;
use App\Semester;
use App\Subject;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class SubjectController extends Controller
{
    public function index(){
    	$i = 1;
    	$semesters = Semester::all();
    	$subjects = Subject::all();

    	return view('admins.subjects.home')->with([
    		'i' => $i,
    		'semesters' => $semesters,
    		'subjects' => $subjects
    	]);
    }

    public function store(Request $request){
    	$subject = new Subject;

    	$subject->subject_title = $request->input('subject');
        $subject->subject_code = $request->input('subject_code');
    	$subject->semester_id = $request->get('semester');

    	$subject->save();
    	return redirect('admin/subject');
    }

    public function destroy($id){
    	Subject::destroy($id);

    	return redirect('admin/subject');
    }
}

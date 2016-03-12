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
use Carbon\Carbon; 

class YearController extends Controller
{
    //
    public function index(){
    	$years = Year::all();
    	$i = 1;
    	return view('admins.years.home')->with([
    		'years' => $years,
    		'i' => $i,
    	]);
    }

    public function store(Request $request){
    	$year = new Year;

    	$year->year_title = $request->input('year');
    	$year->save();

    	return redirect('admin/year');
    }

    public function destroy($id){
    	Year::destroy($id);

    	return redirect('admin/year');
    }
}

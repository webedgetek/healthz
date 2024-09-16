<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class SearchPatientController extends Controller
{
    public function index()
    {
        // $title = Title::where('archived', 'No')->where('status', '=','Active')->get();
        // $religion = Religion::where('archived', 'No')->where('status', '=','Active')->get();
        // $gender = Gender::where('archived', 'No')->where('status', '=','Active')->get();
        // $region = Region::where('archived', 'No')->where('status', '=','Active')->get();
        // $relation = Relation::where('archived', 'No')->where('status', '=','Active')->get();
        // $news = Relation::with('users')->get();
        $patient_list = Patient::where('archived', 'No')->where('status', '=', 'Active')->get();
    
        return view('patient.index', compact('patient_list'));
    
    }
}

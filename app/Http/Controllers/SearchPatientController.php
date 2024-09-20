<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class SearchPatientController extends Controller
{
    public function index()
    {
        $patient_list = DB::table('patient_info')
            ->join('gender', 'patient_info.gender_id', '=', 'gender.gender_id')
            ->join('title', 'patient_info.title_id', '=', 'title.title_id')
            ->select('patient_info.patient_id', 'title.title', 'patient_info.fullname', 'patient_info.default_sponsor', 'patient_info.email',  'gender.gender', 
            'patient_info.birth_date', 'patient_info.added_date', 
            'patient_info.telephone', DB::raw('TIMESTAMPDIFF(YEAR, patient_info.birth_date, CURDATE()) as age'))
            ->get();
    
        return view('patient.index', compact('patient_list'));
    
    }
}

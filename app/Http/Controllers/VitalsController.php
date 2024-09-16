<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class VitalsController extends Controller
{
   public function index()
   {
    $patient = Patient::where('archived','No')->where('status', '=', 'Active')->get();
   }
}


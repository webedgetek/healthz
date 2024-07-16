<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Relation;
use App\Models\Patient;
use App\Models\YearlyCount;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function index()
    {
        $title = Title::where('archived', 'No')->where('status', '=','Active')->get();
        $religion = Religion::where('archived', 'No')->where('status', '=','Active')->get();
        $gender = Gender::where('archived', 'No')->where('status', '=','Active')->get();
        $region = Region::where('archived', 'No')->where('status', '=','Active')->get();
        $relation = Relation::where('archived', 'No')->where('status', '=','Active')->get();
    
        return view('patient.create', compact('title','religion','gender', 'region', 'relation'));
    
    }

    public function create()
    {
        $title = Title::where('archived', 'No')->where('status', '=','Active')->get();
        $religion = Religion::where('archived', 'No')->where('status', '=','Active')->get();
        $gender = Gender::where('archived', 'No')->where('status', '=','Active')->get();
        $region = Region::where('archived', 'No')->where('status', '=','Active')->get();
        $relation = Relation::where('archived', 'No')->where('status', '=','Active')->get();
    
        return view('patient.create', compact('title','religion','gender', 'region', 'relation'));
    }

    private function pat_number(Request $request)
    {
        $current_year = date('Y');
        $currentDateTime = Carbon::now();

        // Check if there is an entry for the current year
        $yearly_count = YearlyCount::firstOrCreate(
            ['year' => $current_year],
            ['count' => 0]
        );
    
        // Increment the count
        $yearly_count->count += 1;
        $yearly_count->save();
    
        // Format the patient number
        $formatted_id = str_pad($yearly_count->count, 6, '0', STR_PAD_LEFT);
        $pat_number = $formatted_id. '/' .$current_year;

        $transaction = [
            'year' => $currentDateTime->year,
            'month' => $currentDateTime->month,
            'day' => $currentDateTime->day,
            'time' => $currentDateTime->format('H:i:s')
        ];

        // return $pat_number;
        return [
            'pat_number' => $pat_number,
            'transaction' => $transaction
        ];
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'middlename' => 'required|min:3|max:50',
            'firstname' => 'required|min:3|max:50',
            'gender' => 'required|min:3|max:50',
        ]); 

        $available = Patient::where('surname', $request->input('category_name')) ->first();
       
        if ($available)
        {
            return 200;
         }

        $patient_number = $this->pat_number($request);         
        $patient = new Patient();
        $patient->category_name = $request->input('category_name');
        $patient->status = $request->input('category_status');
        $patient->added_date = now();
        $patient->user_id =  Auth::user()->user_id;
        $patient->added_id =  Auth::user()->user_id;
        $patient->save();

        return 201;
    }

    public function show()
    {

    }

    public function edit($pat_number)
    {
        $patient = Patient::findOrFail($pat_number);
        return response()->json(['patient' => $patient]);
    }

    public function update(Request $request, $pat_number)
    {
        $request->validate([
            'category_name' => 'required|string|max:30|min:3',
            'category_status' => 'required|string',
        ]);

        $category = Patient::findOrFail($pat_number);
        $category->updated_by =  Auth::user()->user_id;
        $category->updated_date = now();
        $category->status = $request->input('category_status');
        $category->update($request->all());

        return 201;
    }

    public function destroy(Request $request)
    {
        // Validate the request
    $request->validate([
        'pat_number' => 'required',
    ]);
        
    $searched_patient = Patient::where('pat_number', $request->input('pat_number')) ->first();
       
        if($searched_patient)
        {
            return 200;
        }
        $pat_to_be_deleted = Patient::find($request->pat_number);
        $pat_to_be_deleted->delete();
        return 201;

    }
        
    
}

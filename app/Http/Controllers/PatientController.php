<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Relation;
use App\Models\Patient;
use App\Models\PatientSponsor;
use App\Models\PatNumber;
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
        // $title = Title::where('archived', 'No')->where('status', '=','Active')->get();
        // $religion = Religion::where('archived', 'No')->where('status', '=','Active')->get();
        // $gender = Gender::where('archived', 'No')->where('status', '=','Active')->get();
        // $region = Region::where('archived', 'No')->where('status', '=','Active')->get();
        // $relation = Relation::where('archived', 'No')->where('status', '=','Active')->get();
    
        // return view('patient.create', compact('title','religion','gender', 'region', 'relation'));
    }

    private function pat_id_gen()
   {
            $current_year = date('Y');
            $small_year = date('y');

            $yearly_count = YearlyCount::firstOrCreate(
                ['year' => $current_year],
                ['count' => 0]
              );

            if ($yearly_count->wasRecentlyCreated) {
                $yearly_count->count = 1; 
            } else {
                $yearly_count->count += 1;
            }
                // $yearly_count->count += 1;
                // $yearly_count->save();

            $yearly_count->save();

            // Format the incremented count as a 6-digit number with leading zeros
            $formatted_id = str_pad($yearly_count->count, 6, '0', STR_PAD_LEFT);

            $patient_id = $formatted_id . '/' . $current_year;
            $patient_number = 'G' . $formatted_id . '/' . $small_year;

            return [
                'patient_id' => $patient_id,
                'patient_number' => $patient_number
            ];
    }

    // private function pat_id_gen()
    // {
    //     $current_year = date('Y');
    //     $small_year = date('y');

    //     $yearly_count = YearlyCount::firstOrCreate(
    //         ['year' => $current_year],
    //         ['count' => 0]
    //     );
    
    //     // Increment the count
    //     $yearly_count->count += 1;
    //     $yearly_count->save();
    
    //     // Format the patient number
    //     $formatted_id = str_pad($yearly_count->count, 6, '0', STR_PAD_LEFT);
    //     $patient_id = $formatted_id. '/' .$current_year;
    //     $patient_number = 'G'.$formatted_id.'/'.$small_year;
       
    //     // return $patient_id;
    //     return [
    //         'patient_id' => $patient_id,
    //         'patient_number' => $patient_number
    //     ];
       

    // }

    // private function opd_number()
    // {

    // }

    public function store(Request $request)
    {

        $validated_data = $request->validate([
            // 'pat_id' => 'nullable',
            'title' => 'required',
            'firstname' => 'required|min:3',
            'middlename' => 'nullable',
            'lastname' => 'required|min:3',
            'birth_date' => 'required',
            'gender' => 'required',
            'occupation' => 'required|min:3',
            'education' => 'required|min:3',
            'religion' => 'required',
            'nationality' => 'required',
            'old_folder' => 'nullable',
            'telephone' => 'nullable',
            'work_telephone' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
            'town' => 'nullable',
            'region' => 'nullable',
            'contact_person' => 'nullable',
            'contact_telephone' => 'nullable',
            'contact_relationship' => 'nullable',
            'sponsor_type' => 'nullable',
            'sponsor_name' => 'nullable',
            'member_no' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'dependant' => 'nullable',
        ]);

        $available = Patient::where('lastname', $request->input('lastname'))
        ->where('firstname', $request->input('firstname'))
        ->where('birth_date', $request->input('birth_date'))
        ->first();

        if($available)
        {
            return 200;
        }
        
        DB::beginTransaction();

        try {
                $pati = $this->pat_id_gen($request);
                $pat_id = $pati['patient_id'];
                $pat_number = strval($pati['patient_number']);
                $current_date = Carbon::now();
                
                $year = $current_date->year;
                $month = $current_date->month;
                $day =  $current_date->day;
                $time = $current_date->format('H:i:s');

                $transaction = $year.$month.$day.$time;

             
            $patient = new Patient();
            $patient->patient_id = $pat_id;
            $patient->title = $request->input('title');
            $patient->firstname = $request->input('firstname');
            $patient->middlename = $request->input('middlename');
            $patient->lastname = $request->input('lastname');
            $patient->birth_date = $request->input('birth_date');
            $patient->gender = $request->input('gender');
            $patient->occupation = $request->input('occupation');
            $patient->education = $request->input('education');
            $patient->religion = $request->input('religion');
            $patient->nationality = $request->input('nationality');
            $patient->old_folder = $request->input('old_folder');
            $patient->telephone = $request->input('telephone');
            $patient->work_telephone = $request->input('work_telephone');
            $patient->email = $request->input('email');
            $patient->address = $request->input('address');
            $patient->town = $request->input('town');
            $patient->region = $request->input('region');
            $patient->contact_person = $request->input('contact_person');
            $patient->contact_telephone = $request->input('contact_telephone');
            $patient->contact_relationship = $request->input('contact_relationship');
            $patient->sponsor_type = $request->input('sponsor_type');
            $patient->sponsor_name = $request->input('sponsor_name');
            $patient->member_no = $request->input('member_no');
            $patient->added_date = now();
            $patient->records_id = $transaction;
            $patient->user_id =  Auth::user()->user_id;
            $patient->save();

            $opd_number = new PatNumber();
            $opd_number->patient_id = $pat_id; 
            $opd_number->opd_number = $pat_number;
            $opd_number->registration_date = now();
            $opd_number->registration_time = now();
            $opd_number->user_id =  Auth::user()->user_id;
            $patient->added_date = now();
            $opd_number->save();

            $sponsor = new PatientSponsor();
            $sponsor->patient_id = $pat_id; 
            $sponsor->sponsor_type = $request->input('sponsor_type');
            $sponsor->sponsor_name = $request->input('sponsor_name');
            $sponsor->member_no = $request->input('member_no');
            $sponsor->start_date = $request->input('start_date');
            $sponsor->end_date = $request->input('end_date');
            $patient->user_id =  Auth::user()->user_id;
            $patient->added_date = now();
            $sponsor->status = 'Active';
            $sponsor->save();
         DB::commit();

            return response()->json(['message' => 'Patient saved successfully', 'code' => 201], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error saving patient details', 'error' => $e->getMessage()], 500);
        }
    }

    public function show()
    {

    }

    public function edit($pat_number)
    {
        $patient = Patient::findOrFail($pat_number);
        return response()->json(['patient' => $patient]);
    }

    public function update(Request $request, $pat_id)
    {
        $data = $request->validate([
            'pat_id' => 'nullable',
            'title' => 'required',
            'firstname' => 'required|min:3',
            'middlename' => 'nullable',
            'lastname' => 'required|min:3',
            'birth_date' => 'required',
            'gender' => 'required',
            'occupation' => 'required|min:3',
            'education' => 'required|min:3',
            'religion' => 'required',
            'nationality' => 'required',
            'old_folder' => 'nullable',
            'telephone' => 'nullable',
            'work_telephone' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
            'town' => 'nullable',
            'region' => 'nullable',
            'contact_person' => 'nullable',
            'contact_telephone' => 'nullable',
            'contact_relationship' => 'nullable',
            'sponsor_type' => 'nullable',
            'sponsor_name' => 'nullable',
            'member_no' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'dependant' => 'nullable',
        ]);

        $pat = Patient::findOrFail($pat_id);
        $pat->updated_by =  Auth::user()->user_id;
        $pat->updated_date = now();
        $pat->status = $request->input('category_status');
        $pat->update($request->all());

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

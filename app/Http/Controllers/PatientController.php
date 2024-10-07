<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Title;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Relation;
use App\Models\Patient;
use App\Models\PatientSponsor;
use App\Models\PatNumber;
use App\Models\Sponsors;
use App\Models\YearlyCount;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function index()
    {

        $title = Title::where('archived', 'No')->where('status', '=','Active')->get();
        $religion = Religion::where('archived', 'No')->where('status', '=','Active')->get();
        $gender = Gender::where('archived', 'No')->where('status', '=','Active')->where('usage', '=','1')->get();
        $region = Region::where('archived', 'No')->where('status', '=','Active')->get();
        $relation = Relation::where('archived', 'No')->where('status', '=','Active')->get();

        $patients = DB::table('patient_info')
            ->whereDate('patient_info.register_date', now())
            ->join('gender', 'patient_info.gender_id', '=', 'gender.gender_id')
            ->join('title', 'patient_info.title_id', '=', 'title.title_id')
            ->select('patient_info.patient_id', 'title.title', 'patient_info.fullname', 'patient_info.default_sponsor',  'gender.gender', 
            'patient_info.birth_date', 'patient_info.added_date', 
            'patient_info.telephone', 
            DB::raw('TIMESTAMPDIFF(YEAR, patient_info.birth_date, CURDATE()) as age'))
            ->get();

        return view('patient.create', compact('title','religion','gender', 'region', 'relation', 'patients'));
    }

    public function create()
    {
       
    }

   
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
            // 'sponsor_type' => 'nullable',
            // 'sponsor_name' => 'nullable',
            // 'member_no' => 'nullable',
            // 'start_date' => 'nullable',
            // 'end_date' => 'nullable',
            'dependant' => 'nullable',
        ]);

        $available = Patient::where('lastname', $request->input('lastname'))
            ->where('firstname', $request->input('firstname'))
            ->where('birth_date', $request->input('birth_date'))
            ->first();

        if($available)
        {
            return response()->json(['message' => 'Patient data available', 'code' => 200], 200);
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
            $time = $current_date->format('His');

            $transaction = $year.$month.$day.$time;
             
            $patient = new Patient();
            $patient->patient_id = $pat_id;
            $patient->title_id = $request->input('title');
            $patient->firstname = $request->input('firstname');
            $patient->middlename = $request->input('middlename');
            $patient->lastname = $request->input('lastname');
            $patient->birth_date = $request->input('birth_date');
            $patient->gender_id = $request->input('gender');
            $patient->occupation = $request->input('occupation');
            $patient->education = $request->input('education');
            $patient->religion_id = $request->input('religion');
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
            // $patient->sponsor_type = $request->input('sponsor_type');
            // $patient->sponsor_name = $request->input('sponsor_name');
            // $patient->member_no = $request->input('member_no');
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

            $check_sponsor = $request->input('sponsor_name');

                if($check_sponsor!='')
                {
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
                }else if ($check_sponsor='')
                {
                   
                }
           
         DB::commit();

            return response()->json(['message' => 'Patient saved successfully', 'code' => 201, 'opd_number' => $pat_number], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error saving patient details', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Request $request, $patient_id)
    {

        $patients = DB::table('patient_info')
            ->where('patient_info.patient_id', $patient_id)
            ->join('gender', 'patient_info.gender_id', '=', 'gender.gender_id')
            ->join('title', 'patient_info.title_id', '=', 'title.title_id')
            ->join('users', 'patient_info.user_id', '=', 'users.user_id')
            ->select('patient_info.patient_id', 'title.title', 'patient_info.fullname', 'gender.gender', 
            'patient_info.birth_date', 'patient_info.email', 'patient_info.address', 'patient_info.contact_person', 
            'patient_info.contact_relationship', 'patient_info.contact_telephone', 'patient_info.added_date', 
            'patient_info.telephone', 'users.user_fullname',
            DB::raw('TIMESTAMPDIFF(YEAR, patient_info.birth_date, CURDATE()) as age'))
            ->orderBy('patient_info.added_date', 'asc') 
            ->first();

            $sponsor = DB::table('patient_sponsorship')
            ->where('patient_sponsorship.archived', 'No')
            ->where('patient_id', $patient_id)
            ->join('sponsors', 'patient_sponsorship.sponsor_id', '=', 'sponsors.sponsor_id')
            ->select('patient_sponsorship.member_no', 'patient_sponsorship.sponsor_id', 
            'sponsors.sponsor_name', 'patient_sponsorship.start_date', 'patient_sponsorship.end_date', 
            'patient_sponsorship.status', 'patient_sponsorship.priority', 'patient_sponsorship.is_active'
            )
            ->get();
        
        // $sponsor = PatientSponsor::where('archived', 'No')->where('patient_id', '=', $patient_id)->get();

        $clinic = Clinic::where('archived', 'No')->get();

        return view('patient.show', compact('patients', 'sponsor', 'clinic'));
        
    }

    public function search()
    {
         $patient_list = DB::table('patient_info')
            ->join('gender', 'patient_info.gender_id', '=', 'gender.gender_id')
            ->join('title', 'patient_info.title_id', '=', 'title.title_id')
            ->join('patient_sponsorship', 'patient_info.patient_id', '=', 'patient_sponsorship.patient_id')
            ->leftJoin('sponsors', 'patient_sponsorship.sponsor_id', '=', 'sponsors.sponsor_id') 
            ->leftJoin('sponsor_type', 'sponsors.sponsor_type_id', '=', 'sponsor_type.sponsor_type_id')
            ->select('patient_info.patient_id', 'title.title', 'patient_info.fullname', 'patient_info.default_sponsor', 'patient_info.email',  'gender.gender', 
            'patient_info.birth_date', 'patient_info.added_date', 'sponsors.sponsor_name', 'sponsors.sponsor_type_id', 'sponsor_type.sponsor_type',
            'patient_info.telephone', DB::raw('TIMESTAMPDIFF(YEAR, patient_info.birth_date, CURDATE()) as age'))
            ->get();
    
        $sponsors = Sponsors::with('SponsorType')->get();

        return view('patient.index', compact('patient_list'));
    }

    public function show_today(Request $request, $patient_id)
    {

        $patients = DB::table('patient_info')
            // ->where('patient_info.added_date', now())
            ->where('patient_info.patient_id', $patient_id)
            ->join('gender', 'patient_info.gender_id', '=', 'gender.gender_id')
            ->join('title', 'patient_info.title_id', '=', 'title.title_id')
            ->join('users', 'patient_info.user_id', '=', 'users.user_id')
            ->select('patient_info.patient_id', 'patient_info.fullname',  'gender.gender', 
            'patient_info.birth_date', 'patient_info.email','patient_info.address', 'patient_info.contact_person', 'patient_info.contact_relationship', 'patient_info.contact_telephone', 'patient_info.added_date', 
            'patient_info.telephone',  'users.user_fullname',
            DB::raw('TIMESTAMPDIFF(YEAR, patient_info.birth_date, CURDATE()) as age'))
            ->orderBy('patient_info.added_date', 'asc') 
            ->first();

             $sponsors = PatientSponsor::with('users')->where('patient_id', '=', $patient_id);

            return view('patient.show', compact('patients', 'sponsors'));
    }

    public function edit($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
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


    private function pat_id_gen()
    {
             $patient_id = (string) Str::uuid();
 
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
                 $yearly_count->save();
 
             // Format the incremented count as a 6-digit number with leading zeros
             $formatted_id = str_pad($yearly_count->count, 6, '0', STR_PAD_LEFT);
 
             // $patient_id = $formatted_id . $current_year;
             $patient_number = 'G' . $formatted_id . $small_year;
 
             return [
                 'patient_id' => $patient_id,
                 'patient_number' => $patient_number
             ];
     }

     public function attendance(Request $request, $patient_id)
     {
        $patients = DB::table('patient_info')
            ->where('patient_info.patient_id', $patient_id)
            ->join('gender', 'patient_info.gender_id', '=', 'gender.gender_id')
            ->join('title', 'patient_info.title_id', '=', 'title.title_id')
            ->select('patient_info.patient_id', 'title.title', 'patient_info.fullname',  'gender.gender', 
            'patient_info.birth_date', 'patient_info.email','patient_info.address',  'patient_info.added_date', 
            'patient_info.telephone', 
            DB::raw('TIMESTAMPDIFF(YEAR, patient_info.birth_date, CURDATE()) as age'))
            ->orderBy('patient_info.added_date', 'asc') 
            ->first();

            // return view('patient.show', compact('patients'));

     }
     
    public function request_ccc(Request $request)
    {
        // API URL and authentication details
        $apiUrl = "https://elig.nhia.gov.gh:5000/api/hmis/genCCC";
        $apiKey = //"hp6658"; // API Key
        $secret = //"ncgxs3"; // Secret

        // Get the CardType and CardNo from the request (assuming form data is posted)
        $cardType = $request->input('cardType');
        $cardNo = $request->input('cardNo');

        // Prepare the form data
        $formData = [
            'CardType' => $cardType,
            'CardNo' => $cardNo
        ];

        // Send the POST request to the API
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-nhia-apikey' => $apiKey,  // API key header
                'x-nhia-apisecret' => $secret, // Secret key header
                'Authorization' => 'Basic ' . base64_encode("$apiKey:$secret") // Optional, if required
            ])->post($apiUrl, $formData);

            // Check if the response is JSON or plain text
            if ($response->header('Content-Type') === 'application/json') {
                $result = $response->json(); // Parse as JSON
            } else {
                $result = $response->body(); // Otherwise get plain text response
            }

            // Return the result to the frontend or view
            return response()->json([
                'success' => true,
                'result' => $result
            ]);

        } catch (\Exception $e) {
            // Handle errors and return the error message
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    
}

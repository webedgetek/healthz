<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use
use App\Models\Title;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Relation;
use Livewire\WithFileUploads;

class PatientRegister extends Component
{
    use WithFileUploads;

    public $titles, $genders, $regions, $religions, $relations;
    public $title, $firstname, $middlename, $lastname, $birth_date, $gender, $nationality, $occupation, $education, $telephone, $address, $region, $religion, $email, $old_folder;
    public $e_fullname, $e_relationship, $e_telephone;
    public $sponsorship_type, $sponsor_name, $membership, $start_date, $end_date;

    protected $rules = [
        'title' => 'required',
        'firstname' => 'required',
        'middlename' => 'nullable',
        'lastname' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'nationality' => 'required',
        'occupation' => 'required',
        'education' => 'required',
        'telephone' => 'required|numeric',
        'address' => 'required',
        'region' => 'required',
        'religion' => 'required',
        'email' => 'required|email',
        'old_folder' => 'nullable',
        'e_fullname' => 'required',
        'e_relationship' => 'required',
        'e_telephone' => 'required|numeric',
        'sponsorship_type' => 'required',
        'sponsor_name' => 'required',
        'membership' => 'nullable',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ];

    public function mount()
    {
        // $this->titles = Title::all(); // Fetch titles from the database
        // $this->genders = Gender::all(); // Fetch genders from the database
        // $this->regions = Region::all(); // Fetch regions from the database
        // $this->religions = Religion::all(); // Fetch religions from the database
        // $this->relations = Relation::all(); // Fetch relations from the database
    }

     public function submit()
    {
        $validatedData = $this->validate();
        
        // Save the data to the database or perform any other action
        PatientRegister::create($validatedData);

        // Reset the form fields after submission
        $this->resetForm();
        session()->flash('message', 'Patient registered successfully.');
    }

    public function resetForm()
    {
        $this->reset([
            'title', 'firstname', 'middlename', 'lastname', 'birth_date', 'gender', 'nationality', 'occupation', 'education', 'telephone', 'address', 'region', 'religion', 'email', 'old_folder',
            'e_fullname', 'e_relationship', 'e_telephone', 'sponsorship_type', 'sponsor_name', 'membership', 'start_date', 'end_date'
        ]);
    }

    // public function generateopdnumber()
    // {

    // }


    public function render()
    {
        // return view('livewire.patient.create');
        return view('livewire.patient.create', [
            'title' => Title::all(), 
            'religion' => Religion::all(), 
            'gender' => Gender::all(),
            'region'=> Region::all(),
            'relation'=> Relation::all(),
        ]);
    }
}

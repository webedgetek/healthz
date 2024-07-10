<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use
use App\Models\Title;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\Region;

class Patient extends Component
{
    public function render()
    {
        // return view('livewire.patient.create');

        return view('livewire.patient.create', [
            'title' => Title::all(), 
            'religion' => Religion::all(), 
            'gender' => Gender::all(),
            'region'=> Region::all(),
        ]);
    }
}

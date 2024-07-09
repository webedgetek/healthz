<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use
use App\Models\Title;

class Patient extends Component
{
    public function render()
    {
        // return view('livewire.patient.create');

        return view('livewire.patient.create', [
            'title' => Title::all(),
        ]);
    }
}

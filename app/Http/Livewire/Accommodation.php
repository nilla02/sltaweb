<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Accommodation extends Component
{
    protected $listeners = ['getAccommodation'];
    public function getAccommodation(accommodation $accommodation)
    {
    }

    public function render()
    {
        return view('livewire.accommodation');
    }
}

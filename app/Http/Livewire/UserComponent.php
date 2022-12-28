<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        // dd('salom '.auth()->user()->name);
        return view('livewire.user-component')->layout('layouts.base');
    }
}

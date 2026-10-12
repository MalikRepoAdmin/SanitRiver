<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use Illuminate\Support\Facades\Validator;

class CreateLaporanLivewire extends Component
{
    /**
     * Properties
     */
    
    
    public function render()
    {
        return view('livewire.create-laporan');
    }
}
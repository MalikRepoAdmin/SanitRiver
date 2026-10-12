<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;

class SungaiMapLivewire extends Component
{
    /**
     * Properties
     */
    
    
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.sungai-map');
    }
}
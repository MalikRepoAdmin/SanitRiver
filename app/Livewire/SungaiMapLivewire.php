<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use App\Models\Sungai;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('components.layouts.app')]
class SungaiMapLivewire extends Component
{
    /**
     * Properties
     */
    public ?int $selectedSungaiId = null;
    public ?string $message = null;

    /**
     * Computed Properties
     */
    #[Computed]
    public function selectedSungai(): ?Sungai
    {
        if ($this->selectedSungaiId === null) {
            return null;
        }

        return Sungai::with('gambarSungais')->find($this->selectedSungaiId);
    }
    
    
    public function render()
    {
        return view('livewire.sungai-map');
    }

    /**
     * Called when user selects a Waterway on the Leaflet map
     */
    #[On('river-selected')]
    public function selectSungai(int $sungaiId)
    {
        try
        {
            Sungai::findOrFail($sungaiId);
        }
        catch(ModelNotFoundException $e)
        {
            $this->message = "Sungai yang di pilih tidak tersedia";
        }

        $this->selectedSungaiId = $sungaiId;
    }
}
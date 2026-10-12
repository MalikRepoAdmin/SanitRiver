<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use App\Models\Sungai;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

class DashboardLivewire extends Component
{
    /**
     * Computed Properties
     */
    #[Computed]
    public function user(): ?User
    {
        return Auth::user();
    }

    #[Computed]
    public function usernameAlias(): ?string
    {
        return str($this->user->username)->wordCount() > 1 ? 2 : 1;
    }

    #[Computed]
    public function laporansungaiLatest()
    {
        return LaporanSungai::with(['user', 'gambarSungais'])->latest()->paginate(3);
    }

    #[Computed]
    public function laporansungais()
    {
        return LaporanSungai::all();
    }

    #[Computed]
    public function sungais()
    {
        return Sungai::all();
    }


    #[Computed]
    public function laporansungaiCount(): int
    {
        return LaporanSungai::count();
    }

    #[Computed]
    public function sungaiCount(): int
    {
        return Sungai::count();
    }

    #[Computed]
    public function userCount(): int
    {
        return User::count();
    }


    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.index');
    }
}
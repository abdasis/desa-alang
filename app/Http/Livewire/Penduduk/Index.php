<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\Keluarga;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.penduduk.index', [
            'dataPenduduk' => Keluarga::latest()->get()
        ]);
    }
}

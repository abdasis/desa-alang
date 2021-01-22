<?php

namespace App\Http\Livewire;

use App\Models\Keluarga;
use Livewire\Component;

class ScanKartu extends Component
{
    public $data_kartu;
    public $showData = false;
    public $dataKeluarga;
    public function store()
    {
        $this->dataKeluarga = Keluarga::whereKodeKeluarga($this->data_kartu)->first();
        if ($this->dataKeluarga) {
            $this->alert('success', 'Berhasil!', [
                'text' => 'Data Keluarga Berhasil Ditemukan',
                'toast' => false,
                'position' => 'center'

            ]);
            $this->showData = true;
        } else {
            $this->alert('error', 'Maaf!', [
                'text' => 'Data Keluarga Berhasil Ditemukan',
                'toast' => false,
                'position' => 'center'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.scan-kartu');
    }
}

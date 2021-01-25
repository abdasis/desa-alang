<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\Keluarga;
use Livewire\Component;

class Index extends Component
{
    public $keluarga;
    protected $listeners = [
        'confirmed',
        'cancelled',
    ];

    public function delete($id)
    {
        $this->confirm('Apakah yakin hapus data ini?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => "Cancel",
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
        $this->keluarga = Keluarga::find($id);
    }
    public function confirmed()
    {
        $this->keluarga->delete();
        $this->alert(
            'success',
            'Data berhasil di hapus.'
        );
    }

    public function cancelled()
    {
        $this->alert('info', 'Tidak jadi dihapus');
    }

    public function render()
    {
        return view('livewire.penduduk.index', [
            'dataPenduduk' => Keluarga::latest()->get()
        ]);
    }
}

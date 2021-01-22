<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\Keluarga;
use Livewire\Component;

class Update extends Component
{
    // kolom table keluarga
    public $kode_keluarga, $nomor_rumah, $dusun, $binatang_ternak, $jenis_kartu;

    // kolom table anggota keluarga
    public $nama_keluarga, $umur, $ktp, $npwp, $pendidikan, $status, $pindah, $pisah, $penghasilan,
        $status_keluarga, $pekerjaan, $keterangan_pekerjaan, $scan_kartu;

    // kolom table bantuan
    public $pkh, $bpnt, $pertanian, $keagamaan, $lainnya;

    // kolom table pemilik kartu
    public $kis, $bpjs, $kartuLainnya, $riwayat_penyakit;

    // kolom tetangga
    public $barat, $timur, $utara, $selatan;
    public $formKeluarga = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->formKeluarga, $i);
    }

    public function remove($i)
    {
        unset($this->formKeluarga[$i]);
    }


    public function mount($id)
    {
        $penduduk = Keluarga::find($id);
        $this->kode_keluarga = $penduduk->kode_keluarga;
        $this->nomor_rumah = $penduduk->nomor_rumah;
        $this->dusun = $penduduk->dusun;
        $this->jenis_kartu = $penduduk->jenis_kartu;
        $this->scan_kartu = $penduduk->kode_keluarga;
        $this->binatang_ternak = $penduduk->binatang_ternak;
        foreach ($penduduk->anggotaKeluarga as $key => $keluarga) {
            $this->nama_keluarga[$key] = $keluarga->nama;
            $this->umur[$key] = $keluarga->umur;
            $this->pendidikan[$key] = $keluarga->pendidikan;
            $this->penghasilan[$key] = $keluarga->penghasilan;
            $this->pindah[$key] = $keluarga->pindah;
            $this->pisah[$key] = $keluarga->pisah;
            $this->status[$key] = $keluarga->menikah;
            $this->status_keluarga[$key] = $keluarga->status_keluarga;
            $this->pekerjaan[$key] = $keluarga->pekerjaan;
            $this->keterangan_pekerjaan[$key] = $keluarga->keterangan_pekerjaan;
        }

        $this->pkh = $penduduk->bantuan->pkh;
        $this->bpnt = $penduduk->bantuan->bpnt;
        $this->pertanian = $penduduk->bantuan->pertanian;
        $this->keagamaan = $penduduk->bantuan->keagamaan;
        $this->lainnya = $penduduk->bantuan->lainnya;

        $this->kis = $penduduk->pemilikKartu->kis;
        $this->bpjs = $penduduk->pemilikKartu->bpjs;
        $this->lainnya = $penduduk->pemilikKartu->lainnya;
        $this->riwayat_penyakit = $penduduk->pemilikKartu->riwayat_penyakit;

        $this->barat = $penduduk->tetangga->barat;
        $this->timur = $penduduk->tetangga->timur;
        $this->utara = $penduduk->tetangga->utara;
        $this->selatan = $penduduk->tetangga->selatan;
    }
    public function render()
    {
        return view('livewire.penduduk.update');
    }
}

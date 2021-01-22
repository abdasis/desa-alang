<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\AnggotaKeluarga;
use App\Models\Bantuan;
use App\Models\Keluarga;
use App\Models\PemilikKartu;
use App\Models\Tetangga;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    // kolom table keluarga
    public $kode_keluarga, $nomor_rumah, $dusun, $binatang_ternak;

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

    public function store()
    {
        dd($this->scan_kartu);
        try {
            DB::beginTransaction();
            // insert data untuk table keluarga
            $keluarga = new Keluarga();
            $keluarga->kode_keluarga = $this->scan_kartu;
            $keluarga->nomor_rumah = $this->nomor_rumah;
            $keluarga->dusun = $this->dusun;
            $keluarga->binatang_ternak = $this->binatang_ternak;
            $keluarga->save();

            // insert data untuk table bantuan
            $bantuan = new Bantuan();
            $bantuan->pkh = $this->pkh;
            $bantuan->bpnt = $this->bpnt;
            $bantuan->pertanian = $this->pertanian;
            $bantuan->keagamaan = $this->keagamaan;
            $bantuan->lainnya = $this->lainnya;
            $keluarga->bantuan()->save($bantuan);

            // insert data untuk pemilik kartu
            $kartu = new PemilikKartu();
            $kartu->kis = $this->kis;
            $kartu->bpjs = $this->bpjs;
            $kartu->lainnya = $this->kartuLainnya;
            $kartu->riwayat_penyakit = $this->riwayat_penyakit;
            $keluarga->pemilikKartu()->save($kartu);


            // insert data tetangga
            $tetangga = new Tetangga();
            $tetangga->barat = $this->barat;
            $tetangga->timur = $this->timur;
            $tetangga->utara = $this->utara;
            $tetangga->selatan = $this->selatan;
            $keluarga->tetangga()->save($tetangga);

            // inserta data untuk anggota keluarga
            foreach ($this->nama_keluarga as $key => $value) {

                // dd($this->keterangan_pekerjaan[$key]);
                $anggotaKeluarga = new AnggotaKeluarga();
                $anggotaKeluarga->nama = $this->nama_keluarga[$key];
                $anggotaKeluarga->umur = $this->umur[$key];
                // $anggotaKeluarga->ktp = $this->ktp[$key];
                // $anggotaKeluarga->npwp = $this->npwp[$key];
                $anggotaKeluarga->pendidikan = $this->pendidikan[$key];
                $anggotaKeluarga->menikah = $this->status[$key];
                $anggotaKeluarga->pindah = $this->pindah[$key];
                // $anggotaKeluarga->pisah = $this->pisah[$key];
                $anggotaKeluarga->penghasilan = $this->penghasilan[$key];
                $anggotaKeluarga->status_keluarga = $this->status_keluarga[$key];
                $anggotaKeluarga->pekerjaan = $this->pekerjaan[$key];
                $anggotaKeluarga->keterangan_pekerjaan = $this->keterangan_pekerjaan[$key];
                $keluarga->anggotaKeluarga()->save($anggotaKeluarga);
            }
            DB::commit();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
    }
    public function remove($i)
    {
        unset($this->formKeluarga[$i]);
    }
    public function render()
    {
        return view('livewire.penduduk.create');
    }
}

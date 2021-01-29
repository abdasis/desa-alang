<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\AnggotaKeluarga;
use App\Models\Bantuan;
use App\Models\Keluarga;
use App\Models\PemilikKartu;
use App\Models\Tetangga;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    // kolom table keluarga
    public $kode_keluarga, $nomor_rumah, $dusun, $binatang_ternak, $jenis_kartu;

    // kolom table anggota keluarga
    public $nama_keluarga, $umur, $ktp, $kk, $pendidikan, $status, $pindah, $pisah, $penghasilan,
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

    public function rules()
    {
        return [
            'nomor_rumah' => 'required|unique:keluargas',
            'scan_kartu' => 'required|unique:keluargas,kode_keluarga',
            'jenis_kartu' => 'required',
            'nama_keluarga.0' => 'required',
            'nama_keluarga.*' => 'required'

        ];
    }

    public function store()
    {

        try {
            $this->validate();
            DB::beginTransaction();
            // insert data untuk table keluarga
            $keluarga = new Keluarga();
            $keluarga->kode_keluarga = $this->scan_kartu;
            $keluarga->jenis_kartu = $this->jenis_kartu;
            $keluarga->nomor_rumah = $this->nomor_rumah;
            $keluarga->kk = $this->kk;
            $keluarga->dusun = Str::title($this->dusun);
            $keluarga->binatang_ternak = Str::title($this->binatang_ternak);
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
            $tetangga->barat = Str::title($this->barat);
            $tetangga->timur = Str::title($this->timur);
            $tetangga->utara = Str::title($this->utara);
            $tetangga->selatan = Str::title($this->selatan);
            $keluarga->tetangga()->save($tetangga);

            // inserta data untuk anggota keluarga
            if ($this->nama_keluarga > 1) {
                foreach ($this->nama_keluarga as $key => $value) {
                    // dd($this->keterangan_pekerjaan[$key]);
                    $anggotaKeluarga = new AnggotaKeluarga();
                    $anggotaKeluarga->nama = Str::title($this->nama_keluarga);
                    $anggotaKeluarga->umur = $this->umur ?? '';
                    $anggotaKeluarga->ktp = $this->ktp ?? '';
                    $anggotaKeluarga->pendidikan = $this->pendidikan ?? '';
                    $anggotaKeluarga->menikah = $this->status ?? '';
                    $anggotaKeluarga->pindah = $this->pindah ?? '';
                    // $anggotaKeluarga->pisah = $this->pisah;
                    $anggotaKeluarga->penghasilan = $this->penghasilan;
                    $anggotaKeluarga->status_keluarga = $this->status_keluarga;
                    $anggotaKeluarga->pekerjaan = $this->pekerjaan ?? '';
                    $anggotaKeluarga->keterangan_pekerjaan = $this->keterangan_pekerjaan ?? '';
                    $keluarga->anggotaKeluarga()->save($anggotaKeluarga);
                }
            }

            DB::commit();
            $this->alert('success', 'Data berhasil disimpan');
            $this->reset();
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

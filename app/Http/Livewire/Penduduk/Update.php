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

class Update extends Component
{
    // kolom table keluarga
    public $kode_keluarga, $nomor_rumah, $dusun, $binatang_ternak, $jenis_kartu, $keluarga_id;

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

    public function remove($i)
    {
        unset($this->formKeluarga[$i]);
    }


    public function mount($id)
    {

        $penduduk = Keluarga::find($id);
        $this->nomor_rumah = $penduduk->nomor_rumah;
        $this->kk = $penduduk->kk;
        $this->dusun = $penduduk->dusun;
        $this->jenis_kartu = $penduduk->jenis_kartu;
        $this->scan_kartu = $penduduk->kode_keluarga;
        $this->binatang_ternak = $penduduk->binatang_ternak;
        $this->keluarga_id = $penduduk->id;
        foreach ($penduduk->anggotaKeluarga as $key => $keluarga) {
            $this->ktp[$key] = $keluarga->ktp;
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
            $this->formKeluarga[$key] = $key;
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

    public function rules()
    {
        return [
            'jenis_kartu' => 'required',
            'nama_keluarga.0' => 'required',
            'nama_keluarga.*' => 'required'

        ];
    }

    public function update()
    {
        try {
            $this->validate();
            DB::beginTransaction();
            // insert data untuk table keluarga
            $keluarga = Keluarga::find($this->keluarga_id);
            $keluarga->kode_keluarga = $this->scan_kartu;
            $keluarga->jenis_kartu = $this->jenis_kartu;
            $keluarga->nomor_rumah = $this->nomor_rumah;
            $keluarga->kk = $this->kk;
            $keluarga->dusun = Str::title($this->dusun);
            $keluarga->binatang_ternak = Str::title($this->binatang_ternak);
            $keluarga->save();

            // insert data untuk table bantuan
            $bantuan = $keluarga->bantuan;
            $bantuan->pkh = $this->pkh;
            $bantuan->bpnt = $this->bpnt;
            $bantuan->pertanian = $this->pertanian;
            $bantuan->keagamaan = $this->keagamaan;
            $bantuan->lainnya = $this->lainnya;
            $keluarga->bantuan()->save($bantuan);

            // insert data untuk pemilik kartu
            $kartu = $keluarga->pemilikKartu;
            $kartu->kis = $this->kis;
            $kartu->bpjs = $this->bpjs;
            $kartu->lainnya = $this->kartuLainnya;
            $kartu->riwayat_penyakit = $this->riwayat_penyakit;
            $keluarga->pemilikKartu()->save($kartu);


            // insert data tetangga
            $tetangga = $keluarga->tetangga;
            $tetangga->barat = Str::title($this->barat);
            $tetangga->timur = Str::title($this->timur);
            $tetangga->utara = Str::title($this->utara);
            $tetangga->selatan = Str::title($this->selatan);
            $keluarga->tetangga()->save($tetangga);

            $keluarga->anggotaKeluarga()->delete();
            // inserta data untuk anggota keluarga
            if ($this->nama_keluarga > 1) {
                foreach ($this->nama_keluarga as $key => $value) {

                    // dd($this->keterangan_pekerjaan[$key]);
                    $anggotaKeluarga = new AnggotaKeluarga();
                    $anggotaKeluarga->nama = Str::title($this->nama_keluarga[$key]) ?? '';
                    $anggotaKeluarga->umur = $this->umur[$key] ?? '';
                    $anggotaKeluarga->ktp = $this->ktp[$key] ?? '';
                    $anggotaKeluarga->npwp = $this->kk[$key] ?? '';
                    $anggotaKeluarga->pendidikan = $this->pendidikan[$key] ?? '';
                    $anggotaKeluarga->menikah = $this->status[$key] ?? 'Tidak';
                    $anggotaKeluarga->pindah = $this->pindah[$key] ?? 'Tidak';
                    // $anggotaKeluarga->pisah = $this->pisah[$key];
                    $anggotaKeluarga->penghasilan = $this->penghasilan[$key] ?? '';
                    $anggotaKeluarga->status_keluarga = $this->status_keluarga[$key] ?? '';
                    $anggotaKeluarga->pekerjaan = $this->pekerjaan[$key] ?? '';
                    $anggotaKeluarga->keterangan_pekerjaan = $this->keterangan_pekerjaan[$key] ?? '';
                    $keluarga->anggotaKeluarga()->save($anggotaKeluarga);
                }
            }

            DB::commit();
            $this->alert('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
    }
    public function render()
    {
        return view('livewire.penduduk.update');
    }
}

<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white border-bottom">
                    <h4>Formulir Pendataan Keluarga</h4>
                </div>

                <div class="card-body">
                    <form wire:submit.prevent='update'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nomor Rumah</label>
                                    <input type="text" wire:model='nomor_rumah' id=""
                                        class="form-control shadow-none @error('nomor_rumah') is-invalid @enderror"
                                        placeholder="001">
                                    @error('nomor_rumah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Dusun</label>
                                    <input type="text" name="" id="" wire:model='dusun' class="form-control shadow-none"
                                        placeholder="Masukan Dusun">
                                </div>
                            </div>
                        </div>

                        @foreach ($formKeluarga as $key => $value)
                        <fieldset>
                            <legend>
                                <h5 class="text-white bg-success p-2">Anggota Keluarga
                                    <div class="float-right">
                                        <span wire:click='remove({{ $key }})' style="cursor: pointer"><i
                                                class="fa fa-minus"></i></span>
                                        <span wire:click='add({{ $i }})' style="cursor: pointer;"><i
                                                class="fa fa-plus mx-2"></i></span>
                                    </div>
                                </h5>
                            </legend>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nama Keluarga</label>
                                        <input type="text" wire:model='nama_keluarga.{{ $value }}' name="" id=""
                                            class="form-control shadow-none" placeholder="Masukan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Umur</label>
                                        <input type="text" name="" wire:model='umur.{{ $value }}' id=""
                                            class="form-control shadow-none" placeholder="22">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pendidikan.{{ $value }}">Pendidikan</label>
                                        <select class="custom-select shadow-none" wire:model='pendidikan.{{ $value }}'
                                            id="pendidikan.{{ $value }}">
                                            <option selected>Pilih Pendidikan</option>
                                            <option value="SD/Sederajat">SD/Sederajat</option>
                                            <option value="SMP/Sederajart">SMP/Sederajat</option>
                                            <option value="SMA/Sederajat">SMA/Sederajat</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Penghasilan</label>
                                        <input type="text" name="" id="" wire:model='penghasilan.{{ $value }}'
                                            class="form-control shadow-none" placeholder="3.000.000">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status.{{ $value }}">Status</label>
                                        <select class="custom-select shadow-none" wire:model='status.{{ $value }}'
                                            name="status.{{ $value }}" id="status.{{ $value }}">
                                            <option selected>Pilih</option>
                                            <option value="YA">Menikah</option>
                                            <option value="TIDAK">Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status_keluarga.{{ $value }}">Status Keluarga</label>
                                        <select class="custom-select shadow-none"
                                            wire:model='status_keluarga.{{ $value }}'
                                            name="status_keluarga.{{ $value }}" id="status_keluarga.{{ $value }}">
                                            <option selected>Pilih</option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            <option value="Anggota">Anggota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pindah.{{ $value }}">Pindah KSK</label>
                                        <select class="custom-select shadow-none" wire:model='pindah.{{ $value }}'
                                            name="pindah.{{ $value }}" id="pindah.{{ $value }}">
                                            <option selected>Pilih</option>
                                            <option value="YA">Ya</option>
                                            <option value="TIDAK">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pekerjaan.{{ $value }}">Pekerjaan</label>
                                        <select class="custom-select shadow-none" wire:model='pekerjaan.{{ $value }}'
                                            name="pekerjaan.{{ $value }}" id="pekerjaan.{{ $value }}">
                                            <option selected>Pilih</option>
                                            <option value="Petani">Petani</option>
                                            <option value="Pedagang">Pedagang</option>
                                            <option value="Wirausaha">Wirausaha</option>
                                            <option value="ASN">ASN</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Keterangan Pekerjaan</label>
                                        <textarea class="form-control shadow-none"
                                            wire:model='keterangan_pekerjaan.{{ $value }}' name="" id=""
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        @endforeach
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penerima Kartu Bantuan</label>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input id="kis" wire:model='kis' type="checkbox">
                                        <label for="kis">
                                            KIS
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input id="bpjs" wire:model='bpjs' type="checkbox">
                                        <label for="bpjs">
                                            BPJS
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input id="kartuLainnya" wire:model='kartuLainnya' type="checkbox">
                                        <label for="kartuLainnya">
                                            Lainnya
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penerima Bantuan</label>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input wire:model='pkh' id="pkh" type="checkbox">
                                        <label for="pkh">
                                            PKH
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input wire:model='bpnt' id="bpnt" type="checkbox">
                                        <label for="bpnt">
                                            BPNT
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input wire:model='pertanian' id="pertanian" type="checkbox">
                                        <label for="pertanian">
                                            Pertanian
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-success mb-2">
                                        <input wire:model='keagamaan' id="keagamaan" type="checkbox">
                                        <label for="keagamaan">
                                            Keagamaan
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-success mb-2">
                                        <input wire:model='lainnya' id="lainnya" type="checkbox">
                                        <label for="lainnya">
                                            Lainnya
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Binatang Ternak</label>
                                    <textarea wire:model='binatang_ternak' class="form-control shadow-none" name=""
                                        id="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tetangga Utara</label>
                                    <input wire:model='utara' type="text" name="" id="" class="form-control shadow-none"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tetangga Timur</label>
                                    <input wire:model='timur' type="text" name="" id="" class="form-control shadow-none"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tetangga Selatan</label>
                                    <input wire:model='selatan' type="text" name="" id=""
                                        class="form-control shadow-none" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tetangga Barat</label>
                                    <input wire:model='barat' type="text" name="" id="" class="form-control shadow-none"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    Silahkan Scan Kartu Keluarga Untuk Menyimpan Data
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jenis_kartu">Jenis Kartu</label>
                                    <select class="custom-select shadow-none @error('jenis_kartu') is-invalid @enderror"
                                        wire:model="jenis_kartu" id="jenis_kartu">
                                        <option>Pilih Kartu</option>
                                        <option value="Kuning">Kuning</option>
                                        <option value="Merah">Merah</option>
                                        <option value="Hijau">Hijau</option>
                                    </select>
                                    @error('scan_kartu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Scan Kartu</label>
                                    <input autofocus type="text" wire:model='scan_kartu' name="" id="scan_kartu" class="form-control shadow-none
                                            @if ($jenis_kartu == 'Kuning')
                                               border border-warning bg-soft-warning
                                            @elseif ($jenis_kartu == 'Merah')
                                                border border-danger bg-soft-danger
                                            @elseif($jenis_kartu == 'Hijau')
                                                border border-success bg-soft-success
                                            @else
                                            @endif

                                            @error('scan_kartu') is-invalid @enderror
                                        " placeholder="Scan Kartu Untuk Menyimpan">
                                    @error('scan_kartu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-none">
                            <button class="btn btn-danger">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-white border-bottom">Scan Kartu Keluarga</h5>
                <div class="card-body text-center">
                    <form wire:submit.prevent='store'>
                        <div class="form-group">
                            <label for="">Scan Kartu</label>
                            <input autofocus maxlength="10" type="text" wire:model='data_kartu' name="" id="scan_kartu"
                                class="form-control form-control-lg shadow-none rounded-pill"
                                placeholder="Tempelkan Kartu Pada RFID">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($showData)
        <div class="col-md-12">
            <div class="card bg-su">
                <h5 class="card-header bg-white border-bottom">
                    Data Keluarga
                </h5>
                <div class="card-body">
                    <table class="table table-borderless table-responsive">
                        <tbody>
                            <tr>
                                <th scope="row">Kode Keluarga Keluarga</th>
                                <td>:</td>
                                <td>{{ $dataKeluarga->kode_keluarga }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Rumah</th>
                                <td>:</td>
                                <td>{{ $dataKeluarga->nomor_rumah }}
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Dusun</th>
                                <td>:</td>
                                <td>{{ $dataKeluarga->dusun }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Binatang Ternak</th>
                                <td>:</td>
                                <td>{{ $dataKeluarga->binatang_ternak }}
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Kepala Rumah Tangga</th>
                                <td>:</td>
                                <td>{{ $dataKeluarga->anggotaKeluarga->where('status_keluarga', 'Kepala Keluarga')->first()->nama }}
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


@push('js')
<script>
    $(document).ready(function(){
            $('#scan_kartu').focus()
        })
</script>
@endpush

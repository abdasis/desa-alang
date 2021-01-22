<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Data Keluarga</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                            <i class="fe-shopping-bag font-22 avatar-title text-danger"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">178</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Penduduk</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                            <i class="fe-gitlab font-22 avatar-title text-secondary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">289</span></h3>
                            <p class="text-muted mb-1 text-truncate">Kartu Hijau</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                            <i class="fe-gift font-22 avatar-title text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">1021</span></h3>
                            <p class="text-muted mb-1 text-truncate">Kartu Kuning</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                            <i class="fe-users font-22 avatar-title text-pink"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">154</span>k</h3>
                            <p class="text-muted mb-1 text-truncate">Kartu Merah</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-white border-bottom">Data Penduduk</h5>
                <table class="table table-sm card-body table-nowrap">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Nomor Kartu</th>
                            <th>Dusun</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Pendidikan</th>
                            <th>Penghasilan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPenduduk as $key => $penduduk)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td>{{ $penduduk->kode_keluarga }}</td>
                            <td>{{ $penduduk->dusun}}</td>
                            <td>
                                @foreach ($penduduk->anggotaKeluarga as $anggotaKeluarga)
                                {{ $anggotaKeluarga->nama }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($penduduk->anggotaKeluarga as $anggotaKeluarga)
                                {{ $anggotaKeluarga->umur }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($penduduk->anggotaKeluarga as $anggotaKeluarga)
                                {{ $anggotaKeluarga->pendidikan }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($penduduk->anggotaKeluarga as $anggotaKeluarga)
                                {{ $anggotaKeluarga->penghasilan }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('keluarga.update', $penduduk->id) }}">
                                    <button class="btn-sm shadow-none btn btn-warning"><i
                                            class="fa fa-user-edit"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@extends('frontend.layouts.app')

@section('title', 'Pameran | List')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="float-left">
                                    <h5>Data LPJ</h5>
                                </div>
                                <div class="float-right">
                                    {{-- <a href="{{ route('frontend.user.pameran.create') }}" class="btn btn-success">Form Pameran <i class="fas fa-plus-square"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <form class="row" action="{{ url()->current() }}">
                                <div class="col-12">
                                    <div class="d-print-none row" style=" margin-right: 0px;padding-left: 15px;">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="pb-2 col-6" >
                                                    <div style="padding-top: 5px; padding-bottom: 5px">
                                                        <label class="form-check-label">Penanggung Jawab</label>
                                                    </div>
                                                    <input class="form-control" type="text" value="{{ request()->nama ?? '' }}" name="nama" style="font-size: small" />
                                                </div>
                                                <div class="pb-2 col-6" >
                                                    <div style="padding-top: 5px; padding-bottom: 5px">
                                                        <label class="form-check-label">Judul Pameran</label>
                                                    </div>
                                                    <input class="form-control" type="text" value="{{ request()->email ?? '' }}" name="email" style="font-size: small" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pb-2 col">
                                            <div  style="padding-top: 5px; padding-bottom: 5px">
                                                <label class="form-check-label">ID Pameran</label>
                                            </div>
                                            <input class="form-control" type="text" value="{{ request()->nama ?? '' }}" name="nama" style="font-size: small" />
                                        </div>
                                        <div class="pb-2 col">
                                            <div  style="padding-top: 5px; padding-bottom: 5px">
                                                <label class="form-check-label">Status</label>
                                            </div>
                                            <select id="status" name="status" class="form-control">
                                                <option value="">Semua</option>
                                                <option value="1">Belum Aktif</option>
                                                <option value="2">Konfirmasi</option>
                                                <option value="3">Aktif</option>
                                            </select>
                                        </div>
                                        <div class="pb-2 col">
                                            <div  style="padding-top: 5px; padding-bottom: 5px">
                                                <label class="form-check-label">Tanggal</label>
                                            </div>
                                            <input class="form-control" type="text" value="{{ request()->nama ?? '' }}" name="tanggal" style="font-size: small" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4 text-right" style="padding-bottom:20px;">
                                            <div class="align-middle">
                                                <button type="submit" class="btn btn-primary btn-sm btn-block" > <i class="fas fa-search"></i> Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card mb-2 bg-gray-500 text-white" style="border-radius: 5px; font-size: 12px;">
                            <div class="row p-2 font-weight-bold">
                                <div class="col-3 d-none d-sm-block">Status</div>
                                <div class="col-6 col-sm-5">Pameran</div>
                                <div class="col-6 col-sm-4">Lokasi</div>
                            </div>
                        </div>

                        <a href="/pameran/show" style="text-decoration: none;">
                            <div class="card mb-2" style="border-radius: 5px; font-size: 12px">
                                <div class="row p-2">
                                    <div class="col-12 col-sm-3">
                                        {{-- Jika Tampilan desktop/laptop --}}
                                        <div class="row d-none d-sm-block">
                                            {{-- @if ($data->status == 1) --}}
                                                {{-- <div class="col-2 pt-1 float-left d-none d-sm-block" style="padding-right: 40px">
                                                    <form action="" onsubmit="return confirm('Apakah Anda yakin, data dihapus ?');">
                                                        @csrf
                                                        <input type="hidden" name="metode" value="hapus">
                                                        <input type="hidden" name="id" value="data->id }}">
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div> --}}
                                            {{-- @endif --}}
                                            <div class="pl-3" style="">
                                                {{-- @if ($data->status == 1) --}}
                                                    {{-- <div class="badge badge-danger">Belum Membuar LPJ</div> --}}
                                                {{-- @elseif ($data->status == 2) --}}
                                                    <div class="badge badge-warning" style="color: black">Menuggu Persetujuan LPJ</div>
                                                {{-- @elseif ($data->status == 3) --}}
                                                    {{-- <div class="badge badge-success">DISETUJUI</div> --}}
                                                {{-- @endif --}}
                                                <div class="text-muted font-weight-bold">
                                                    {{-- @if ($data->jenis == 1) --}}
                                                         01-31 JUNI 2021
                                                    {{-- @elseif ($data->jenis == 2)
                                                        Transaksi Afiliasi
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Jika Tampilan mobile/hp --}}
                                        <div class="row d-sm-none">
                                            {{-- @if ($data->status == 1) --}}
                                                {{-- <div class="pt-1 pull-right position-absolute " style="right: 20px">
                                                    <form action="" onsubmit="return confirm('Apakah Anda yakin, data dihapus ?');">
                                                        @csrf
                                                        <input type="hidden" name="metode" value="hapus">
                                                        <input type="hidden" name="id" value="data->id }}">
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div> --}}
                                            {{-- @elseif ($data->status == 2)
                                                <div class="pt-1 pull-right position-absolute " style="right: 20px">
                                                    <button class="btn btn-sm btn-warning btn-pill">
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </button>
                                                </div>
                                            @elseif ($data->status == 3)
                                                <div class="pt-1 pull-right position-absolute " style="right: 20px">
                                                    <button class="btn btn-sm btn-success btn-pill">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </div>
                                            @endif --}}
                                            <div class="pl-3" style="">
                                                {{-- @if ($data->status == 1) --}}
                                                    {{-- <div class="badge badge-danger">Menuggu Persetujuan</div> --}}
                                                {{-- @elseif ($data->status == 2)
                                                    <div class="badge badge-warning">Menuggu Konfirmasi</div>
                                                @elseif ($data->status == 3)
                                                    <div class="badge badge-success">Aktif</div>
                                                @endif --}}
                                                <div class="badge badge-success">DISETUJUI</div>

                                                <div class="text-muted font-weight-bold">
                                                    {{-- @if ($data->jenis == 1) --}}
                                                         01-31 JUNI 2021
                                                    {{-- @elseif ($data->jenis == 2)
                                                        Transaksi Afiliasi
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-sm-none">
                                        <hr class="mt-2 mb-2 ml-0 mr-0">
                                    </div>
                                    <div class="col-6 col-sm-5">
                                        <div class="font-weight-bold" style="color: #ec1b25">
                                            No: 05/704-MK/06/2021 | PAMERAN SEPAKU
                                        </div>
                                        <div class="text-muted">
                                            HARAPAN UTAMA PETUNG | Budi
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <div class="font-weight-bold" style="color: #222222">
                                            Jl.Negara rt 01 Sukaraja, SEPAKU
                                        </div>
                                        <div class="text-muted">
                                            Pengajuan 20 MEI 2021
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="/pameran/show" style="text-decoration: none;">
                            <div class="card mb-2" style="border-radius: 5px; font-size: 12px">
                                <div class="row p-2">
                                    <div class="col-12 col-sm-3">
                                        {{-- Jika Tampilan desktop/laptop --}}
                                        <div class="row d-none d-sm-block">
                                            {{-- @if ($data->status == 1) --}}
                                                {{-- <div class="col-2 pt-1 float-left d-none d-sm-block" style="padding-right: 40px">
                                                    <form action="" onsubmit="return confirm('Apakah Anda yakin, data dihapus ?');">
                                                        @csrf
                                                        <input type="hidden" name="metode" value="hapus">
                                                        <input type="hidden" name="id" value="data->id }}">
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div> --}}
                                            {{-- @endif --}}
                                            <div class="pl-3" style="">
                                                {{-- @if ($data->status == 1) --}}
                                                    {{-- <div class="badge badge-danger">Belum Membuar LPJ</div> --}}
                                                {{-- @elseif ($data->status == 2) --}}
                                                    {{-- <div class="badge badge-warning" style="color: black">Menuggu Persetujuan LPJ</div> --}}
                                                {{-- @elseif ($data->status == 3) --}}
                                                    <div class="badge badge-success">LPJ DISETUJUI</div>
                                                {{-- @endif --}}
                                                <div class="text-muted font-weight-bold">
                                                    {{-- @if ($data->jenis == 1) --}}
                                                         01-31 JUNI 2021
                                                    {{-- @elseif ($data->jenis == 2)
                                                        Transaksi Afiliasi
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Jika Tampilan mobile/hp --}}
                                        <div class="row d-sm-none">
                                            {{-- @if ($data->status == 1) --}}
                                                {{-- <div class="pt-1 pull-right position-absolute " style="right: 20px">
                                                    <form action="" onsubmit="return confirm('Apakah Anda yakin, data dihapus ?');">
                                                        @csrf
                                                        <input type="hidden" name="metode" value="hapus">
                                                        <input type="hidden" name="id" value="data->id }}">
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div> --}}
                                            {{-- @elseif ($data->status == 2)
                                                <div class="pt-1 pull-right position-absolute " style="right: 20px">
                                                    <button class="btn btn-sm btn-warning btn-pill">
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </button>
                                                </div>
                                            @elseif ($data->status == 3)
                                                <div class="pt-1 pull-right position-absolute " style="right: 20px">
                                                    <button class="btn btn-sm btn-success btn-pill">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </div>
                                            @endif --}}
                                            <div class="pl-3" style="">
                                                {{-- @if ($data->status == 1) --}}
                                                    {{-- <div class="badge badge-danger">Menuggu Persetujuan</div> --}}
                                                {{-- @elseif ($data->status == 2)
                                                    <div class="badge badge-warning">Menuggu Konfirmasi</div>
                                                @elseif ($data->status == 3)
                                                    <div class="badge badge-success">Aktif</div>
                                                @endif --}}
                                                <div class="badge badge-success">DISETUJUI</div>

                                                <div class="text-muted font-weight-bold">
                                                    {{-- @if ($data->jenis == 1) --}}
                                                         01-31 JUNI 2021
                                                    {{-- @elseif ($data->jenis == 2)
                                                        Transaksi Afiliasi
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-sm-none">
                                        <hr class="mt-2 mb-2 ml-0 mr-0">
                                    </div>
                                    <div class="col-6 col-sm-5">
                                        <div class="font-weight-bold" style="color: #ec1b25">
                                            No: 05/704-MK/06/2021 | PAMERAN SEPAKU
                                        </div>
                                        <div class="text-muted">
                                            HARAPAN UTAMA PETUNG | Budi
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <div class="font-weight-bold" style="color: #222222">
                                            Jl.Negara rt 01 Sukaraja, SEPAKU
                                        </div>
                                        <div class="text-muted">
                                            Pengajuan 20 MEI 2021
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

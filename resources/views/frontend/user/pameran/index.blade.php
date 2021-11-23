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
                                    <h5>Data Pengajuan Pameran</h5>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('frontend.user.pameran.create') }}" class="btn btn-success">Form Pameran <i class="fas fa-plus-square"></i></a>
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

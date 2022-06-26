@extends('backend.layouts.app')

@section('title', 'Display')

@section('content')
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="tambahdatadisplay" aria-hidden="true">
    <form action="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdatadisplay">Tambah Data Finance Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <input type="hidden" name="metode" value="tambah">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Finance Company</label>
                                <div class="col-sm-9">
                                    <input name="nama" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode Finance Company</label>
                                <div class="col-sm-9">
                                    <input name="kode" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Buat <i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="float-left">
                            <h5>Data Finance Company</h5>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data Finance Company <i class="cil-plus"></i></button>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <form class="row pb-2" action="{{ url()->current() }}">
                        <div class="col-12">
                            <div class="d-print-none row" style=" margin-right: 0px;padding-left: 15px;">
                                <div class="col-sm-6">
                                </div>
                                <div class="pb-2 col">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Cari</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="cil-search"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ request()->cari ?? '' }}" name="cari" placeholder="Nama Finance Company" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mb-2 bg-gray-500 text-white" style="border-radius: 5px; font-size: 12px;">
                    <div class="row p-2 font-weight-bold">
                        <div class="col-6">Nama Finance Company</div>
                        <div class="col-3">Kode</div>
                        <div class="col-3"></div>
                    </div>
                </div>

                @php
                    $first  = 0;
                    $end    = 0;
                @endphp

                @foreach($datas as $key => $data)
                    <div style="text-decoration: none;">
                        <div class="card mb-2" style="border-radius: 5px; font-size: 12px">
                            <div class="row p-2 align-items-center">
                                <div class="col-6">
                                    <div class="font-weight-bold" style="color: #ec1b25 ">
                                        {{ $data->nama }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="font-weight-bold" style="color: #222222">
                                        {{ $data->kode }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="font-weight-bold" style="color: #222222">

                                    </div>
                                    <div class="text-right">
                                        <div class="btn-group dropleft">
                                            <a data-toggle="collapse" href="#detail{{ $data->id }}" aria-expanded="false" class="btn btn-sm btn-warning">
                                                <i class="cil-pencil"></i>
                                            </a>
                                            <form action="" onsubmit="return confirm('Apakah Anda yakin data {{ $data->nama }} dihapus ?');" >
                                                <input type="hidden" name="metode" value="hapus">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="cil-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="color: #4e4e4e">
                                <div class="col-12">
                                    <div class="col-12">
                                        <div class="collapse" id="detail{{ $data->id }}">
                                            <hr>
                                            <form class="row" action="">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <input type="hidden" name="metode" value="edit">
                                                <div class="col-3">

                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Finance Company</label>
                                                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" class="form-control" name="kode" value="{{ $data->kode }}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $first  = $datas->firstItem();
                        $end    = $key + $datas->firstItem();
                    @endphp
                @endforeach
                <div class="row">
                    <div class="col-7">
                        <div class="float-left">
                            {!! $first !!} - {!! $end !!} From {!! $datas->total() !!} Data
                        </div>
                    </div><!--col-->

                    <div class="col-5">
                        <div class="float-right">
                            {!! $datas->appends(request()->query())->links() !!}
                        </div>
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>
    </div><!--col-md-10-->
</div><!--row-->



@endsection

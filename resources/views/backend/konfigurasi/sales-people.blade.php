@extends('backend.layouts.app')

@section('title', 'Admin | Sales People')

@section('content')
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="tambahdatasales" aria-hidden="true">
    <form action="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdatasales">Tambah Data Sales People</h5>
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
                                <label class="col-sm-3 col-form-label">Nama Sales People</label>
                                <div class="col-sm-9">
                                    <input name="nama" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No HP Sales People</label>
                                <div class="col-sm-9">
                                    <input name="nohp" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Honda ID Sales People</label>
                                <div class="col-sm-9">
                                    <input name="hondaid" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">HSO ID Sales People</label>
                                <div class="col-sm-9">
                                    <input name="hsoid" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dealer</label>
                                <div class="col-sm-9">
                                    <select name="dealer" class="form-control">
                                        @foreach ($datadealer as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_dealer }} - {{ $data->kota_dealer }}</option>
                                        @endforeach
                                    </select>
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
                            <h5>Data Sales People</h5>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data Sales People <i class="cil-plus"></i></button>
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

                                <div class="pb-2 col-sm-2">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Dealer </label>
                                    </div>
                                    <select id="dealer" name="dealer" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">Pilih ...</option>
                                        @if (null != request()->kota)
                                            <option value="SEMUA">SEMUA</option>
                                        @endif
                                        @foreach ($datadealer as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_dealer }} - {{ $data->kota_dealer }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pb-2 col">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Cari</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="cil-search"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ request()->cari ?? '' }}" name="cari" placeholder="Nama Sales People" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mb-2 bg-gray-500 text-white" style="border-radius: 5px; font-size: 12px;">
                    <div class="row p-2 font-weight-bold">
                        <div class="col-3">Nama Sales People</div>
                        <div class="col-3">ID</div>
                        <div class="col-3">Dealer</div>
                        <div class="col-3"></div>
                    </div>
                </div>

                @php
                    $first  = 0;
                    $end    = 0;
                @endphp

                @foreach($datas as $key => $data)
                    <a href="#" style="text-decoration: none;">
                        <div class="card mb-2" style="border-radius: 5px; font-size: 12px">
                            <div class="row p-2 align-items-center">
                                <div class="col-3">
                                    <div class="font-weight-bold" style="color: #ec1b25 ">
                                        {{ $data->nama_sales_people }}
                                        <div class="text-muted">{{ $data->nohp_sales_people }}</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="font-weight-bold" style="color: #222 ">
                                        <text style="color: rgb(96, 96, 96)">HONDA ID :</text> <strong>{{ $data->honda_id_sales_people }}</strong>
                                    </div>
                                    <div class="font-weight-bold" style="color: #222 ">
                                        <text style="color: rgb(96, 96, 96)">HSO ID :</text> <strong>{{ $data->hso_id_sales_people }}</strong>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="font-weight-bold" style="color: #222222">
                                        {{ $data->dealer->nama_dealer }}
                                        <div class="text-muted">
                                            {{ $data->dealer->kota_dealer }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="font-weight-bold" style="color: #222222">

                                    </div>
                                    <div class="text-right">
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <button type="button" class="btn btn-sm btn-warning">
                                                <i class="cil-pencil"></i>
                                            </button>
                                            <form action="" onsubmit="return confirm('Apakah Anda yakin data {{ $data->nama_sales_people }} dihapus ?');" >
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
                        </div>
                    </a>
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
<script type="text/javascript">
    $(document).ready(function(){
          $("#dealer").val("{!! request()->dealer !!}");
    });
  </script>



@endsection

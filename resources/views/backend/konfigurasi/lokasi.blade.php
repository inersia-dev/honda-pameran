@extends('backend.layouts.app')

@section('title', 'Lokasi')

@section('content')
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="tambahdatalokasi" aria-hidden="true">
    <form action="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdatalokasi">Tambah Data Lokasi</h5>
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
                                <label class="col-sm-3 col-form-label">Kota / Kabupaten</label>
                                <div class="col-sm-9">
                                    <input name="kota" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <input name="kecamatan" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelurahan / Desa</label>
                                <div class="col-sm-9">
                                    <input name="kelurahan" class="form-control" type="text" required>
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
                            <h5>Data Lokasi</h5>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-sm btn-success"  data-toggle="modal" data-target="#tambahdata">Tambah Data Lokasi <i class="cil-plus"></i></button>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <form class="row pb-2" action="{{ url()->current() }}">
                        <div class="col-12">
                            <div class="d-print-none row" style=" margin-right: 0px;padding-left: 15px;">
                                <div class="col-sm-4">
                                </div>

                                <div class="pb-2 col-sm-2">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Kota / Kabupaten </label>
                                    </div>
                                    <select id="kota" name="kota" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">Pilih ...</option>
                                        @if (null != request()->kota)
                                            <option value="SEMUA">SEMUA</option>
                                        @endif
                                        @foreach ($datakota as $data)
                                            <option value="{{ $data->kota_lokasi }}">{{ Str::title($data->kota_lokasi) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pb-2 col-sm-2">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Kecamatan </label>
                                    </div>
                                    <select id="kecamatan" name="kecamatan" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">Pilih ...</option>
                                        @if (null != request()->kecamatan)
                                            <option value="SEMUA">SEMUA</option>
                                        @endif
                                        @foreach ($datakecamatan as $data)
                                            <option value="{{ $data->kecamatan_lokasi }}">{{ $data->kecamatan_lokasi }}</option>
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
                                        <input type="text" class="form-control" value="{{ request()->cari ?? '' }}" name="cari" placeholder="Kode / Nama Lokasi" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mb-2 bg-gray-500 text-white" style="border-radius: 5px; font-size: 12px;">
                    <div class="row p-2 font-weight-bold">
                        <div class="col">Kota / Kabupaten</div>
                        <div class="col">Kecamatan</div>
                        <div class="col">Kelurahan / Desa</div>
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
                                <div class="col">
                                    <div class="font-weight-bold" style="color: #ec1b25 ">
                                        {{ Str::title($data->kota_lokasi) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="font-weight-bold" style="color: #222222">
                                        {{ $data->kecamatan_lokasi }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="font-weight-bold" style="color: #222222">
                                        {{ $data->kelurahan_lokasi }}
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
                                            <form action="" onsubmit="return confirm('Apakah Anda yakin data {{ $data->kelurahan_lokasi }} dihapus ?');" >
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
                                                        <label class="form-label">Kota</label>
                                                        <input type="text" class="form-control" name="kota" value="{{ Str::title($data->kota_lokasi) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kecamatan</label>
                                                        <input type="text" class="form-control" name="kecamatan" value="{{ $data->kecamatan_lokasi }}">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kelurahan</label>
                                                        <input type="text" class="form-control" name="kelurahan" value="{{ $data->kelurahan_lokasi }}">
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

<script type="text/javascript">
    $(document).ready(function(){
          $("#kota").val("{!! request()->kota !!}");
          $("#kecamatan").val("{!! request()->kecamatan !!}");
    });
</script>



@endsection

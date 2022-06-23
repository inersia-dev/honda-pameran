@extends('backend.layouts.app')

@section('title', 'Admin | User Dealer')

@section('content')
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="tambahdatauser" aria-hidden="true">
    <form action="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdatauser">Tambah Data User Dealer</h5>
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
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input name="nama" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input name="email" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input name="password" class="form-control" type="text" required>
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
                            <h5>Data User Dealer</h5>
                        </div>
                        <div class="float-right">
                            <button data-toggle="modal" data-target="#tambahdata" class="btn btn-sm btn-success">Tambah Data User Dealer <i class="cil-plus"></i></button>
                            <a href="{{ route('cabang.register') }}" target="private" class="btn btn-sm btn-warning"><i class="cil-link"></i></a>
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
                                    <select id="dealer" name="dealer" class="form-control">
                                        <option value="">Pilih ...</option>
                                        @if (null != request()->dealer)
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
                                        <input type="text" class="form-control" value="{{ request()->cari ?? '' }}" name="cari" placeholder="Kode / Nama / Email" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mb-2 bg-gray-500 text-white" style="border-radius: 5px; font-size: 12px;">
                    <div class="row p-2 font-weight-bold">
                        <div class="col-3">Nama</div>
                        <div class="col-3">Email</div>
                        <div class="col-3">Dealer</div>
                        <div class="col-3">Status</div>
                    </div>
                </div>

                @php
                $first  = 0;
                $end    = 0;
                @endphp

                @foreach($datas as $key => $data)
                    <div>
                        <div style="text-decoration: none;">
                            <div class="card mb-2" style="border-radius: 5px; font-size: 12px">
                                <div class="row p-2 align-items-center">
                                    <div class="col-3">
                                        <div class="font-weight-bold" style="color: #222222">
                                            {{ $data->name }}
                                            <div class="text-muted" style="color: #222222">
                                                {{ $data->kode_user }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="font-weight-bold" style="color: #ec1b25 ">
                                            {{ $data->email }}
                                            <div class="text-muted" style="color: #222222">
                                                {{ $data->nohp }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="font-weight-bold" style="color: #222222">
                                            {{ $data->dealercabang->nama_dealer ?? '-' }}
                                            <div class="text-muted" style="color: #222222">
                                                {{ $data->dealercabang->kota_dealer ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="font-weight-bold float-left" style="color: #222222">
                                            @if ($data->status == 1 || $data->status == null)
                                            <button class="btn btn-outline-warning btn-sm ">NON AKTIF</button>
                                            @elseif ($data->status == 2)
                                            <button class="btn btn-outline-success btn-sm">AKTIF</button>
                                            @endif
                                        </div>
                                        <div class="text-right">
                                            <div class="btn-group dropleft">
                                                <a data-toggle="collapse" href="#detail{{ $data->id }}" aria-expanded="false" class="btn btn-sm btn-warning">
                                                    <i class="cil-pencil"></i>
                                                </a>
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="cil-cog"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if ($data->status == 1 || $data->status == null)
                                                    <a href="?id={{ $data->id }}&metode=aktif" class="dropdown-item">
                                                        Aktifkan
                                                    </a>
                                                    @elseif ($data->status == 2)
                                                    <a href="?id={{ $data->id }}&metode=nonaktif" class="dropdown-item">
                                                        Non Aktifkan
                                                    </a>
                                                    @endif


                                                    <a href="#" title="Hapus" data-method="delete" data-trans-button-cancel="Batal" data-trans-button-confirm="Hapus"
                                                    data-trans-title="{{ $data->email }} dihapus?" class=" dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">
                                                        <form action=""  onsubmit="return confirm('Apakah Anda yakin data {{ $data->email }} dihapus ?');" style="display:none">
                                                            <input type="hidden" name="metode" value="hapus">
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                        </form>
                                                        <strong style="color: #ec1b25 ">Hapus</strong>
                                                    </a>
                                                </div>
                                            </div>
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
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="{{ $data->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">ID</label>
                                                        <input type="text" class="form-control" name="kodeuser" value="{{ $data->kode_user }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">No. HP</label>
                                                        <input type="text" class="form-control" name="nohp" value="{{ $data->nohp }}">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Dealer</label>
                                                        <select name="dealer" class="form-control">
                                                            <option value="{{ $data->dealercabang->id ?? '-' }}">{{ $data->dealercabang->nama_dealer ?? '-' }}</option>
                                                            <option value="">---</option>
                                                            @foreach ($datadealer as $data_d)
                                                                <option value="{{ $data_d->id }}">{{ $data_d->nama_dealer }} - {{ $data_d->kota_dealer }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Daftar</label>
                                                        <div class="form-label">{{ $data->created_at }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="float-right mb-3">
                                                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#password{{ $data->id }}">
                                                            Ganti Password
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="password{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="password{{ $data->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="password{{ $data->id }}Label">Ganti Password</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                    <input type="hidden" name="metode" value="password">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input value="{{ $data->name }}" class="form-control" type="text" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input name="password" class="form-control" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $first  = $datas->firstItem();
                    $end    = $data->id;
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

@extends('cabang.layouts.cabang')

@section('title', 'Buat LPJ')
@section('content')
{{-- <link rel="stylesheet"  type="text/css" href="/filepond/app.css"/> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.4/filepond.css" integrity="sha512-OwkTbucz29JjQUeii4ZRkjY/E+Xdg4AfffPZICCf98rYKWIHxX87AwwuIQ73rbVrev8goqrKmaXyu+VxyDqr1A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link
href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
rel="stylesheet"
/>

<style>
    .table td {
        vertical-align: baseline;
    }
</style>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="card-body" action="{{ route('cabang.lpj.postStore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ request()->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-left">
                                        <h5>Form LPJ</h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Dealer</strong>
                                </label>
                                <label class="col-sm-10 col-form-label">
                                    @php
                                        $dealer = DB::table('dealers')->where('id', Auth::guard('cabang')->user()->dealer)->first();
                                    @endphp
                                    {{ $dealer->nama_dealer }}
                                </label>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>No Proposal</strong>
                                </label>
                                <label class="col-sm-10 col-form-label font-weight-bold">
                                    {{ $data->proposal->no_proposal }}
                                </label>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Periode</strong>
                                </label>
                                <div class="col-sm-5 col-form-label">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            Target
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Start</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" value="{{ $data->proposal->periode_start_proposal }}" disabled>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">End</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" value="{{ $data->proposal->periode_end_proposal }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            Aktual
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Start</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="tanggalstart" type="date" value="{{ $data->periode_start_lpj }}">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">End</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="tanggalend" type="date" value="{{ $data->periode_start_lpj }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Lokasi Aktual</strong>
                                </div>
                                <div class="col-sm-5">
                                    <input class="form-control" name="lokasi" id="" value="{{ $data->lokasi_lpj }}">
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Kondisi</strong>
                                </div>
                                <div class="col-sm-10">
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label text-center">Target</label>
                                        <div class="col-sm-7">
                                            <table class="table table-striped border datatable table-sm">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Database</th>
                                                        <th>Prospectus</th>
                                                        <th>Penjualan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input class="form-control" type="number"  value="{{ $data->proposal->target_database_proposal }}" disabled>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number"  value="{{ $data->proposal->target_prospectus_proposal }}" disabled>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number"  value="{{ $data->proposal->target_penjualan_proposal }}" disabled>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label text-center">Aktual</label>
                                        <div class="col-sm-7">
                                            <table class="table table-striped border datatable table-sm">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Database</th>
                                                        <th>Prospectus</th>
                                                        <th>Penjualan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input class="form-control" type="number" name="database" value="{{ $data->target_database_lpj }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" name="prospectus" value="{{ $data->target_prospectus_lpj }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" name="penjualan" value="{{ $data->target_penjualan_lpj }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Dana</strong>
                                </label>
                                <div class="col-sm-10">
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label text-center">Target</label>
                                        <div class="col-sm-10">
                                            <table class="table table-striped border datatable table-sm" id="dataDana">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="300">Keterangan</th>
                                                        <th>Beban Dealer</th>
                                                        <th>Beban Fincoy</th>
                                                        <th>Beban MD(Jika Ada)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($datadanapro as $key => $data_dana_pro)
                                                        <tr>
                                                            <td>
                                                                <input class="form-control" type="text" value="{{ data_get($data_dana_pro, 'ket_dana') }}" disabled>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number"  value="{{ data_get($data_dana_pro, 'beban_dealer_dana') }}" disabled>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number"  value="{{ data_get($data_dana_pro, 'beban_fincoy_dana') }}" disabled>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number" value="{{ data_get($data_dana_pro, 'beban_md_dana') }}" disabled>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-form-label col-8 text-right">
                                                    TOTAL :
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                        </div>
                                                        <input class="form-control" value="{{ number_format($data->proposal->total_dana_proposal,0,',',','); }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label text-center">Aktual</label>
                                        <div class="col-sm-10">
                                            <table class="table table-striped border datatable table-sm" id="dataDana">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="300">Keterangan</th>
                                                        <th>Beban Dealer</th>
                                                        <th>Beban Fincoy</th>
                                                        <th>Beban MD(Jika Ada)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!null == $datadana)
                                                        @foreach ($datadana as $key => $data_dana)
                                                            <tr class="row_to_clone_dana">
                                                                <td>
                                                                    <input class="form-control" type="text" name="ket_dana[{{ $key }}]" id="ket_dana[{{ $key }}]" value="{{ data_get($data_dana, 'ket_dana') }}">
                                                                </td>
                                                                <td>
                                                                    <input oninput="totaldana()" class="form-control beban_dealer_" type="number" name="beban_dealer_dana[{{ $key }}]" id="beban_dealer_dana[{{ $key }}]" value="{{ data_get($data_dana, 'beban_dealer_dana') }}">
                                                                </td>
                                                                <td>
                                                                    <input oninput="totaldana()" class="form-control beban_fincoy_" type="number" name="beban_fincoy_dana[{{ $key }}]" id="beban_fincoy_dana[{{ $key }}]" value="{{ data_get($data_dana, 'beban_fincoy_dana') }}">
                                                                </td>
                                                                <td>
                                                                    <input oninput="totaldana()" class="form-control beban_md_" type="number" name="beban_md_dana[{{ $key }}]" id="beban_md_dana[{{ $key }}]" value="{{ data_get($data_dana, 'beban_md_dana') }}">
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="removeDana btn btn-danger">
                                                                        <i class="fas fa-minus-circle"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="row_to_clone_dana">
                                                            <td>
                                                                <input class="form-control" type="text" name="ket_dana[0]" id="ket_dana[]">
                                                            </td>
                                                            <td>
                                                                <input oninput="totaldana()" class="form-control beban_dealer_" type="number" name="beban_dealer_dana[0]" id="beban_dealer_dana[]">
                                                            </td>
                                                            <td>
                                                                <input oninput="totaldana()" class="form-control beban_fincoy_" type="number" name="beban_fincoy_dana[0]" id="beban_fincoy_dana[]">
                                                            </td>
                                                            <td>
                                                                <input oninput="totaldana()" class="form-control beban_md_" type="number" name="beban_md_dana[0]" id="beban_md_dana[]">
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="removeDana btn btn-danger">
                                                                    <i class="fas fa-minus-circle"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                            <a class="btn btn-outline-success" onclick="addRowDana(); return false;" href="#">
                                                Tambah Perkiraan Dana <i class="fas fa-plus-circle"></i>
                                            </a>
                                            <div class="row">
                                                <div class="col-form-label col-8 text-right">
                                                    TOTAL :
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                        </div>
                                                        <input class="form-control" name="total" id="total" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">Problem Identification</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="problem" id="" rows="2">{{ $data->problem_identification_lpj }}</textarea>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">Corrective Action</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="corrective" id="" rows="2">{{ $data->corrective_action_lpj }}</textarea>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Konsumen</strong>
                                </label>
                                <div class="col-sm-10"></div>
                                <div class="col-sm-12">
                                    <div class="row pb-2">
                                        <div class="col-8"></div>
                                        <div class="col-4 text-right">
                                            <a class="btn btn-outline-success btn-sm" data-toggle="collapse" href="#tambahkonsumen" aria-expanded="false">
                                                Tambah Data Konsumen <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        <div class="col-12 pt-2">
                                            <div class="row collapse border p-4 rounded" id="tambahkonsumen">
                                                <div class="col-6">
                                                    <div class="row form-group">
                                                        <label for="name" class="col-sm-3 control-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="namakonsumen" name="namakonsumen" value="">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="alamatnkonsumen" name="alamatkonsumen" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Kelurahan</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control data-lokasi" name="lokasikonsumen">
                                                                <option value=""></option>
                                                                @foreach ($datalokasi as $data_l)
                                                                    <option value="{{ $data_l->id }}">{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">No Telepon</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="notelponsumen" name="notelpkonsumen" >
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Type</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="typekonsumen" name="typekonsumen" >
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Sales People</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control data-sales" name="saleskonsumen">
                                                                @foreach ($salespeople as $data_sp)
                                                                    <option value="{{ $data_sp->id }}">{{ $data_sp->nama_sales_people }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Jenis</label>
                                                        <div class="col-sm-9">
                                                            <select name="jeniskonsumen" class="form-control" id="jeniskonsumen" >
                                                                <option value="1">CASH</option>
                                                                <option value="2">CREDIT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Finance Company</label>
                                                        <div class="col-sm-9">
                                                            <select name="financekonsumen" class="form-control" id="financekonsumen" >
                                                                @foreach ($datafinance as $data_fi)
                                                                    <option value="{{ $data_fi->id }}">{{ $data_fi->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row form-group">
                                                                <label class="col-sm-6 control-label">Database</label>
                                                                <div class="col-sm-6">
                                                                    <input type="checkbox" name="dbkonsumen" id="dbkonsumen">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <label class="col-sm-6 control-label">Prospecting</label>
                                                                <div class="col-sm-6">
                                                                    <input type="checkbox" name="proskonsumen" id="proskonsumen">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <label class="col-sm-6 control-label">Polling</label>
                                                                <div class="col-sm-6">
                                                                    <input type="checkbox" name="polkonsumen" id="polkonsumen">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row form-group">
                                                                <label class="col-sm-6 control-label">Reject</label>
                                                                <div class="col-sm-6">
                                                                    <input type="checkbox" name="rejkonsumen" id="rejkonsumen">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <label class="col-sm-6 control-label">SSU</label>
                                                                <div class="col-sm-6">
                                                                    <input type="checkbox" name="ssukonsumen" id="ssukonsumen">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-sm-8"></div>
                                                        <div class="col-sm-4">
                                                            <button class="btn btn-sm btn-primary btn-block" type="text" name="b" value="konsumen">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" style="font-size: 10px">
                                        <div class="col-12">
                                            <table class="table table-striped border datatable table-sm" id="salesdata">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Kelurahan</th>
                                                        <th>No Telepon</th>
                                                        <th>Type</th>
                                                        <th>Sales Prople</th>
                                                        <th>CASH/CREDIT</th>
                                                        <th>Finance Company</th>
                                                        <th class="text-center">Database</th>
                                                        <th class="text-center">Prospecting</th>
                                                        <th class="text-center">Polling</th>
                                                        <th class="text-center">Reject</th>
                                                        <th class="text-center">SSU</th>
                                                        <th class="text-center"width="70"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($datakonsumen as $data_ko)
                                                        <tr>
                                                            <td>{{ $data_ko->nama }}</td>
                                                            <td>{{ $data_ko->alamat }}</td>
                                                            <td>{{ $data_ko->id_lokasi }}</td>
                                                            <td>{{ $data_ko->notelp }}</td>
                                                            <td>{{ $data_ko->type }}</td>
                                                            <td>{{ $data_ko->id_sales_people }}</td>
                                                            <td>{{ $data_ko->cash_credit }}</td>
                                                            <td>{{ $data_ko->finance_company }}</td>
                                                            <td class="text-center">
                                                                @if ($data_ko->database == true)
                                                                    <i class="fas fa-check"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($data_ko->prospecting == true)
                                                                    <i class="fas fa-check"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($data_ko->polling == true)
                                                                    <i class="fas fa-check"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($data_ko->reject == true)
                                                                    <i class="fas fa-check"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($data_ko->ssu == true)
                                                                    <i class="fas fa-check"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                {{-- <a href="{{ route('cabang.lpj.getKonsumen') }}/?id={{ $data_ko->id }}&uuid={{ request()->id }}" class="btn btn-warning btn-sm m-0" style="padding: 0.15rem 0.3rem; font-size: 0.7rem;">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="" class="btn btn-danger delete-post btn-sm m-0" style="padding: 0.15rem 0.3rem; font-size: 0.7rem;">
                                                                    <i class="fas fa-trash"></i>
                                                                </a> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Dokumentasi</strong>
                                </label>
                                <div class="col-sm-10">
                                    <div class="mb-2 row">
                                        <label class="col-2 col-form-label">Dokumentasi Pre event</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <label class="col-4 col-form-label">Kanvasing Sebelum kegiatan</label>
                                                <div class="col-4">
                                                    {{-- <div class="row p-2">
                                                        @if (!null == $data->foto_lokasi_proposal)
                                                            @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                            <div class="col-4 img-thumbnail">
                                                                <div class="float-left" style="position: absolute">
                                                                    <button type="text" name="b" value="{{ $item }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                                    <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="pb-2"></div>
                                                        @endif
                                                    </div> --}}
                                                    <div class="row p-2">
                                                        <button type="text" name="b" value="upload" class="btn btn-info btn-block" >
                                                            <div class="float-left">
                                                                Upload Foto
                                                            </div>
                                                            <div class="text-right">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Capture Blast WA kepada konsumen</label>
                                                <div class="col-4">
                                                    {{-- <div class="row p-2">
                                                        @if (!null == $data->foto_lokasi_proposal)
                                                            @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                            <div class="col-4 img-thumbnail">
                                                                <div class="float-left" style="position: absolute">
                                                                    <button type="text" name="b" value="{{ $item }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                                    <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="pb-2"></div>
                                                        @endif
                                                    </div> --}}
                                                    <div class="row p-2">
                                                        <button type="text" name="b" value="upload" class="btn btn-info btn-block" >
                                                            <div class="float-left">
                                                                Upload Foto
                                                            </div>
                                                            <div class="text-right">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Posting flyer kegiatan di media sosial dealer</label>
                                                <div class="col-4">
                                                    {{-- <div class="row p-2">
                                                        @if (!null == $data->foto_lokasi_proposal)
                                                            @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                            <div class="col-4 img-thumbnail">
                                                                <div class="float-left" style="position: absolute">
                                                                    <button type="text" name="b" value="{{ $item }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                                    <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="pb-2"></div>
                                                        @endif
                                                    </div> --}}
                                                    <div class="row p-2">
                                                        <button type="text" name="b" value="upload" class="btn btn-info btn-block" >
                                                            <div class="float-left">
                                                                Upload Foto
                                                            </div>
                                                            <div class="text-right">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-2 row">
                                        <label class="col-2 col-form-label">Dokumentasi event Day</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <label class="col-4 col-form-label">Interaksi konsumen</label>
                                                <div class="col-4">
                                                    {{-- <div class="row p-2">
                                                        @if (!null == $data->foto_lokasi_proposal)
                                                            @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                            <div class="col-4 img-thumbnail">
                                                                <div class="float-left" style="position: absolute">
                                                                    <button type="text" name="b" value="{{ $item }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                                    <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="pb-2"></div>
                                                        @endif
                                                    </div> --}}
                                                    <div class="row p-2">
                                                        <button type="text" name="b" value="upload" class="btn btn-info btn-block" >
                                                            <div class="float-left">
                                                                Upload Foto
                                                            </div>
                                                            <div class="text-right">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Unit Display</label>
                                                <div class="col-4">
                                                    {{-- <div class="row p-2">
                                                        @if (!null == $data->foto_lokasi_proposal)
                                                            @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                            <div class="col-4 img-thumbnail">
                                                                <div class="float-left" style="position: absolute">
                                                                    <button type="text" name="b" value="{{ $item }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                                    <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="pb-2"></div>
                                                        @endif
                                                    </div> --}}
                                                    <div class="row p-2">
                                                        <button type="text" name="b" value="upload" class="btn btn-info btn-block" >
                                                            <div class="float-left">
                                                                Upload Foto
                                                            </div>
                                                            <div class="text-right">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Live Season saat kegiatan berlangsung</label>
                                                <div class="col-4">
                                                    {{-- <div class="row p-2">
                                                        @if (!null == $data->foto_lokasi_proposal)
                                                            @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                            <div class="col-4 img-thumbnail">
                                                                <div class="float-left" style="position: absolute">
                                                                    <button type="text" name="b" value="{{ $item }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                                    <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            <div class="pb-2"></div>
                                                        @endif
                                                    </div> --}}
                                                    <div class="row p-2">
                                                        <button type="text" name="b" value="upload" class="btn btn-info btn-block" >
                                                            <div class="float-left">
                                                                Upload Foto
                                                            </div>
                                                            <div class="text-right">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <div class="col-12">
                                    <a href="#" class="btn btn-outline-secondary">Cancel</a>
                                    <div class="float-right">
                                        <button class="btn btn-outline-info" type="text" name="b" value="draft">Simpan Sebagai Draft</button>
                                        <button class="btn btn-primary" type="text" name="b" value="done"  onclick="return confirm('Konfirmasi Pengajuan Proposal')">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <form id="postForm" name="postForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="postCrudModal"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                        <input type="hidden" name="post_id" id="post_id">
                        <input type="hidden" name="uuid" value="{{ request()->uuid }}">
                            <div class="row form-group">
                                <label for="name" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namakonsumen" name="namakonsumen" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="alamatnkonsumen" name="alamatkonsumen" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Kelurahan</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="kelurahankonsumen" name="kelurahankonsumen" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="notelponsumen" name="knotelponsumen" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Type</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="typekonsumen" name="typekonsumen" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Sales People</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="spkonsumen" name="spkonsumen" value="" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Jenis</label>
                                <div class="col-sm-9">
                                    <select name="jeniskonsumen" class="form-control" id="jeniskonsumen" >
                                        <option value="1">CASH</option>
                                        <option value="2">CREDIT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Finance Company</label>
                                <div class="col-sm-9">
                                    <select name="financekonsumen" class="form-control" id="financekonsumen" >
                                        <option value="1">CASH</option>
                                        <option value="2">CREDIT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Database</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="dbkonsumen" id="dbkonsumen">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Prospecting</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="proskonsumen" id="proskonsumen">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Polling</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="polkonsumen" id="polkonsumen">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Reject</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="rejkonsumen" id="rejkonsumen">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">SSU</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="ssukonsumen" id="ssukonsumen">
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('.data-lokasi').select2();
    </script>
    <script type="text/javascript">
        $('.data-sales').select2();
    </script>

    {{-- Tambah data dana --}}
    <script>
    function addRowDana() {
        /* Declare variables */
        var elements, templateRow, rowCount, row, className, newRow, element;
        var i, s, t;

        /* Get and count all "tr" elements with class="row".    The last one will
        * be serve as a template. */
        if (!document.getElementsByTagName)
            return false; /* DOM not supported */
        elements = document.getElementsByTagName("tr");
        templateRow = null;
        rowCount = 0;
        for (i = 0; i < elements.length; i++) {
            row = elements.item(i);

            /* Get the "class" attribute of the row. */
            className = null;
            if (row.getAttribute)
                className = row.getAttribute('class')
            if (className == null && row.attributes) {    // MSIE 5
                /* getAttribute('class') always returns null on MSIE 5, and
                * row.attributes doesn't work on Firefox 1.0.    Go figure. */
                className = row.attributes['class'];
                if (className && typeof(className) == 'object' && className.value) {
                    // MSIE 6
                    className = className.value;
                }
            }

            /* This is not one of the rows we're looking for.    Move along. */
            if (className != "row_to_clone_dana")
                continue;

            /* This *is* a row we're looking for. */
            templateRow = row;
            rowCount++;
        }
        if (templateRow == null)
            return false; /* Couldn't find a template row. */

        /* Make a copy of the template row */
        newRow = templateRow.cloneNode(true);

        /* Change the form variables e.g. price[x] -> price[rowCount] */
        elements = newRow.getElementsByTagName("input");
        for (i = 0; i < elements.length; i++) {

            // name
            element = elements.item(i);
            s = null;
            s = element.getAttribute("name");
            if (s == null)
                continue;
            t = s.split("[");
            if (t.length < 2)
                continue;
            s = t[0] + "[" + rowCount.toString() + "]";
            element.setAttribute("name", s);
            element.value = "";
        }

        /* Add the newly-created row to the table */
        templateRow.parentNode.appendChild(newRow);
        return true;

    }
    </script>
    <script>
        $(document).ready(function(){
            $("#dataDana").on('click','.removeDana',function(){
                $(this).parent().parent().remove();
                totaldana();
            });
            $("#salesdata").on('click','.removeSales',function(){
                $(this).parent().parent().remove();
            });
            totaldana();

        });
    </script>

    <script>
        function totaldana(){

            var sum_a = 0;
            var sum_b = 0;
            var sum_c = 0;

            $('.beban_dealer_').each(function () {
                sum_a += Number($(this).val());
            });
            $('.beban_fincoy_').each(function () {
                sum_b += Number($(this).val());
            });
            $('.beban_md_').each(function () {
                sum_c += Number($(this).val());
            });

            $sumtotal = sum_a + sum_b + sum_c;
            document.getElementById("total").value = $sumtotal.toLocaleString();

            console.log(sum_a + sum_b + sum_c);
        }
    </script>

    <script>
        function tambahsales() {
            var table         = document.getElementById("salesdata");
            var rowCount      = table.rows.length;
            var row           = table.insertRow(rowCount);
            var nama          = row.insertCell(0);
            var hondaid       = row.insertCell(1);
            var hsoid         = row.insertCell(2);
            var remv          = row.insertCell(3);

            //console.log($('#datasalespeople').val());

            var dataid      = $('#datasalespeople').val().split('-')[0];
            var datanama    = $('#datasalespeople').val().split('-')[1];
            var datahondaid = $('#datasalespeople').val().split('-')[2];
            var datahsoid   = $('#datasalespeople').val().split('-')[3];

            nama.innerHTML    = '<input type="hidden" name="idsales[]" value="'+dataid+'"><input class="form-control sales_nama" type="text" name="sales_nama[]" value="'+datanama+'" disabled>';
            hondaid.innerHTML = '<input class="form-control honda_id" type="text" name="honda_id[]" value="'+datahondaid+'" disabled>'
            hsoid.innerHTML   = '<input class="form-control hso_id" type="text" name="hso_id[]" value="'+datahsoid+'" disabled>';
            remv.innerHTML    = '<a href="javascript:void(0);" class="removeSales btn btn-danger"><i class="fas fa-minus-circle"></i></a>'
        }
    </script>

    <script>
        function pj() {
            var dataid      = $('#datapj').val().split('-')[0];
            var datanama    = $('#datapj').val().split('-')[1];
            var datahondaid = $('#datapj').val().split('-')[2];
            var datahsoid   = $('#datapj').val().split('-')[3];

            console.log($('#datapj').val());
            document.getElementById("pjid").value = dataid;
            document.getElementById("pjnama").value = datanama;
            document.getElementById("pjhondaid").value = datahondaid;
            document.getElementById("pjhsoid").value = datahsoid ;
        }
    </script>

@endsection

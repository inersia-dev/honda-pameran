@extends('cabang.layouts.konsumen')

@section('title', 'Buat LPJ')
@section('content')

    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-left">
                                        <h5>Form LPJ</h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @if (request()->metode == 'edit')
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Konsumen</strong>
                                </label>
                                <div class="col-sm-10"></div>
                                <div class="col-sm-12">
                                    <div class="row pb-2">
                                        <div class="col-12 pt-2">
                                            <form action="" class="row">
                                                <input type="hidden" name="id" value="{{ request()->id }}">
                                                <input type="hidden" name="idkonsumen" value="{{ request()->idkonsumen }}">
                                                <input type="hidden" name="method" value="updatekonsumen">
                                                <div class="col-6">
                                                    <div class="row form-group">
                                                        <label for="name" class="col-sm-3 control-label">Nama<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" value="{{ $konsumen->nama }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Alamat<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="alamat" value="{{ $konsumen->alamat }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Kelurahan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control data-lokasi" name="lokasi" required>
                                                                <option value=""></option>
                                                                @foreach ($datalokasi as $data_l)
                                                                    <option value="{{ $data_l->id }}" {{ $konsumen->id_lokasi == $data_l->id ? 'selected' : ''}}>{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">No Telepon<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="notelp" value="{{ $konsumen->notelp }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Gender<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <select name="gender" class="form-control">
                                                                @if ($konsumen->gender)
                                                                    <option value="{{ $konsumen->gender }}">{{ $konsumen->gender_($konsumen->gender)}}</option>
                                                                @endif
                                                                <option value="1">Laki-laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Tanggal Lahir<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" name="tgllahir" value="{{ $konsumen->tgl_lahir }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Pekerjaan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="pekerjaan" value="{{ $konsumen->pekerjaan }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Pendapatan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="pendapatan" value="{{ $konsumen->pendapatan }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Nomor Mesin</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="nomormesin" value="{{ $konsumen->nomor_mesin }}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Sales People<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control data-sales" name="sales">
                                                                @foreach ($salespeople as $data_sp)
                                                                    <option value="{{ $data_sp->id }}" {{ $konsumen->id_sales_people == $data_sp->id ? 'selected' : ''}}>{{ $data_sp->nama_sales_people }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Type Unit</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control data-unit" name="unit">
                                                                <option value=""></option>
                                                                @foreach ($datadisplay as $data_dis)
                                                                    <option value="{{ $data_dis->id }}" {{ $konsumen->unit == $data_dis->id ? 'selected' : ''}}>{{ $data_dis->nama_display }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Jenis</label>
                                                        <div class="col-sm-9">
                                                            <select name="jenis" class="form-control">
                                                                @if ($konsumen->cash_credit)
                                                                    <option value="{{ $konsumen->cash_credit }}">{{ $konsumen->jenis($konsumen->cash_credit)}}</option>
                                                                @endif
                                                                <option value=""></option>
                                                                <option value="1">CASH</option>
                                                                <option value="2">CREDIT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Finance Company</label>
                                                        <div class="col-sm-9">
                                                            <select name="finance" class="form-control">
                                                                @foreach ($datafinance as $data_fi)
                                                                    <option value="{{ $data_fi->id }}" {{ $konsumen->finance_company == $data_fi->id ? 'selected' : ''}}>{{ $data_fi->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 control-label">Hasil<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                        <div class="col-sm-9">
                                                            <select name="hasil" class="form-control" required>
                                                                @if ($konsumen->hasil)
                                                                    <option value="{{ $konsumen->hasil }}">{{ $konsumen->hasil_($konsumen->hasil)}}</option>
                                                                @endif
                                                                <option></option>
                                                                <option value="1">Database</option>
                                                                <option value="2">Prospecting</option>
                                                                <option value="3">Polling</option>
                                                                <option value="4">SSU</option>
                                                                <option value="5">Reject</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row form-group">
                                                        <div class="col-sm-10"></div>
                                                        <div class="col-sm-2">
                                                            <button class="btn btn-sm btn-outline-primary btn-block" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            @else
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">
                                        <strong>Konsumen</strong>
                                    </label>
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-12">
                                        <div class="row pb-2">
                                            <div class="col-12 pt-2">
                                                <form action="" class="row">
                                                    <input type="hidden" name="id" value="{{ request()->id }}">
                                                    <input type="hidden" name="method" value="konsumen">
                                                    <div class="col-6">
                                                        <div class="row form-group">
                                                            <label for="name" class="col-sm-3 control-label">Nama<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="nama" value=""required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Alamat<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="alamat" value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Kelurahan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control data-lokasi" name="lokasi" required>
                                                                    <option value=""></option>
                                                                    @foreach ($datalokasi as $data_l)
                                                                        <option value="{{ $data_l->id }}">{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">No Telepon<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="notelp" required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Gender<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select name="gender" class="form-control">
                                                                    <option value="1">Laki-laki</option>
                                                                    <option value="2">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Tanggal Lahir<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" name="tgllahir" required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Pekerjaan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="pekerjaan" required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Pendapatan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="pendapatan" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Nomor Mesin</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="nomormesin">
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Sales People<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control data-sales" name="sales">
                                                                    @foreach ($salespeople as $data_sp)
                                                                        <option value="{{ $data_sp->id }}">{{ $data_sp->nama_sales_people }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Type Unit</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control data-unit" name="unit">
                                                                    <option value=""></option>
                                                                    @foreach ($datadisplay as $data_dis)
                                                                        <option value="{{ $data_dis->id }}">{{ $data_dis->nama_display }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Jenis</label>
                                                            <div class="col-sm-9">
                                                                <select name="jenis" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="1">CASH</option>
                                                                    <option value="2">CREDIT</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Finance Company</label>
                                                            <div class="col-sm-9">
                                                                <select name="finance" class="form-control">
                                                                    @foreach ($datafinance as $data_fi)
                                                                        <option value="{{ $data_fi->id }}">{{ $data_fi->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="col-sm-3 control-label">Hasil<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                            <div class="col-sm-9">
                                                                <select name="hasil" class="form-control">
                                                                    <option value="1">Database</option>
                                                                    <option value="2">Prospecting</option>
                                                                    <option value="3">Polling</option>
                                                                    <option value="4">SSU</option>
                                                                    <option value="5">Reject</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row form-group">
                                                            <div class="col-sm-10"></div>
                                                            <div class="col-sm-2">
                                                                <button class="btn btn-sm btn-outline-primary btn-block" type="submit">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row pt-3" style="font-size: 11px">
                                            <div class="col-12">
                                                <table class="table datatable" id="tablekonsumen" style="width:100%">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Gender</th>
                                                            <th>Tgl Lahir</th>
                                                            <th>Usia</th>
                                                            <th>Alamat</th>
                                                            <th>No Telepon</th>
                                                            <th>Pekerjaan</th>
                                                            <th>Kelurahan</th>
                                                            <th>Kecamatan</th>
                                                            <th>Kota</th>
                                                            <th>Type Unit</th>
                                                            <th>Sales Prople</th>
                                                            <th>CASH/CREDIT</th>
                                                            <th>Finance Company</th>
                                                            <th>Hasil</th>
                                                            <th width="40"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach ($datakonsumen as $data_ko)
                                                            <tr class="text-center">
                                                                <td>{{ $no++}}</td>
                                                                <td>{{ $data_ko->nama }}</td>
                                                                <td>{{ $data_ko->gender_($data_ko->gender) }}</td>
                                                                <td>{{ $data_ko->tgl_lahir }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data_ko->tgl_lahir)->age }} Tahun</td>
                                                                <td>{{ $data_ko->alamat }}</td>
                                                                <td>{{ $data_ko->notelp }}</td>
                                                                <td>{{ $data_ko->pekerjaan }}</td>
                                                                <td>{{ $data_ko->lokasi_->kelurahan_lokasi }}</td>
                                                                <td>{{ $data_ko->lokasi_->kecamatan_lokasi }}</td>
                                                                <td>{{ $data_ko->lokasi_->kota_lokasi }}</td>
                                                                <td>{{ null != $data_ko->unit ? $data_ko->display->nama_display : '' }}</td>
                                                                <td>{{ $data_ko->sales->nama_sales_people }}</td>
                                                                <td>{{ $data_ko->jenis($data_ko->cash_credit)}}</td>
                                                                <td>{{ $data_ko->finance->nama }}</td>
                                                                <td>{{ $data_ko->hasil_($data_ko->hasil) }}</td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('cabang.lpj.getCreateFive') }}/?metode=edit&idkonsumen={{ $data_ko->id }}&id={{ request()->id }}" class="btn btn-warning btn-sm m-0" style="padding: 0.15rem 0.3rem; font-size: 0.7rem;">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a onclick="return confirm('Konfirmasi Hapus Konsumen')" href="{{ route('cabang.lpj.getCreateFive') }}/?method=hapuskonsumen&id={{ $data_ko->id }}" class="btn btn-danger delete-post btn-sm m-0" style="padding: 0.15rem 0.3rem; font-size: 0.7rem;">
                                                                        <i class="fas fa-trash"></i>
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
                                <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                    <div class="col-12">
                                        <a href="{{ route('cabang.lpj.getCreateFour') }}?id={{ request()->id }}" class="btn btn-outline-secondary">Kembali</a>
                                        <div class="float-right">
                                            <form action="">
                                                <input type="hidden" name="id" value="{{ request()->id }}">
                                                <button class="btn btn-outline-info" type="text" name="submit" value="draft">Simpan Sebagai Draft</button>
                                                <button class="btn btn-primary" type="text" name="submit" value="submit"  onclick="return confirm('Konfirmasi LPJ')">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
    {{-- <script type="text/javascript">
        $('.data-lokasi').select2();
    </script>
    <script type="text/javascript">
        $('.data-sales').select2();
    </script> --}}


    <script>
        $(document).ready( function () {
            $('#tablekonsumen').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            autoFilter: true,
                            sheetName: 'Data Konsumen',
                            text: 'Download excel',
                            messageTop: 'LPJ Data Konsumen',
                    }]
                });
        });
    </script>

@endsection

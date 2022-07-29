@extends('cabang.layouts.konsumen')

@section('title', 'Buat LPJ')
@section('content')
<style>
    .image{
        position:relative;
        overflow:hidden;
        padding-bottom:35%;
        width: 50%;
    }
    .image img{
        position:absolute;
    }
    .img-thumbnail {
        background-color: #ffffff;
        border: 0px solid #ffffff;
    }
</style>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h5>Laporan Pertanggung Jawaban</h5>
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
                                    <strong>Penanggung Jawab</strong>
                                </label>
                                <label class="col-sm-10 col-form-label">
                                    {{ $data->proposal->pj->nama_sales_people ?? '' }}
                                </label>
                            </div>
                            <div class="pt-3 row">
                                <div class="col-12">
                                    <table class="table table-striped border datatable table-sm table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th style="vertical-align: middle;" colspan="2">Periode</th>
                                                <th style="vertical-align: middle;" rowspan="2">Durasi</th>
                                                <th style="vertical-align: middle;" rowspan="2">Kode Dealer</th>
                                                <th style="vertical-align: middle;" rowspan="2">Nama Dealer</th>
                                                <th style="vertical-align: middle;" rowspan="2">Lokasi</th>
                                                <th style="vertical-align: middle;" colspan="2">Database</th>
                                                <th style="vertical-align: middle;" colspan="2">Prospecting</th>
                                                <th style="vertical-align: middle;" colspan="2">Penjualan</th>
                                                <th style="vertical-align: middle;" colspan="2">Downloader Motorku-X</th>
                                                <th style="vertical-align: middle;" rowspan="2">Sales Forces</th>
                                                <th style="vertical-align: middle;" colspan="2">Biaya</th>
                                            </tr>
                                            <tr>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Target</th>
                                                <th>Aktual</th>
                                                <th>Target</th>
                                                <th>Aktual</th>
                                                <th>Target</th>
                                                <th>Aktual</th>
                                                <th>Target</th>
                                                <th>Aktual</th>
                                                <th>Target</th>
                                                <th>Aktual</th>
                                            </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->periode_start_lpj }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->periode_end_lpj }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->durasi($data->periode_start_lpj, $data->periode_end_lpj ) }} Hari
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->proposal->dealer->kode_dealer }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->proposal->dealer->nama_dealer }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->tempat_lpj }}. {{ $data->lokasi->kelurahan_lokasi }}, {{ $data->lokasi->kecamatan_lokasi }}, {{ Str::title($data->lokasi->kota_lokasi) }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->proposal->target_database_proposal }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                     {{ $data->target_database_lpj }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->proposal->target_penjualan_proposal }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                     {{ $data->target_penjualan_lpj }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->proposal->target_prospectus_proposal }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                     {{ $data->target_prospectus_lpj }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $data->proposal->target_downloader_proposal }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                     {{ $data->target_downloader_lpj }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ count(json_decode($data->proposal->sales_people_proposal)) }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Rp. {{ number_format($data->proposal->total_dana_proposal,0,',',','); }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Rp. {{ number_format($data->total_dana_lpj,0,',',','); }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col-6">
                                    <div class="row p-2 border rounded">
                                        @php
                                            $datakanvasing = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 1)->get();
                                        @endphp
                                        @foreach ($datakanvasing as $item_1)
                                        <div class="image">
                                            <div class="col-6 img-thumbnail img img-responsive full-height">
                                                <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_1->foto }}" target="_blank">
                                                    <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_1->foto }}" alt="" class="img-fluid border">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 text-center font-weight-bold">
                                            Kanvasing Sebelum kegiatan
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row p-2 border rounded">
                                        @php
                                            $capture = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 2)->get();
                                        @endphp
                                        @foreach ($capture as $item_2)
                                        <div class="image">
                                            <div class="col-6 img-thumbnail img img-responsive full-height">
                                                <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_2->foto }}" target="_blank">
                                                    <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_2->foto }}" alt="" class="img-fluid border">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 text-center font-weight-bold">
                                            Capture Blast WA kepada konsumen
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row p-2 border rounded">
                                        @php
                                            $posting = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 3)->get();
                                        @endphp
                                        @foreach ($posting as $item_3)
                                        <div class="image">
                                            <div class="col-6 img-thumbnail img img-responsive full-height">
                                                <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_3->foto }}" target="_blank">
                                                    <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_3->foto }}" alt="" class="img-fluid border">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 text-center font-weight-bold">
                                            Posting flyer kegiatan di media sosial dealer
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row p-2 border rounded">
                                        @php
                                            $interaksi = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 4)->get();
                                        @endphp
                                        @foreach ($interaksi as $item_4)
                                        <div class="image">
                                            <div class="col-6 img-thumbnail img img-responsive full-height">
                                                <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_4->foto }}" target="_blank">
                                                    <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_4->foto }}" alt="" class="img-fluid border">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 text-center font-weight-bold">
                                            Interaksi konsumen
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row p-2 border rounded">
                                        @php
                                            $unit = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 5)->get();
                                        @endphp
                                        @foreach ($unit as $item_5)
                                        <div class="image">
                                            <div class="col-6 img-thumbnail img img-responsive full-height">
                                                <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_5->foto }}" target="_blank">
                                                    <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_5->foto }}" alt="" class="img-fluid border">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 text-center font-weight-bold">
                                            Unit Display
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row p-2 border rounded">
                                        @php
                                            $live = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 6)->get();
                                        @endphp
                                        @foreach ($live as $item_6)
                                        <div class="image">
                                            <div class="col-6 img-thumbnail img img-responsive full-height">
                                                <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_6->foto }}" target="_blank">
                                                    <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_6->foto }}" alt="" class="img-fluid border">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12 text-center font-weight-bold">
                                            Live Season saat kegiatan berlangsung
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label"><strong>Problem Identification</strong></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="problem" id="" rows="2" readonly>{{ $data->problem_identification_lpj }}</textarea>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label"><strong>Corrective Action</strong></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="corrective" id="" rows="2" readonly>{{ $data->corrective_action_lpj }}</textarea>
                                </div>
                                <div class="col-12">
                                </div>
                            </div>
                            <hr>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Konsumen</strong>
                                </label>
                                <div class="col-sm-12">
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
                                                        <th>Pengeluaran</th>
                                                        <th>Range DP</th>
                                                        <th>Merk Motor Sblmnya</th>
                                                        <th>Jenis Motor Sblmnya</th>
                                                        <th>Kelurahan</th>
                                                        <th>Kecamatan</th>
                                                        <th>Kota</th>
                                                        <th>Type Unit</th>
                                                        <th>Sales Prople</th>
                                                        <th>CASH/CREDIT</th>
                                                        <th>Finance Company</th>
                                                        <th>Hasil</th>
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
                                                            <td>{{ $data_ko->pekerjaan_($data_ko->pekerjaan) }}</td>
                                                            <td>{{ $data_ko->pengeluaran_($data_ko->pengeluaran) }}</td>
                                                            <td>{{ $data_ko->dp_($data_ko->dp) }}</td>
                                                            <td>{{ $data_ko->merkMotor_($data_ko->merkmotor) }}</td>
                                                            <td>{{ $data_ko->jenisMotor_($data_ko->jenismotor) }}</td>
                                                            <td>{{ $data_ko->lokasi_->kelurahan_lokasi }}</td>
                                                            <td>{{ $data_ko->lokasi_->kecamatan_lokasi }}</td>
                                                            <td>{{ $data_ko->lokasi_->kota_lokasi }}</td>
                                                            <td>{{ null != $data_ko->unit ? $data_ko->display->nama_display : '' }}</td>
                                                            <td>{{ $data_ko->sales->nama_sales_people }}</td>
                                                            <td>{{ $data_ko->jenis($data_ko->cash_credit)}}</td>
                                                            <td>{{ $data_ko->finance ? $data_ko->finance->nama : '-' }}</td>
                                                            <td>{{ $data_ko->hasil_($data_ko->hasil) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    scrollX: true,
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

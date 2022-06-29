@extends('cabang.layouts.cabang')

@section('title', __('Dashboard'))

@section('content')
{{-- <link rel="stylesheet"  type="text/css" href="/filepond/app.css"/> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.4/filepond.css" integrity="sha512-OwkTbucz29JjQUeii4ZRkjY/E+Xdg4AfffPZICCf98rYKWIHxX87AwwuIQ73rbVrev8goqrKmaXyu+VxyDqr1A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link
href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
rel="stylesheet"
/>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="uuid" value="{{ $data->uuid }}">
                        <div class="row">
                            <div class="col-12">
                                <div class="float-left">
                                    <h5>Form Pengajuan Pameran</h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>No Proposal</strong>
                            </label>
                            <label class="col-sm-10 col-form-label font-weight-bold">
                                {{ $data->no_proposal }}
                            </label>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Dealer</strong>
                            </label>
                            <label class="col-sm-10 col-form-label font-weight-bold">
                                {{ $data->dealer->nama_dealer}}
                            </label>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Jenis Proposal</strong>
                            </label>
                            <div class="col-sm-10 col-form-label">
                                <strong>{{ $data->kategori->nama_kategori }}</strong>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 col-form-label">
                                <strong>Latar Belakang</strong>
                            </div>
                            <div class="col-sm-10">
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Latar Belakang Honda</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="" rows="2" disabled>{{ $data->latar_belakang_proposal }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Latar Belakang Kompetitor</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="" rows="2" disabled>{{ $data->latar_kompetitor_proposal }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Kondisi Penjualan</label>
                                    <div class="col-sm-6">
                                        <table class="table table-striped border datatable table-sm">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Sales M -1</th>
                                                    <th>Sales M 1</th>
                                                </tr>
                                                <tr>
                                                    <th>H</th>
                                                    <th>H</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="number" value="{{ $data->kondisi_penjualan_m_1_proposal }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number" value="{{ $data->kondisi_penjualan_m1_proposal }}" disabled>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">
                                        Tujuan / Benefit
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="" rows="2" disabled>{{ $data->tujuan_proposal }}</textarea>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2 col-form-label">
                                <strong>Konsep / Kegiatan Acara</strong>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Tempat</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text"  name="tempat" value="{{ $data->tempat_proposal }}" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Lokasi</label>
                                            <div class="col-sm-9">
                                                <select class="form-control data-lokasi" name="lokasi">
                                                    @if (!null == $data->lokasi_proposal)
                                                        <option value="{{ $data->lokasi_proposal }}" selected>{{ $data->lokasi->kelurahan_lokasi }}, {{ $data->lokasi->kecamatan_lokasi }}, {{ Str::title($data->lokasi->kota_lokasi) }}</option>
                                                    @else
                                                        <option></option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Finance Company</label>
                                            <div class="col-sm-9">
                                                <select class="form-control data-finance" name="finance[]" multiple="multiple">
                                                    @if ($data->finance_proposal)
                                                        @foreach (json_decode($data->finance_proposal) as $key => $data_dis)
                                                            @php
                                                                $finance_ = DB::table('finance_companies')->where('id', $data_dis)->first();
                                                            @endphp
                                                            <option value="{{ $data_dis }}" selected>{{ $finance_->kode }}</option>
                                                        @endforeach
                                                    @else
                                                        <option></option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-4 col-form-label">History Penjualan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="number" name="historypenjualan" value="{{ $data->history_penjualan_proposal }}" disabled>
                                                    {{-- <span class="input-group-text">Unit</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Database</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" name="targetdata" value="{{ $data->target_database_proposal }}" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Penjualan</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" name="targetjual" value="{{ $data->target_penjualan_proposal }}" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Prospecting</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" name="targetpros" value="{{ $data->target_prospectus_proposal }}" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Downloader Motorku-X</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" name="targetdown" value="{{ $data->target_downloader_proposal }}" disabled>
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Program Penjualan</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="" rows="2" name="program" disabled>{{ $data->program_proposal }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row pb-3">
                                            <div class="col-sm-6">
                                                <div class="mb-2 row">
                                                    <label class="col-sm-3 col-form-label">Start</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="tanggalstart" type="date" value="{{ $data->periode_start_proposal }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-2 row">
                                                    <label class="col-sm-3 col-form-label">End</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="tanggalend" type="date" value="{{ $data->periode_end_proposal }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Display</label>

                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table table-striped border datatable table-sm" id="displayunitdata">
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <th>Nama</th>
                                                                    <th>Jumlah Unit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if ($data->display_proposal)
                                                                    @foreach ($datadisplayunit as $data_diu)
                                                                        @php
                                                                            $diu = DB::table('displays')->where('id', data_get($data_diu, 'iddisplayunit'))->first();
                                                                        @endphp
                                                                        <tr>
                                                                            <td>
                                                                                <input class="form-control displayunit_nama" type="text" name="displayunit_nama[]" value="{{ $diu->nama_display }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control displayunit text-center" type="text" name="displayunit[]" value="{{ data_get($data_diu, 'displayunit') }}" readonly>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Perkiraan Dana</strong>
                            </label>
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
                                        @foreach ($datadana as $key => $data_dana)
                                            <tr class="row_to_clone_dana">
                                                <td>
                                                    <input class="form-control" type="text" name="ket_dana[{{ $key }}]" id="ket_dana[{{ $key }}]" value="{{ data_get($data_dana, 'ket_dana') }}" disabled>
                                                </td>
                                                <td>
                                                    <input oninput="totaldana()" class="form-control beban_dealer_" type="number" name="beban_dealer_dana[{{ $key }}]" id="beban_dealer_dana[{{ $key }}]" value="{{ data_get($data_dana, 'beban_dealer_dana') }}" disabled>
                                                </td>
                                                <td>
                                                    <input oninput="totaldana()" class="form-control beban_fincoy_" type="number" name="beban_fincoy_dana[{{ $key }}]" id="beban_fincoy_dana[{{ $key }}]" value="{{ data_get($data_dana, 'beban_fincoy_dana') }}" disabled>
                                                </td>
                                                <td>
                                                    <input oninput="totaldana()" class="form-control beban_md_" type="number" name="beban_md_dana[{{ $key }}]" id="beban_md_dana[{{ $key }}]" value="{{ data_get($data_dana, 'beban_md_dana') }}" disabled>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                    </div>
                                                    <input class="form-control" id="subtotala" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                    </div>
                                                    <input class="form-control" id="subtotalb" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                    </div>
                                                    <input class="form-control" id="subtotalc" readonly>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
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
                                            <input class="form-control" id="total" value="{{ $data->total_dana_proposal }}" disabled>
                                          </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Penanggung Jawab</strong>
                            </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped border datatable table-sm">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>HONDA ID</th>
                                                    <th>HSO ID</th>
                                                    <th>Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" id="pjid" type="hidden" name="pjid" value="{{ $data->penanggung_jawab_proposal ?? '' }}">
                                                        <input class="form-control" id="pjnama" type="text" name="pjnama" value="{{ $data->pj->nama_sales_people ?? '' }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" id="pjhondaid" type="text" name="pjhondaid" value="{{ $data->pj->honda_id_sales_people ?? '' }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" id="pjhsoid" type="text" name="pjhsoid" value="{{ $data->pj->hso_id_sales_people ?? '' }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" id="pjjabatan" type="text" name="pjjabatan[]" value="{{ $data->pj->jabatan_sales_people ?? '' }}" disabled="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Sales People</strong>
                            </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped border datatable table-sm" id="salesdata">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>HONDA ID</th>
                                                    <th>HSO ID</th>
                                                    <th>Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!null == $data->sales_people_proposal)
                                                    @foreach ($datasalespeople as $data_sal)
                                                        @php
                                                            $sp = DB::table('sales_people')->where('id', $data_sal)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="idsales[]" value="{{ $sp->id }}">
                                                                <input class="form-control sales_nama" type="text" name="sales_nama[]" value="{{ $sp->nama_sales_people }}" disabled="">
                                                            </td>
                                                            <td>
                                                                <input class="form-control honda_id" type="text" name="honda_id[]" value="{{ $sp->honda_id_sales_people }}" disabled="">
                                                            </td>
                                                            <td>
                                                                <input class="form-control hso_id" type="text" name="hso_id[]" value="{{ $sp->hso_id_sales_people }}" disabled="">
                                                            </td>
                                                            <td>
                                                                <input class="form-control jabatan" type="text" name="jabatan[]" value="{{ $sp->jabatan_sales_people }}" disabled="">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else

                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Lokasi Pameran</strong>
                            </label>
                            <div class="col-sm-10">
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <div class="row p-2">
                                            @if (!null == $data->foto_lokasi_proposal)
                                                @foreach (json_decode($data->foto_lokasi_proposal) as $item)
                                                <div class="col-4 img-thumbnail">
                                                    <a href="{{ Request::root() }}/upload-foto/{{ $item }}" target="_blank">
                                                        <img src="/upload-foto/{{ $item }}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                @endforeach
                                                <div class="pb-2"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Latitude</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="lat" id="lat" type="text" value="{{ $data->lat_proposal }}" disabled>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Longtitude</label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  name="long" id="long" type="text" value="{{ $data->long_proposal }}" disabled>
                                    </div>
                                </div>
                                <div id="mapid"></div>
                                <div class="row pt-1">
                                    <div class="col-sm-8 text-muted" style="font-size: 10px">
                                        <strong>Keterangan Maker</strong>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png" width="15" alt="">
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        Marker Lokasi Event/Pameran yang sedang Aktif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png" width="15" alt="">
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        Marker Lokasi Event/Pameran yang akan dipilih
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 row p-4 border-top" style="background-color: #fff; ">
                            <div class="col-12 mb-4">
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">History</label>
                                    <div class="col-sm-10">
                                        <table class="table table-sm text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Waktu</th>
                                                    <th>Created By</th>
                                                    <th></th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>{{ $data->created_at }}</td>
                                                    <td>{{ $data->usercabang->name }}</td>
                                                    <td></td>
                                                    <td>
                                                        <label class="badge bg-info" style="color: #fff">Submit Proposal <i class="fas fa-check"></i> </label>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                @php
                                                    $n = 2;
                                                @endphp
                                                @foreach ($dataapproval as $data_h)
                                                    <tr>
                                                        <td>{{ $n++ }}</td>
                                                        <td>
                                                            @if (!null == $data_h->status_approval && $data_h->keterangan_approval != '-')
                                                                {{ $data_h->updated_at }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $data_h->userapp->name }}</td>
                                                        <td>{{ $data_h->userapp->jabatanpusat->nama_jabatan }}</td>
                                                        <td>
                                                            @php
                                                                if ($data_h->status_approval == 1) {
                                                                    $st = 'Approve';
                                                                    $si = 'info';
                                                                    $ic = 'check';
                                                                } elseif ($data_h->status_approval == 2) {
                                                                    $st = 'Revise';
                                                                    $si = 'warning';
                                                                    $ic = 'exclamation-triangle';
                                                                } elseif ($data_h->status_approval == 3) {
                                                                    $st = 'Rejected';
                                                                    $si = 'danger';
                                                                    $ic = 'times';
                                                                } else {
                                                                    $st = '';
                                                                    $si = '';
                                                                    $ic = '';
                                                                }
                                                            @endphp
                                                            @if (!null == $data_h->status_approval)
                                                                <label class="badge bg-{{ $si }}"  style="color: #fff">{{ $st }} <i class="fas fa-{{ $ic }}"></i></label>
                                                            @endif
                                                        </td>
                                                        <td>{{ $data_h->keterangan_approval }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                            <div class="col-12">
                                <a href="#" class="btn btn-outline-danger" onclick="return confirm('Konfirmasi Rejected Proposal')">Rejected <i class="fas fa-times"></i></a>
                                <div class="float-right">
                                    <button class="btn btn-outline-warning" type="text" name="b" value="draft" onclick="return confirm('Konfirmasi Revise Proposal')">Revise <i class="fas fa-info"></i></button>
                                    <button class="btn btn-success" type="text" name="b" value="done" onclick="return confirm('Konfirmasi Approval Proposal')">Approve <i class="fas fa-check"></i></button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <script type="text/javascript">
        $('.data-lokasi').select2().prop("disabled", true);
    </script>
    <script type="text/javascript">
        $('.data-display').select2().prop("disabled", true);
    </script>
    <script type="text/javascript">
        $('.data-finance').select2().prop("disabled", true);
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
            $sumsubtotal_a = sum_a;
            $sumsubtotal_b = sum_b;
            $sumsubtotal_c = sum_c;
            document.getElementById("total").value = $sumtotal.toLocaleString();
            document.getElementById("subtotala").value = $sumsubtotal_a.toLocaleString();
            document.getElementById("subtotalb").value = $sumsubtotal_b.toLocaleString();
            document.getElementById("subtotalc").value = $sumsubtotal_c.toLocaleString();

            console.log(sum_a + sum_b + sum_c);
        }

        $(document).ready(function(){
            totaldana();
        });
    </script>


    {{-- Map Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js'></script>


    {{-- <script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid--').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
    </script> --}}

    {{-- <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script> --}}
    @php
        $long_ = "-1.2449965";
        $lat_  = "116.8322469";
    @endphp
    <script>

    var redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });
    // please replace this with your own mapbox token!
    // var token = 'pk.eyJ1IjoicmltYmFib3JuZSIsImEiOiJja3Z5bjZrZGwwMWtyMnVvN2xqaWRwdWh4In0.xUbfIJAJn2vMBTd_IKDzTQ';
    // var mapboxUrl = 'https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/{z}/{x}/{y}@2x?access_token=' + token;
    // var mapboxAttrib = 'Map data © <a href="http://osm.org/copyright">OpenStreetMap</a> contributors. Tiles from <a href="https://www.mapbox.com">Mapbox</a>.';
    // var mapbox = new L.TileLayer(mapboxUrl, {
    //         attribution: mapboxAttrib,
    //         tileSize: 512,
    //         zoomOffset: -1
    // });

    // var map = L.map('mapid', {
    //         tap: false, // ref https://github.com/Leaflet/Leaflet/issues/7255
    //         layers: [mapbox],
    //         center: [{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}],
    //         zoom: {{ config('leaflet.zoom_level') }},
    //         zoomControl: true
    //         }
    //     );
        // .setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});

    // inisiasi mapbox
    L.mapbox.accessToken = 'pk.eyJ1IjoicmltYmFib3JuZSIsImEiOiJja3Z5bjZrZGwwMWtyMnVvN2xqaWRwdWh4In0.xUbfIJAJn2vMBTd_IKDzTQ';
    var map = L.mapbox.map('mapid')
                .setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }})
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'))
                .addControl(L.mapbox.geocoderControl('mapbox.places', {
                autocomplete: true
            }));
    map.scrollWheelZoom.disable();
    // lokasi titik posisi
    L.control.locate().addTo(map);

    // legend. ukuran skala jarak peta
    L.control.scale({position: 'topright'}).addTo(map);

    // lisensi
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    })
    .addTo(map);

    // untuk group marker, tapi jika tidak pake circle
    // var markers = L.markerClusterGroup();

    // ngambil data
    // axios.get('https://honda-map.test/api/outlets', {
    //     headers: {
    //         'Access-Control-Allow-Origin' : '*',
    //         'Access-Control-Allow-Methods':'GET,PUT,POST,DELETE,PATCH,OPTIONS',
    //     }
    // })
    // .then(function (response) {
    //     var marker = L.geoJSON(response.data, {
    //         pointToLayer: function(geoJsonPoint, latlng, layer) {
    //             markerr  = L.marker(latlng).bindPopup('Dealer Tes');
    //             circle   = L.circle(latlng, {radius: 500, color: 'red', opacity:.5});
    //             return L.featureGroup([markerr, circle])
    //                     // .bindPopup(nama)
    //                     .addTo(map);
    //         }
    //     });
    //     markers.addLayer(marker);
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });

    //Data Contoh
    // L.marker([-1.242292, 116.879625], {icon: redIcon}).bindPopup('Dealer A').addTo(map);
    // L.circle([-1.242292, 116.879625], {radius: 500, color: 'red', opacity:.5}).addTo(map);

    // L.marker([-1.252223, 116.851946], {icon: redIcon}).bindPopup('Dealer B').addTo(map);
    // L.circle([-1.252223, 116.851946], {radius: 500, color: 'red', opacity:.5}).addTo(map);

    // L.marker([-1.242223, 116.852946], {icon: redIcon}).bindPopup('Dealer C').addTo(map);
    // L.circle([-1.242223, 116.852946], {radius: 500, color: 'red', opacity:.5}).addTo(map);

    // L.marker([-1.239848, 116.916119], {icon: redIcon}).bindPopup('Dealer D').addTo(map);
    // L.circle([-1.239848, 116.916119], {radius: 500, color: 'red', opacity:.5}).addTo(map);



    // map.addLayer(marker);

    // tambah data manual
    // var markers = [
    //         [ -1.242292, 116.879625, "Dealer A" ],
    //      ];

    //      //Loop through the markers array
    //      for (var i=0; i<markers.length; i++) {

    //         var lon = markers[i][0];
    //         var lat = markers[i][1];
    //         var popupText = markers[i][2];

    //         // markerr  = L.marker(lat, lon).bindPopup('Dealer Tes');
    //         // circle   = L.circle(lat, lon, {radius: 500, color: 'red', opacity:.5});
    //         // L.featureGroup([markerr, circle])
    //         //             .bindPopup(popupText)
    //         //             .addTo(map);

    //          var markerLocation = new L.LatLng(lat, lon);
    //          var marker = new L.Marker(markerLocation);
    //          map.addLayer(marker);

    //         //  marker.bindPopup(popupText);

        //  }

    // untuk group marker, tapi jika tidak pake circle
    // map.addLayer(markers);


    var mapCenter = [ {!!  $data->lat_proposal ?? $lat_ !!}, {!!  $data->long_proposal ?? $long_ !!}];

    // Tambah Data Marker
    var theMarker = L.marker(mapCenter).addTo(map);

    function updateMarker(lat, lng) {
        theMarker
        .setLatLng([lat, lng])
        .bindPopup("Tandai Lokasi")
        .openPopup();
        return false;
    };

    var updateMarkerByInputs = function() {
        return updateMarker( $('#lat').val() , $('#long').val());
    }

    $('#lat').on('input', updateMarkerByInputs);
    $('#long').on('input', updateMarkerByInputs);
    </script>


@endsection

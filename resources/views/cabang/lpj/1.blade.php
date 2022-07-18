@extends('cabang.layouts.cabang')

@section('title', 'Buat LPJ')
@section('content')
<style>
    .table td {
        vertical-align: baseline;
    }
</style>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="card-body" action="">
                        @csrf
                        <input type="hidden" name="id" value="{{ request()->id }}">
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
                            <div class="row">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Tempat</strong>
                                </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Target</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="tempatproposal" value="{{ $data->proposal->tempat_proposal }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">
                                                    Aktual<strong style="color:rgb(243, 0, 0)">*</strong>
                                                </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="tempat" name="tempat" value="{{ $data->tempat_lpj }}" required>
                                                    <div class="text-muted">
                                                        <input type="checkbox" name="cekaktualtempat" id="cekaktualtempat" onclick="aktualtempat()">
                                                        Sesuai Target
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Lokasi</strong>
                                </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Target</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control data-lokasi" id="lokasiproposal">
                                                        @if (!null == $data->proposal->lokasi_proposal)
                                                            <option value="{{ $data->proposal->lokasi_proposal }}" selected>{{ $data->proposal->lokasi->kelurahan_lokasi }}, {{ $data->proposal->lokasi->kecamatan_lokasi }}, {{ Str::title($data->proposal->lokasi->kota_lokasi) }}</option>
                                                        @else
                                                            <option></option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Aktual<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-sm-9">
                                                    <div style="display: none" id="lokasicheck">
                                                        <select class="form-control data-lokasi-lpj-check" id="lokasicheck_" required >
                                                            @if (!null == $data->proposal->lokasi_proposal)
                                                                <option value="{{ $data->proposal->lokasi_proposal }}" selected>{{ $data->proposal->lokasi->kelurahan_lokasi }}, {{ $data->proposal->lokasi->kecamatan_lokasi }}, {{ Str::title($data->proposal->lokasi->kota_lokasi) }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div style="display: block" id="lokasi">
                                                        <select class="form-control data-lokasi-lpj" name="lokasi" id="lokasi_" required>
                                                            <option value=""></option>
                                                            @foreach ($datalokasi as $data_l)
                                                                <option value="{{ $data_l->id }}"
                                                                    @if ($data_l->id == $data->lokasi_lpj)
                                                                        selected
                                                                    @endif
                                                                    >
                                                                    {{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}, {{ Str::title($data_l->kota_lokasi) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="text-muted">
                                                        <input type="checkbox" name="cekaktuallokasi" id="cekaktuallokasi" onclick="aktuallokasi()">
                                                        Sesuai Target
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Finance Company</strong>
                                </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Target</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control data-finance" id="finance_proposal" multiple="multiple">
                                                        @if ($data->proposal->finance_proposal)
                                                            @foreach (json_decode($data->proposal->finance_proposal) as $key => $data_dis)
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
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Aktual<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-sm-9">
                                                    <div style="display: none" id="financecheck">
                                                        <select class="form-control data-finance-lpj-check" id="financecheck_" multiple="multiple">
                                                            @if ($data->proposal->finance_proposal)
                                                                @foreach (json_decode($data->proposal->finance_proposal) as $key => $data_dis_)
                                                                    @php
                                                                        $finance_ = DB::table('finance_companies')->where('id', $data_dis_)->first();
                                                                    @endphp
                                                                    <option value="{{ $data_dis_ }}" selected>{{ $finance_->kode }}</option>
                                                                @endforeach
                                                            @else
                                                                <option></option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div style="display: block"  id="finance">
                                                        <select class="form-control data-finance-lpj" id="finance_" name="finance[]" multiple required>
                                                            @if ($data->finance_lpj)
                                                                @foreach (json_decode($data->finance_lpj) as $key => $data_lpj_fin)
                                                                    @php
                                                                        $finance_lpj = DB::table('finance_companies')->where('id', $data_lpj_fin)->first();
                                                                    @endphp
                                                                    <option value="{{ $data_lpj_fin }}" selected>{{ $finance_lpj->kode }}</option>
                                                                @endforeach
                                                            @else
                                                                <option></option>
                                                            @endif
                                                            @foreach ($datafinance as $data_fi)
                                                                <option value="{{ $data_fi->id }}">{{ $data_fi->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="text-muted">
                                                        <input type="checkbox" name="cekaktualfinance" id="cekaktualfinance" onclick="aktualfinance()">
                                                        Sesuai Target
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Periode</strong>
                                </label>
                                <div class="col-sm-10 col-form-label">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    Target
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">Start</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="date" id="start_" value="{{ $data->proposal->periode_start_proposal }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">End</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="date" id="end_" value="{{ $data->proposal->periode_end_proposal }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    Aktual<strong style="color:rgb(243, 0, 0)">*</strong>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">Start</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" onchange="tanggalevent()" id="start" name="start" type="date" value="{{ $data->periode_start_lpj }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">End</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="end" name="end" type="date" value="{{ $data->periode_start_lpj }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="text-muted">
                                                        <input type="checkbox" name="cekaktualperiode" id="cekaktualperiode" onclick="aktualperiode()">
                                                        Sesuai Target
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <div class="col-12">
                                    <a href="{{ route('cabang.lpj.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                    <div class="float-right">
                                        <button class="btn btn-outline-info" type="text" name="submit" value="draft">Simpan Sebagai Draft</button>
                                        <button class="btn btn-primary" type="text" name="submit" value="submit"  onclick="return confirm('Konfirmasi')">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
    <script type="text/javascript">
        $('.data-lokasi').select2().prop("disabled", true);
    </script>
    <script type="text/javascript">
        $('.data-lokasi-lpj').select2();
        $('.data-lokasi-lpj-check').select2();
    </script>
    <script type="text/javascript">
        $('.data-finance').select2().prop("disabled", true);
    </script>
    <script type="text/javascript">
        $('.data-finance-lpj').select2();
        $('.data-finance-lpj-check').select2();
    </script>
    <script>
        function tanggalevent() {
            var start     = document.getElementById("start").value;
            var datestart = new Date(start);
            datestart.setDate(datestart.getDate()+{{ $data->proposal->kategori->waktu_minimum+1 ?? 2 }});
            // var y = datestart.getFullYear();
            // var m = datestart.getMonth()+1;
            // var d = datestart.getDate();
            // var getend = new Date(y+'-'+m+'-'+d);
            var minend = datestart.toISOString().substring(0,10);
            document.getElementById("end").min = minend;
            // console.log(minend);
        }
    </script>
    <script>
        function aktualtempat() {
            if (document.getElementById("cekaktualtempat").checked == true){
                document.getElementById("tempat").value = document.getElementById("tempatproposal").value;
            } else {
                document.getElementById("tempat").value = null;
            }
        }
    </script>
    <script>
        function aktuallokasi() {
            if (document.getElementById("cekaktuallokasi").checked == true){
                document.getElementById("lokasi").style.display         = 'none';
                document.getElementById("lokasicheck").style.display    = 'block';

                document.getElementById("lokasi_").setAttribute('name', '');
                document.getElementById("lokasicheck_").setAttribute('name', 'lokasi');

                document.getElementById("lokasi_").removeAttribute('required', '');
                document.getElementById("lokasicheck_").setAttribute('required', '');
            } else {
                document.getElementById("lokasi").style.display         = 'block';
                document.getElementById("lokasicheck").style.display    = 'none';

                document.getElementById("lokasi_").setAttribute('name', 'lokasi');
                document.getElementById("lokasicheck_").setAttribute('name', '');

                document.getElementById("lokasi_").setAttribute('required', '');
                document.getElementById("lokasicheck_").removeAttribute('required', '');
            }
        }
    </script>
    <script>
        function aktualfinance() {
            if (document.getElementById("cekaktualfinance").checked == true){
                document.getElementById("finance").style.display        = 'none';
                document.getElementById("financecheck").style.display   = 'block';

                document.getElementById("finance_").setAttribute('name', '');
                document.getElementById("financecheck_").setAttribute('name', 'finance[]');

                document.getElementById("finance_").removeAttribute('required', '');
                document.getElementById("financecheck_").setAttribute('required', '');
            } else {
                document.getElementById("finance").style.display        = 'block';
                document.getElementById("financecheck").style.display   = 'none';

                document.getElementById("finance_").setAttribute('name', 'finance[]');
                document.getElementById("financecheck_").setAttribute('name', '');

                document.getElementById("finance_").setAttribute('required', '');
                document.getElementById("financecheck_").removeAttribute('required', '');
            }
        }
    </script>
    <script>
        function aktualperiode() {
            if (document.getElementById("cekaktualperiode").checked == true){
                document.getElementById("start").value  = document.getElementById("start_").value;
                document.getElementById("end").value    = document.getElementById("end_").value;
                tanggalevent();
            } else {
                document.getElementById("start").value  = null;
                document.getElementById("end").value    = null;
            }
        }
    </script>
@endsection

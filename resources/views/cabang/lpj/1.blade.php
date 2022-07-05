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
                            <div class="row mb-3">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Lokasi Aktual</strong>
                                </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Tempat<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"  name="tempat" value="{{ $data->tempat_lpj }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Lokasi<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control data-lokasi" name="lokasi" required>
                                                        @if (!null == $data->lokasi_lpj)
                                                            <option value="{{ $data->lokasi_lpj }}" selected>{{ $data->lokasi->kelurahan_lokasi }}, {{ $data->lokasi->kecamatan_lokasi }}, {{ Str::title($data->lokasi->kota_lokasi) }}</option>
                                                        @else
                                                            <option></option>
                                                        @endif
                                                        @foreach ($datalokasi as $data_l)
                                                            <option value="{{ $data_l->id }}">{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}, {{ Str::title($data_l->kota_lokasi) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-2 col-form-label"><strong>Finance Company</strong><strong style="color:rgb(243, 0, 0)">*</strong></label>
                                <div class="col-sm-5">
                                    <select class="form-control data-finance" id="finance" name="finance[]" multiple required>
                                        @if ($data->finance_lpj)
                                            @foreach (json_decode($data->finance_lpj) as $key => $data_dis)
                                                @php
                                                    $finance_ = DB::table('finance_companies')->where('id', $data_dis)->first();
                                                @endphp
                                                <option value="{{ $data_dis }}" selected>{{ $finance_->kode }}</option>
                                            @endforeach
                                        @else
                                            <option></option>
                                        @endif
                                        @foreach ($datafinance as $data_fi)
                                            <option value="{{ $data_fi->id }}">{{ $data_fi->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
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
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    Aktual <strong style="color:rgb(243, 0, 0)">*</strong>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">Start</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="start" type="date" value="{{ $data->periode_start_lpj }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">End</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="end" type="date" value="{{ $data->periode_start_lpj }}" required>
                                                        </div>
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
        $('.data-lokasi').select2();
    </script>
    <script type="text/javascript">
        $('.data-finance').select2();
    </script>
@endsection

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
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped border datatable table-sm table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th colspan="2">Database</th>
                                                <th colspan="2">Prospecting</th>
                                                <th colspan="2">Penjualan</th>
                                                <th colspan="2">Downloader Motorku-X</th>
                                                <th colspan="2">Biaya</th>
                                            </tr>
                                            <tr>
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
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input class="form-control" type="number"  value="{{ $data->proposal->target_database_proposal }}" disabled>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" name="database" value="{{ $data->target_database_lpj }}" required>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number"  value="{{ $data->proposal->target_penjualan_proposal }}" disabled>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" name="penjualan" value="{{ $data->target_penjualan_lpj }}" required>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number"  value="{{ $data->proposal->target_prospectus_proposal }}" disabled>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" name="prospectus" value="{{ $data->target_prospectus_lpj }}" required>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number"  value="{{ $data->proposal->target_downloader_proposal }}" disabled>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" name="downloader" value="{{ $data->target_downloader_lpj }}" required>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                        </div>
                                                        <input class="form-control" value="{{ number_format($data->proposal->total_dana_proposal,0,',',','); }}" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                        </div>
                                                        <input class="form-control" name="totaldana" value="{{ $data->total_dana_lpj }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <div class="col-12">
                                    <a href="{{ route('cabang.lpj.getCreateOne') }}?id={{ request()->id }}" class="btn btn-outline-secondary">Kembali</a>
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

@endsection

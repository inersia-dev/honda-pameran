@extends('frontend.layouts.app')

@section('title', 'Pameran | Create')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form class="card-body" action="">
                        @csrf
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
                                <strong>Delaer</strong>
                            </label>
                            <label class="col-sm-10 col-form-label">
                                <u>Cabang A</u>
                            </label>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Judul Proposal</strong>
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text">
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
                                        <textarea class="form-control" name="" id="" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Latar Belakang Kompetitor</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Kondisi Sales</label>
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
                                                        <input class="form-control" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Tujuan / Benefit</strong>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="" id="" rows="2"></textarea>
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
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control data-kelurahan"> </select>
                                            </div>
                                        </div>
                                        {{-- <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div> --}}
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Display</label>
                                            <div class="col-sm-9">
                                                <select class="form-control data-display"> </select>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-4 col-form-label">History Penjualan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="number">
                                                    <span class="input-group-text">Unit</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Database</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Penjualan</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Periode</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="tanggal" type="text">
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-4 col-form-label">Materi Promosi</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Program Penjualan</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text">
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
                                            <th>Total Biaya</th>
                                            <th>Beban Delaer</th>
                                            <th>Beban Fincoy</th>
                                            <th>Beban MD(Jika Ada)</th>
                                            <th>Fincoy</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row_to_clone_dana">
                                            <td>
                                                <input class="form-control" type="text" name="ket_dana[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="total_dana[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="beban_dealer_dana[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="beban_fincoy_dana[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="beban_md_dana[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="fincoy_dana[0]">
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="removeDana btn btn-danger">
                                                    <i class="fas fa-minus-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <a class="btn btn-outline-success" onclick="addRowDana(); return false;" href="#">
                                        Tambah Perkiraan Dana <i class="fas fa-plus-circle"></i>
                                    </a>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Penanggung Jawab</strong>
                            </label>
                            <div class="col-sm-10">
                                <table class="table table-striped border datatable table-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Nama</th>
                                            <th>HONDA ID</th>
                                            <th>HSO ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Sales People</strong>
                            </label>
                            <div class="col-sm-10">
                                <table class="table table-striped border datatable table-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Nama</th>
                                            <th>HONDA ID</th>
                                            <th>HSO ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row_to_clone">
                                            <td>
                                                <input class="form-control" type="text" name="nama[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="honda_id[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="hso_id[0]">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <a class="btn btn-outline-success" onclick="addRow(); return false;" href="#">
                                        Tambah Sales People <i class="fas fa-plus-circle"></i>
                                    </a>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Lokasi Pameran</strong>
                            </label>
                            <div class="col-sm-10">
                                <div id="mapid"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-2 row">
                            <div class="col-12">
                                <a href="#" class="btn btn-outline-secondary">Cancel</a>
                                <div class="float-right">
                                    <button class="btn btn-outline-info" type="button">Simpan Sebagai Draft</button>
                                    <button class="btn btn-primary" type="button">Selesai</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <script type="text/javascript">
        $('.data-kelurahan').select2({
            placeholder: 'Cari Kelurahan',
            ajax: {
                url: '/kelurahan',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name+' - '+item.email,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
    <script type="text/javascript">
        $('.data-display').select2({
            placeholder: 'Cari Display',
            ajax: {
                url: '/display',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name+' - '+item.email,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection

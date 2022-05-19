@extends('frontend.layouts.app')

@section('title', 'Pameran | Create')

@section('content')
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
                                <strong>Status</strong>
                            </label>
                            <label class="col-sm-10 col-form-label">
                                <button class="btn btn-success">DISETUJUI</button>
                            </label>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Judul Proposal</strong>
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" disabled  value="PAMERAN SEPAKU" disabled>
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
                                        <textarea class="form-control" name="" id="" rows="2" disabled>Meningkatkan Image Honda pada umumnya dan Image Harapan Utama pada khususnya</textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-2 col-form-label">Latar Belakang Kompetitor</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="2" disabled>Semakin Agresifnya Kompetitor melakukan Promosi dan membuka Pameran</textarea>
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
                                                        <input class="form-control" type="number" value="73" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number" value="62" disabled>
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
                                <textarea class="form-control" name="" id="" rows="2" disabled>Menumbuhkan Data Base,Menambah Hot Prospek,Meningkatkan Penjualan,Serta memperkenalkan Harapan Utama dan </textarea>
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
                                                <input class="form-control" type="text" value="Jl.Negara rt 01 Sukaraja" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="Suka Raja" disabled >
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="SEPAKU" disabled >
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Display</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="Cub Series,AT Series & Sport" disabled >
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-4 col-form-label">History Penjualan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="number" value="14" disabled>
                                                    <span class="input-group-text">Unit</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Database</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" value="40" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Target Penjualan</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="number" value="25" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Periode</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="tanggal" type="text" disabled >
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-4 col-form-label">Materi Promosi</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="Spanduk,X Banner,PL,Flyer bergambar" disabled >
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-5 col-form-label">Program Penjualan</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" type="text" value="Program yang berjalan dibulan JULI 2021" disabled >
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row_to_clone_dana">
                                            <td>
                                                <input class="form-control" type="text" value="sewa tempat" disabled  name="ket_dana[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" value="1800000" name="total_dana[0]" disabled>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" value="900000" name="beban_dealer_dana[0]" disabled>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" value="900000" name="beban_fincoy_dana[0]" disabled>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="beban_md_dana[0]" disabled>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="FIF" name="fincoy_[0]" disabled>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
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
                                                <input class="form-control" type="text" value="Andi" disabled >
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="123123" disabled >
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="i123123" disabled >
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
                                                <input class="form-control" type="text" value="Agus" disabled  name="nama[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="i123123" disabled  name="honda_id[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="123123" disabled  name="hso_id[0]">
                                            </td>
                                        </tr>
                                        <tr class="row_to_clone">
                                            <td>
                                                <input class="form-control" type="text" value="Yoga" disabled  name="nama[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="i123123" disabled  name="honda_id[0]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="123123" disabled  name="hso_id[0]">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">
                                <strong>Titik Lokasi Pameran</strong>
                            </label>
                            <div class="col-sm-10">
                                <div id="mapid"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@extends('cabang.layouts.cabang')

@section('title', 'Buat Proposal')
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
                    <form class="card-body" action="{{ route('cabang.lpj.postStore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="uuid" value="">
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
                                    <strong>Aktual Priode</strong>
                                </label>
                                <div class="col-sm-3 col-form-label">
                                    <div class="mb-2 row">
                                        <label class="col-sm-3 col-form-label">Start</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="tanggalstart" type="date" value="">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-sm-3 col-form-label">End</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="tanggalend" type="date" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 col-form-label">
                                    <strong>Lokasi</strong>
                                </div>
                                <div class="col-sm-5">
                                    <input class="form-control" name="lokasi" id="">
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
                                                            <input class="form-control" type="number" value="">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" value="">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" value="">
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
                                                            <input class="form-control" type="number" value="">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" value="">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" value="">
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
                                                        <th>Beban Delaer</th>
                                                        <th>Beban Fincoy</th>
                                                        <th>Beban MD(Jika Ada)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($datadana as $key => $data_dana)
                                                        <tr>
                                                            <td>
                                                                <input class="form-control" type="text" value="{{ data_get($data_dana, 'ket_dana') }}">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number"  value="{{ data_get($data_dana, 'beban_dealer_dana') }}">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number"  value="{{ data_get($data_dana, 'beban_fincoy_dana') }}">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number" value="{{ data_get($data_dana, 'beban_md_dana') }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}
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
                                                        <input class="form-control" value="">
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
                                                        <th>Beban Delaer</th>
                                                        <th>Beban Fincoy</th>
                                                        <th>Beban MD(Jika Ada)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @if (!null == $datadana)
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
                                                    @else --}}
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
                                                    {{-- @endif --}}

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
                                    <textarea class="form-control" name="problem" id="" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">Corrective Action</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="corrective" id="" rows="2"></textarea>
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
                                            <a class="btn btn-outline-success" onclick="tambahsales(); return false;" href="#">
                                                Tambah Data Konsumen <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row" style="font-size: 10px">
                                        <div class="col-12">
                                            <table class="table table-striped border datatable table-sm" id="salesdata">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Oke</th>
                                                        <th>Oke</th>
                                                        <th>Oke</th>
                                                        <th>Oke</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    {{-- @if (!null == $data->sales_people_proposal)
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
                                                                    <a href="javascript:void(0);" class="removeSales btn btn-danger"><i class="fas fa-minus-circle"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else

                                                    @endif --}}
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
                                                {{-- @if (!null == $data->foto_lokasi_proposal)
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
                                                @endif --}}
                                            </div>
                                            <div class="row pt-2">
                                                <div class="col-4">
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
                            </div>
                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <div class="col-12">
                                    <a href="#" class="btn btn-outline-secondary">Cancel</a>
                                    <div class="float-right">
                                        <button class="btn btn-outline-info" type="text" name="b" value="draft">Simpan Sebagai Draft</button>
                                        <button class="btn btn-primary" type="text" name="b" value="done"  onclick="return confirm('Konfirmasi Pengajuan Proposal')">Selesai</button>
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
        $('.data-lokasi').select2(
        //     {
        //     placeholder: 'Cari Lokasi',
        //     ajax: {
        //         url: 'data-lokasi',
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function (data) {
        //             return {
        //                 results: $.map(data, function (item) {
        //                     return {
        //                         text: item.kelurahan_lokasi+', '+item.kecamatan_lokasi+', '+item.kota_lokasi,
        //                         id: item.id
        //                     }
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // }
        );
    </script>
    <script type="text/javascript">
        $('.data-display').select2(
        //     {
        //     placeholder: 'Cari Display',
        //     ajax: {
        //         url: '/display',
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function (data) {
        //             return {
        //                 results: $.map(data, function (item) {
        //                     return {
        //                         text: item.name+' - '+item.email,
        //                         id: item.id
        //                     }
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // }
        );
    </script>
    <script type="text/javascript">
        $('.data-sales').select2(
        //     {
        //     placeholder: 'Cari Sales People',
        //     ajax: {
        //         url: '/sales',
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function (data) {
        //             return {
        //                 results: $.map(data, function (item) {
        //                     return {
        //                         text: item.name+' - '+item.email,
        //                         id: item.id
        //                     }
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // }
        );
    </script>
    <script type="text/javascript">
        $('.data-pj').select2(
        //     {
        //     placeholder: 'Cari Penanggung Jawab',
        //     ajax: {
        //         url: '/pj',
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function (data) {
        //             return {
        //                 results: $.map(data, function (item) {
        //                     return {
        //                         text: item.name+' - '+item.email,
        //                         id: item.id
        //                     }
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // }
        );
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

@extends('cabang.layouts.cabang')

@section('title', 'Konsumen')
@section('content')
{{-- <link rel="stylesheet"  type="text/css" href="/filepond/app.css"/> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.4/filepond.css" integrity="sha512-OwkTbucz29JjQUeii4ZRkjY/E+Xdg4AfffPZICCf98rYKWIHxX87AwwuIQ73rbVrev8goqrKmaXyu+VxyDqr1A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link
href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
rel="stylesheet"
/>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

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
                                        <h5>Tambah Data Konsumen</h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">
                                    <strong>Konsumen</strong>
                                </label>
                                <div class="col-sm-10"></div>
                                <div class="col-sm-12">
                                    <div class="row pb-2">
                                        <div class="col-8"></div>
                                        <div class="col-4 text-right">
                                            <a class="btn btn-outline-success btn-sm" onclick="tambahsales(); return false;" href="#">
                                                Tambah Data Konsumen <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        <div class="col-12">
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
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>Alamat</td>
                                                        <td>Kelurahan</td>
                                                        <td>No Telepon</td>
                                                        <td>Type</td>
                                                        <td>Sales Prople</td>
                                                        <td>CASH/CREDIT</td>
                                                        <td>Finance Company</td>
                                                        <td class="text-center">
                                                           <i class="fas fa-check"></i>
                                                        </td>
                                                        <td class="text-center">
                                                           <i class="fas fa-check"></i>
                                                        </td>
                                                        <td class="text-center">
                                                           <i class="fas fa-check"></i>
                                                        </td>
                                                        <td class="text-center">
                                                           <i class="fas fa-check"></i>
                                                        </td>
                                                        <td class="text-center">
                                                           <i class="fas fa-check"></i>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" id="edit-post" data-id="1" class="btn btn-warning btn-sm m-0" style="padding: 0.15rem 0.3rem; font-size: 0.7rem;">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" id="delete-post" data-id="1" class="btn btn-danger delete-post btn-sm m-0" style="padding: 0.15rem 0.3rem; font-size: 0.7rem;">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <div class="col-12">
                                    <a href="#" class="btn btn-outline-secondary">Cancel</a>
                                    <div class="float-right">
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

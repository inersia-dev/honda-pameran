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
            <div class="col-md-10">
                <div class="card">
                    <form class="card-body" action="{{ route('cabang.lpj.postUpdateKonsumen') }}" method="POST">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ request()->uuid }}">
                        <input type="hidden" name="id" value="{{ request()->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-left">
                                        <h5>Update Data Konsumen</h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row pb-2">
                                <div class="col-12 pt-2">
                                    <div class="row" id="tambahkonsumen">
                                        <div class="col-6">
                                            <div class="row form-group">
                                                <label for="name" class="col-sm-3 control-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namakonsumen" name="namakonsumen" value="{{ $data->nama }}">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="alamatnkonsumen" name="alamatkonsumen" value="{{ $data->alamat }}" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">Kelurahan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control data-lokasi" name="lokasikonsumen">
                                                        <option value="{{ $data->id_lokasi }}">{{ $data->lokasi->kelurahan_lokasi }}, {{ $data->lokasi->kecamatan_lokasi }}</option>
                                                        <option value=""></option>
                                                        @foreach ($datalokasi as $data_l)
                                                            <option value="{{ $data_l->id }}">{{ $data_l->kelurahan_lokasi }}, {{ $data_l->kecamatan_lokasi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">No Telepon</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="notelponsumen" name="notelpkonsumen" value="{{ $data->notelp }}">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">Type</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="typekonsumen" name="typekonsumen" value="{{ $data->type }}">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">Sales People</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control data-sales" name="saleskonsumen">
                                                        <option value="{{ $data->id_sales_people }}">{{ $data->sales->nama_sales_people }}</option>
                                                        <option value=""></option>
                                                        @foreach ($salespeople as $data_sp)
                                                            <option value="{{ $data_sp->id }}">{{ $data_sp->nama_sales_people }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">Jenis</label>
                                                <div class="col-sm-9">
                                                    <select name="jeniskonsumen" class="form-control" id="jeniskonsumen" >
                                                        <option value="{{ $data->cash_credit }}">{{ $data->cash_credit == 1 ? 'CASH' : 'CREDIT' }}</option>
                                                        <option value=""></option>
                                                        <option value="1">CASH</option>
                                                        <option value="2">CREDIT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 control-label">Finance Company</label>
                                                <div class="col-sm-9">
                                                    <select name="financekonsumen" class="form-control" id="financekonsumen" >
                                                        <option value="{{ $data->finance_comapany }}">{{ $data->finance_comapany }}</option>
                                                        <option value=""></option>
                                                        @foreach ($datafinance as $data_fi)
                                                            <option value="{{ $data_fi->id }}">{{ $data_fi->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row form-group">
                                                        <label class="col-sm-6 control-label">Database</label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="dbkonsumen" id="dbkonsumen" value="{{ $data->database ? '' : ''; }}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-6 control-label">Prospecting</label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="proskonsumen" id="proskonsumen" value="{{ $data->prospecting ? '' : ''; }}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-6 control-label">Polling</label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="polkonsumen" id="polkonsumen" value="{{ $data->polling ? '' : ''; }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="row form-group">
                                                        <label class="col-sm-6 control-label">Reject</label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="rejkonsumen" id="rejkonsumen" value="{{ $data->reject ? '' : ''; }}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-6 control-label">SSU</label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="ssukonsumen" id="ssukonsumen" value="{{ $data->ssu ? '' : ''; }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-8"></div>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-sm btn-primary btn-block" type="text" name="b" value="konsumen">Simpan</button>
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
                                        <button class="btn btn-primary" type="text" name="b" value="done"  onclick="return confirm('Konfirmasi Pengajuan Proposal')">Submit</button>
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

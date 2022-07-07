@extends('pusat.layouts.pusat')

@section('title', 'LPJ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="float-left">
                            <h5>Data LPJ</h5>
                        </div>
                        <div class="float-right">
                            {{-- <a href="#" class="btn btn-success">Buat Proposal </a> --}}
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <form class="row" action="{{ url()->current() }}">
                        <div class="col-12">
                            <div class="row">
                                <div class="pb-2 col">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Status</label>
                                    </div>
                                    <select id="status" name="status" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="1">Draft</option>
                                        <option value="2">Submit</option>
                                    </select>
                                </div>
                                <div class="pb-2 col">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Kategori Proposal</label>
                                    </div>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value=""></option>
                                        @foreach ($datakategori as $data_k)
                                            <option value="{{ $data_k->id }}">{{ $data_k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pb-2 col">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Penanggung Jawab</label>
                                    </div>
                                    <input class="form-control" type="text" value="{{ request()->namapj ?? '' }}" name="namapj" style="font-size: small" />
                                </div>
                                <div class="pb-2 col">
                                    <div  style="padding-top: 5px; padding-bottom: 5px">
                                        <label class="form-check-label">Submit </label>
                                    </div>
                                    <input class="form-control" type="date" value="{{ request()->tanggal ?? '' }}" name="tanggal" style="font-size: small" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4 text-right" style="padding-bottom:20px;">
                                    <div class="align-middle">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block" > <i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mb-2 bg-gray-500 text-white" style="border-radius: 5px; font-size: 12px;">
                    <div class="row p-2 font-weight-bold">
                        <div class="col p-0 pl-3">Status</div>
                        <div class="col p-0">Proposal</div>
                        <div class="col p-0">Penanggung Jawab</div>
                        <div class="col p-0">Database</div>
                        <div class="col p-0">Prospecting</div>
                        <div class="col p-0">Penjualan</div>
                        <div class="col p-0">Biaya</div>
                        <div class="col p-0">Submit Date</div>
                    </div>
                </div>

                @php
                $first  = 0;
                $end    = 0;
                @endphp

                @foreach($datas as $key => $data)
                    <div href="#" style="text-decoration: none;">
                        <div class="card mb-2" style="border-radius: 5px; font-size: 12px">
                            <div class="row p-2 align-items-center">
                                <div class="col p-0 pl-3">
                                    <div class="row">
                                        <div class="pl-3" style="">
                                            <div class="font-weight-bold">
                                                @if ($data->status_lpj == 1)
                                                    <span class="btn btn-sm btn-outline-info ms-auto">
                                                        DRAFT
                                                    </span>
                                                @elseif ($data->status_lpj == 2)
                                                    <span class="btn btn-sm btn-success ms-auto">
                                                        SUBMIT
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0 pl-3">
                                    <div class="font-weight-bold" style="color: #ec1b25">
                                        {{ $data->proposal->kategori->nama_kategori ?? '-' }}
                                    </div>
                                </div>
                                <div class="col p-0 pl-3">
                                    <div class="font-weight-bold" style="color: #222222">
                                        {{ $data->proposal->pj->nama_sales_people ?? '' }}
                                    </div>
                                </div>
                                <div class="col p-0 pl-3">
                                    {{ $data->target_database_lpj ?? '' }}
                                </div>
                                <div class="col p-0 pl-3">
                                    {{ $data->target_prospectus_lpj ?? '' }}
                                </div>
                                <div class="col p-0 pl-3">
                                    {{ $data->target_penjualan_lpj ?? '' }}
                                </div>
                                <div class="col p-0 pl-3">
                                    Rp. {{ number_format($data->total_dana_lpj,0,',',','); }}
                                </div>
                                <div class="col p-0 pr-4">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="text-muted" style="font-size: 10px">
                                                {{ $data->created_at }}
                                            </div>
                                        </div>
                                        <div class="col-4 text-right">
                                            <div class="btn-group dropleft">
                                                <a href="{{ route('pusat.lpj.getShow') }}?id={{ $data->uuid }}" class="btn btn-sm btn-warning">
                                                    <i class="cil-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $first  = $datas->firstItem();
                        $end    = $data->id;
                        @endphp
                    @endforeach
                <div class="row">
                    <div class="col-7">
                        <div class="float-left">
                            {!! $first !!} - {!! $end !!} From {!! $datas->total() !!} Data
                        </div>
                    </div><!--col-->

                    <div class="col-5">
                        <div class="float-right">
                            {!! $datas->appends(request()->query())->links() !!}
                        </div>
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>
    </div><!--col-md-10-->
</div><!--row-->
<script type="text/javascript">
    $('.data-lokasi').select2();
</script>
<script type="text/javascript">
    $(document).ready(function(){
          $("#kategori").val("{!! request()->kategori !!}");
          $("#lokasi").val("{!! request()->lokasi !!}");
          $("#status").val("{!! request()->status !!}");
    });
</script>

@endsection

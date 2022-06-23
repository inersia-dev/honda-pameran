@extends('cabang.layouts.cabang')

@section('title', 'Proposal')
@section('content')
<div class="row pb-4">
    <div class="col-md-6">
        <strong>Pilih Jenis Proposal</strong>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">

        @foreach ($datas as $data)
            <form action="{{ route('cabang.proposal.postPilihJenisProposalBuat') }}" method="POST" class="row" onsubmit="return confirm('Konfirmasi Pembuatan Proposal {{ $data->nama_kategori }} ?');">
                @csrf
                <input type="hidden" name="metode" value="buat">
                <input type="hidden" name="kategori" value="{{ $data->id }}">
                <div class="col-md-12">
                    <div class="card" style="text-decoration: none">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-1 btn-outline-primary">
                                    <i class="cil-chevron-right"></i>
                                </div>
                                <div class="col"  style="color: #222; font-size: 20px">
                                    <strong>{{ $data->nama_kategori }}</strong>
                                </div>
                                <div class="col-5 text-right">
                                    <button class="btn btn-outline-primary" id="btn-submit">Buat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach

    </div>
</div>
@endsection

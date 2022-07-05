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
                                <label class="col-sm-2 col-form-label"><strong>Problem Identification</strong><strong style="color:rgb(243, 0, 0)">*</strong></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="problem" id="" rows="2" required>{{ $data->problem_identification_lpj }}</textarea>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label"><strong>Corrective Action</strong><strong style="color:rgb(243, 0, 0)">*</strong></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="corrective" id="" rows="2" required>{{ $data->corrective_action_lpj }}</textarea>
                                </div>
                                <div class="col-12">
                                </div>
                            </div>
                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <div class="col-12">
                                    <a href="{{ route('cabang.lpj.getCreateTwo') }}?id={{ request()->id }}" class="btn btn-outline-secondary">Kembali</a>
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

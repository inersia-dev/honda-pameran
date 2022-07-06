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
                    <div class="card-body">
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
                                    <strong>Dokumentasi</strong>
                                </label>
                                <div class="col-sm-10">
                                    <div class="mb-2 row">
                                        <label class="col-2 col-form-label">Dokumentasi Pre event</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <label class="col-4 col-form-label">Kanvasing Sebelum kegiatan<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-8">
                                                    <div class="row p-2">
                                                        @php
                                                            $datakanvasing = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 1)->get();
                                                        @endphp
                                                        @foreach ($datakanvasing as $item_1)
                                                        <div class="col-3 img-thumbnail">
                                                            <div class="float-left" style="position: absolute">
                                                                <a href="{{ route('cabang.lpj.getCreateFourUploadHapus') }}?id={{ $item_1->id }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_1->foto }}" target="_blank">
                                                                <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_1->foto }}" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        <div class="pb-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a type="text" name="b" value="upload" class="btn btn-info btn-block" href="{{ route('cabang.lpj.getCreateFourUpload') }}?id={{ request()->id }}&upload=1">
                                                                <div class="float-left">
                                                                    Upload Foto
                                                                </div>
                                                                <div class="text-right">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Capture Blast WA kepada konsumen<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-8">
                                                    <div class="row p-2">
                                                        @php
                                                            $capture = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 2)->get();
                                                        @endphp
                                                        @foreach ($capture as $item_2)
                                                        <div class="col-3 img-thumbnail">
                                                            <div class="float-left" style="position: absolute">
                                                                <a href="{{ route('cabang.lpj.getCreateFourUploadHapus') }}?id={{ $item_2->id }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_2->foto }}" target="_blank">
                                                                <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_2->foto }}" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        <div class="pb-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a type="text" name="b" value="upload" class="btn btn-info btn-block" href="{{ route('cabang.lpj.getCreateFourUpload') }}?id={{ request()->id }}&upload=2">
                                                                <div class="float-left">
                                                                    Upload Foto
                                                                </div>
                                                                <div class="text-right">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Posting flyer kegiatan di media sosial dealer<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-8">
                                                    <div class="row p-2">
                                                        @php
                                                            $posting = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 3)->get();
                                                        @endphp
                                                        @foreach ($posting as $item_3)
                                                        <div class="col-3 img-thumbnail">
                                                            <div class="float-left" style="position: absolute">
                                                                <a href="{{ route('cabang.lpj.getCreateFourUploadHapus') }}?id={{ $item_3->id }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_3->foto }}" target="_blank">
                                                                <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_3->foto }}" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        <div class="pb-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a type="text" name="b" value="upload" class="btn btn-info btn-block" href="{{ route('cabang.lpj.getCreateFourUpload') }}?id={{ request()->id }}&upload=3">
                                                                <div class="float-left">
                                                                    Upload Foto
                                                                </div>
                                                                <div class="text-right">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-2 row">
                                        <label class="col-2 col-form-label">Dokumentasi event Day</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <label class="col-4 col-form-label">Interaksi konsumen<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-8">
                                                    <div class="row p-2">
                                                        @php
                                                            $interaksi = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 4)->get();
                                                        @endphp
                                                        @foreach ($interaksi as $item_4)
                                                        <div class="col-3 img-thumbnail">
                                                            <div class="float-left" style="position: absolute">
                                                                <a href="{{ route('cabang.lpj.getCreateFourUploadHapus') }}?id={{ $item_4->id }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_4->foto }}" target="_blank">
                                                                <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_4->foto }}" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        <div class="pb-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a type="text" name="b" value="upload" class="btn btn-info btn-block" href="{{ route('cabang.lpj.getCreateFourUpload') }}?id={{ request()->id }}&upload=4">
                                                                <div class="float-left">
                                                                    Upload Foto
                                                                </div>
                                                                <div class="text-right">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Unit Display<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-8">
                                                    <div class="row p-2">
                                                        @php
                                                            $unitdisplay = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 5)->get();
                                                        @endphp
                                                        @foreach ($unitdisplay as $item_5)
                                                        <div class="col-3 img-thumbnail">
                                                            <div class="float-left" style="position: absolute">
                                                                <a href="{{ route('cabang.lpj.getCreateFourUploadHapus') }}?id={{ $item_5->id }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_5->foto }}" target="_blank">
                                                                <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_5->foto }}" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        <div class="pb-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a type="text" name="b" value="upload" class="btn btn-info btn-block" href="{{ route('cabang.lpj.getCreateFourUpload') }}?id={{ request()->id }}&upload=5">
                                                                <div class="float-left">
                                                                    Upload Foto
                                                                </div>
                                                                <div class="text-right">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label">Live Season saat kegiatan berlangsung<strong style="color:rgb(243, 0, 0)">*</strong></label>
                                                <div class="col-8">
                                                    <div class="row p-2">
                                                        @php
                                                            $liveseason = DB::table('lpj_dokumentasis')->where('id_lpj', $data->id)->where('kode', 6)->get();
                                                        @endphp
                                                        @foreach ($liveseason as $item_6)
                                                        <div class="col-3 img-thumbnail">
                                                            <div class="float-left" style="position: absolute">
                                                                <a href="{{ route('cabang.lpj.getCreateFourUploadHapus') }}?id={{ $item_6->id }}" class="float-right btn btn-sm btn-danger"  onclick="return confirm('Konfirmasi Menghapus foto?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ Request::root() }}/upload-foto-lpj/{{ $item_6->foto }}" target="_blank">
                                                                <img src="{{ Request::root() }}/upload-foto-lpj/{{ $item_6->foto }}" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        <div class="pb-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a type="text" name="b" value="upload" class="btn btn-info btn-block" href="{{ route('cabang.lpj.getCreateFourUpload') }}?id={{ request()->id }}&upload=6">
                                                                <div class="float-left">
                                                                    Upload Foto
                                                                </div>
                                                                <div class="text-right">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row fixed-bottom position-sticky p-4 border-top" style="background-color: #fff; ">
                                <form action="" class="col-12">
                                    <input type="hidden" name="id" value="{{ request()->id }}">
                                    <a href="{{ route('cabang.lpj.getCreateThree') }}?id={{ request()->id }}" class="btn btn-outline-secondary">Cancel</a>
                                    <div class="float-right">
                                        <button class="btn btn-outline-info" type="text" name="submit" value="draft">Simpan Sebagai Draft</button>
                                        <button class="btn btn-primary" type="text" name="submit" value="submit"  onclick="return confirm('Konfirmasi')">Next</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <div class="modal fade" id="canvasing" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Kanvasing Sebelum kegiatan<strong style="color:rgb(243, 0, 0)">*</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="namakonsumen" value="">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="capturewa" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Capture Blast WA kepada konsumen<strong style="color:rgb(243, 0, 0)">*</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="namakonsumen" value="">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="postingflyer" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Posting flyer kegiatan di media sosial dealer<strong style="color:rgb(243, 0, 0)">*</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="namakonsumen" value="">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="interaksi" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Interaksi konsumen<strong style="color:rgb(243, 0, 0)">*</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="namakonsumen" value="">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="unitdisplay" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Unit Display<strong style="color:rgb(243, 0, 0)">*</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="namakonsumen" value="">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="liveseason" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Live Season saat kegiatan berlangsung<strong style="color:rgb(243, 0, 0)">*</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="namakonsumen" value="">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

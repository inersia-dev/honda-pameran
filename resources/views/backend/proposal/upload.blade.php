@extends('cabang.layouts.upload')

@section('title', __('Dashboard | Upload Foto'))

@section('content')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link
href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
rel="stylesheet"
/>

<div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2 row">
                        <label class="col-sm-12 col-form-label">
                            <h4>Upload Foto Lokasi Pameran</h4>
                        </label>
                        <div class="col-sm-12">
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <input type="file" class="upload-foto" multiple/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row fixed-bottom position-sticky p-2 border-top" style="background-color: #fff; ">
                        <div class="col-12">
                            <div class="float-right">
                                <a href="{{ route('cabang.proposal.getCreate') }}?id={{ request()->uuid }}" class="btn btn-primary" type="text" name="b" value="done">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--col-md-10-->
    </div><!--row-->
</div><!--container-->


<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="/filepond/app.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.4/filepond.js" integrity="sha512-lwxeQnWzWAVEJG6qbGopo07zhE1UvXmuCyfNq4UCDFEFD2WXkuqHFAMw/4ZYwE/SBDjE1HgAF8TitwvFKA0k2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script src="https://unpkg.com/filepond/dist/filepond.js"></script> --}}
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

<script>
    $(function(){
        $.fn.filepond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImageResize
        );
    });

    $(function(){
            $('.upload-foto').filepond({
                labelIdle: '<span class="filepond--label-action"> Upload Foto Lokasi Minimal 2 Foto.</span>',
                allowMultiple: true,
                instantUpload: true,
                acceptedFileTypes: "image/png, image/jpeg",
                allowFileSizeValidation: true,
                maxFileSize: '10MB',
                imagePreviewMaxHeight: 500,
                server: {
                    url: 'upload-foto?uuid={!! request()->uuid !!}',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onload: (response) => response.key,
                        onerror: (response) => response.data,
                        ondata: (formData) => {
                            return console.log('sukses');
                        }
                    }
                }
            });

            $('.upload-foto').on('FilePond:processfile', function(e) {
                document.getElementById("selesai").classList.remove('d-none');
            });

        });
    $(document).ready(function () {
        $('#fform').on('submit',function(e) {
            if (pond.status != 4) {
                return false;
            }
            $(this).find(':input[type=submit]').hide();
            return true;
        });
    });
</script>

@endsection

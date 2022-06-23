@extends('pusat.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Datang</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Mohon Tunggu, Akun anda sedang dalam proses Aktivasi.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

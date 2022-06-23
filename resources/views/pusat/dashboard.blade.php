@extends('pusat.layouts.pusat')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' =>  Auth::guard('pusat')->user()->name])
        </x-slot>

        <x-slot name="body">
            <strong>Dashboard Main Dealer ...</strong>
        </x-slot>
    </x-backend.card>

    {{-- @include('pusat.includes.statistik') --}}


@endsection

@extends('cabang.layouts.cabang')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' =>  Auth::guard('cabang')->user()->name])
        </x-slot>

        <x-slot name="body">
           <strong>Dasboard Dealer</strong>
        </x-slot>
    </x-backend.card>

    {{-- @include('cabang.includes.statistik') --}}


@endsection

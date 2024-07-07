{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.admin.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/chart.js/Chart.min.css')}}">
@endpush

@section('content')
    <div class="title">
        Dashboard
    </div>

    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-6">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Monthly Sales</h4>
                    </div> --}}
                    <div class="card-body">
                        {{-- <canvas id="myChart" height="642" width="1388"></canvas> --}}
                        {!! $pChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Statistics</h4>
                    </div> --}}
                    {!! $fChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ $pChart->cdn() }}"></script>
    {!! $pChart->script() !!}
    {!! $fChart->script() !!}
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('assets/js/pages/index.min.js') }}"></script>
@endpush

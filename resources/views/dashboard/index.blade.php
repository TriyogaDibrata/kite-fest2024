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
            <div class="col-md-12">
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
            
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Serie Terbang</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" style="font-size: 8pt !important;">
                            <thead>
                                <tr>
                                    <th>SERI</th>
                                    <th>WAKTU</th>
                                    <th>KATEGORI</th>
                                    <th>SESI</th>
                                    <th class="text-center" colspan="20">NOMOR PESERTA</th>
                                    <th>JML</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    @foreach ($category->flights as $series)
                                    @php
                                        $participants = $series->participants->pluck('chest_no')->toArray();
                                    @endphp
                                        <tr>
                                            <td rowspan="4"><p><small>{{ $series->serie }}</small></p></td>
                                            <td rowspan="4">{{ formattedDate($series->date) .'/n'. $series->start . '-' . $series->end }}</td>
                                            <td rowspan="4">{{ $category->name }}</td>
                                            <td rowspan="4">{{ $series->session }}</td>
                                            @for ($i = 0; $i <= 19; $i++)
                                            @if (isset($participants[$i]))
                                            <td>{{ isset($participants[$i]) ? explode('-', $participants[$i])[1] : '' }}</td>
                                            @else
                                            <td class="bg-black"></td>
                                            @endif
                                            @endfor
                                            <td rowspan="4">{{ count($participants) }}</td>
                                        </tr>
                                        <tr>
                                            @for ($i = 20; $i <= 39; $i++)
                                            @if (isset($participants[$i]))
                                            <td>{{ isset($participants[$i]) ? explode('-', $participants[$i])[1] : '' }}</td>
                                            @else
                                            <td class="bg-black"></td>
                                            @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            @for ($i = 40; $i <= 59; $i++)
                                            @if (isset($participants[$i]))
                                            <td>{{ isset($participants[$i]) ? explode('-', $participants[$i])[1] : '' }}</td>
                                            @else
                                            <td class="bg-black"></td>
                                            @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            @for ($i = 60; $i <= 79; $i++)
                                            @if (isset($participants[$i]))
                                            <td>{{ isset($participants[$i]) ? explode('-', $participants[$i])[1] : '' }}</td>
                                            @else
                                            <td class="bg-black"></td>
                                            @endif
                                            @endfor
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            {{-- @foreach ($participant as $date => $series)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Serie Terbang {{ $date }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">SERI</th>
                                    <th rowspan="2">WAKTU</th>
                                    <th rowspan="2">KATEGORI</th>
                                    <th rowspan="2">SESI</th>
                                    <th colspan="20" class="text-center">Nomor Peserta</th>
                                    <th rowspan="2">JML</th>
                                </tr>
                                <tr>
                                    @for ($i = 1; $i <= 20; $i++)
                                        <th>{{ $i }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                @foreach ($series as $serie => $serie_value )
                                    <td rowspan="16">{{ $serie }}</td>
                                    <td rowspan="16">10.00 - 11.00</td>
                                    <td rowspan="4">Bebean Plastik</td>
                                    <td rowspan="4">1</td>
                                    @for ($i = 0; $i <= 19; $i++)
                                        <td>{{ $i }}</td>
                                    @endfor
                                    <td rowspan="4">80</td>
                                </tr>
                                <tr>
                                    @for ($i = 20; $i <= 39; $i++)
                                        <td>{{ $i }}</td>
                                    @endfor
                                </tr>
                                <tr>
                                    @for ($i = 40; $i <= 59; $i++)
                                        <td>{{ $i }}</td>
                                    @endfor
                                </tr>
                                <tr>
                                    @for ($i = 60; $i <= 79; $i++)
                                        <td>{{ $i }}</td>
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach --}}
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

@extends('layouts.admin.master')
@push('css')
    {{-- css here --}}
@endpush

@section('content')
    <div class="title">
        Konfigurasi
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Monthly Sales</h4>
                    </div>
                    <div class="card-body">
                        <div style="height: 100vh;"></div>
                        {{-- <canvas id="myChart" height="642" width="1388"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- js here --}}
@endpush
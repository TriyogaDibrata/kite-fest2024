@extends('layouts.admin.master')
@push('css')
    {{-- css here --}}
    <link href="{{ asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="p-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('recaps.index') }}">Daftar Rekapitulasi</a></li>
            <li class="breadcrumb-item">Detail</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> {{ 'Rekapitulasi Nilai Kategori ' . $recap->category->name}} </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" scope="col" class="text-center">Ranking</th>
                                    <th rowspan="2" scope="col">Nama Peserta</th>
                                    <th rowspan="2" scope="col">Nomor Peserta</th>
                                    <th colspan="3" class="text-center">Nilai</th>
                                    <th rowspan="2">Photo</th>
                                    <th rowspan="2" scope="col" class="text-center">Total</th>
                                </tr>
                                <tr>
                                    <th scope="col" class="text-center">1</th>
                                    <th scope="col" class="text-center">2</th>
                                    <th scope="col" class="text-center">3</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ( $recap_details as $recap_detail)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $recap_detail->participant->name }}</td>
                                    <td>{{ explode('-', $recap_detail->participant->chest_no)[1] }}</td>
                                    <td class="text-center">{{ $recap_detail->score_1 }}</td>
                                    <td class="text-center">{{ $recap_detail->score_2 }}</td>
                                    <td class="text-center">{{ $recap_detail->score_3 }}</td>
                                    <td class="text-center">
                                        <img style="width: 100px; height: 100px; object-fit: cover;" src="{{ $recap_detail->photo->fullpath }}" />
                                    </td>
                                    <td class="text-center">{{ $recap_detail->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- js here --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/message.js') }}"></script>
    <script src="{{ asset('assets/js/custom/participant-preview.js') }}"></script>
@endpush

@extends('layouts.admin.master')
@push('css')
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- <div class="title">
        Users
    </div> --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="p-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Konfigurasi</li>
            <li class="breadcrumb-item"><a href="{{ route('flights.index') }}">Serie Terbang</a></li>
            <li class="breadcrumb-item">Create</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Role Form</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('flights.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="serie">Serie Terbang<span class="text-danger">*</span></label>
                                    <input type="text" name="serie" id="serie" class="form-control @error('serie') is-invalid @enderror" placeholder="Serie Terbang">
                                    @error('serie')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="session">Sesi Terbang<span class="text-danger">*</span></label>
                                    <input type="number" name="session" id="session" class="form-control @error('session') is-invalid @enderror" placeholder="Sesi Terbang">
                                    @error('session')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="category_id">Kategori Layangan<span class="text-danger">*</span></label>
                                    <select name="category_id" id="categories" class="form-control @error('category_id') is-invalid @enderror" placeholder="Select Category">
                                        @foreach ($categories as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="limit">Jumlah Maks. Peserta<span class="text-danger">*</span></label>
                                    <input type="number" name="limit" id="limit" class="form-control @error('limit') is-invalid @enderror" placeholder="Jumlah Maksimum">
                                    @error('limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mb-3 col-md-4">
                                    <label class="form-label" for="date">Tanggal<span class="text-danger">*</span></label>
                                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label class="form-label" for="start">Jam Mulai<span class="text-danger">*</span></label>
                                    <input type="time" name="start" id="start" class="form-control @error('start') is-invalid @enderror" placeholder="">
                                    @error('start')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label class="form-label" for="end">Jam Berakhir<span class="text-danger">*</span></label>
                                    <input type="time" name="end" id="end" class="form-control @error('end') is-invalid @enderror" placeholder="">
                                    @error('end')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse gap-4">
                                <button type="submit" class="btn mb-2 btn-success">Submit</button>
                                <a href="{{ route('flights.index')}}" type="button" class="btn mb-2 icon-left btn-light">
                                    <i class="ti-arrow-left"></i>
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- js here --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#categories').select2({
                placeholder : 'Pilih Access',
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush

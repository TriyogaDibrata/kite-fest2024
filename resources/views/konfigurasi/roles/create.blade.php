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
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
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
                        <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="permissions">Akses<span class="text-danger">*</span></label>
                                <select name="permissions[]" id="permissions" class="form-control @error('permissions') is-invalid @enderror" placeholder="Select permissions" multiple>
                                    @foreach ($permissions as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex flex-row-reverse gap-4">
                                <button type="submit" class="btn mb-2 btn-success">Submit</button>
                                <a href="{{ route('roles.index')}}" type="button" class="btn mb-2 icon-left btn-light">
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
            $('#permissions').select2({
                placeholder : 'Pilih Access',
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush

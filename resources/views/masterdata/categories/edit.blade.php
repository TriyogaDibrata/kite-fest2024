@extends('layouts.admin.master')
@push('css')
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="p-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Masterdata</li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></li>
            <li class="breadcrumb-item">Create</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Category Form</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Nama Kategori<span class="text-danger">*</span></label>
                                <input value="{{ old('name') ?? $category->name }}"  type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Kategori Layangan">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="price">Biaya Pendaftaran<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input value="{{ old('price') ?? $category->price }}"  type="price" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Biaya Pendaftaran">
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="chest_no_prefix">Prefix No. Dada<span class="text-danger">*</span></label>
                                <input value="{{ old('chest_no_prefix') ?? $category->chest_no_prefix }}" type="text" name="chest_no_prefix" id="chest_no_prefix" class="form-control @error('chest_no_prefix') is-invalid @enderror" placeholder="contoh: 1000">
                                @error('chest_no_prefix')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="chest_no_digits">Jumlah Digit No. Dada<span class="text-danger">*</span></label>
                                <input value="{{ old('chest_no_digits') ?? $category->chest_no_digits }}" type="number" name="chest_no_digits" id="chest_no_digits" class="form-control @error('chest_no_digits') is-invalid @enderror" placeholder="Jumlah angka pada nomor dada layangan">
                                @error('chest_no_digits')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex flex-row-reverse gap-4">
                                <button type="submit" class="btn mb-2 btn-success">Submit</button>
                                <a href="{{ route('categories.index')}}" type="button" class="btn mb-2 icon-left btn-light">
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
            $('#role').select2({
                placeholder : 'Pilih Access',
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush

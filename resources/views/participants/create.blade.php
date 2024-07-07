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
            <li class="breadcrumb-item"><a href="{{ route('participants.index') }}">Peserta</a></li>
            <li class="breadcrumb-item">Create</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Participant Form</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" class="form" action="{{ route('participants.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Nama Sekaha Pelayang<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="address">Alamat<span class="text-danger">*</span></label>
                                <textarea type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat"></textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="phone">No. Hp<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="ex: 08x xxx xxx xxx">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="category_id">Kategori Layangan<span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" placeholder="Select Category" data-control="select2"></select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3" id="flight_select">
                                <label class="form-label" for="flight_id">Serie Terbang<span class="text-danger">*</span></label>
                                <select name="flight_id" id="flight_id" class="form-control @error('flight_id') is-invalid @enderror" placeholder="Select Category" data-control="select2"></select>
                                @error('flight_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="chest_no">No. Peserta<span class="text-danger">*</span></label>
                                <input type="string" name="chest_no" id="chest_no" class="form-control @error('chest_no') is-invalid @enderror" placeholder="Nomor Peserta">
                                @error('chest_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex flex-row-reverse gap-4">
                                <button type="submit" class="btn mb-2 btn-success">Submit</button>
                                <a href="{{ route('participants.index')}}" type="button" class="btn mb-2 icon-left btn-light">
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
            $('#category_id').select2({
                placeholder : 'Pilih Kategori',
                theme: 'bootstrap-5',
                allowClear : true
            });
            $('#flight_id').select2({
                placeholder : 'Pilih Serie Terbang',
                theme: 'bootstrap-5',
                allowClear: true
            });
            // $('#note').val(score.note);
            getCategory();
            getFlight(1);

            let test = $('#category_id').value;
            console.log(test);

            $('#category_id').on('change', function(ev) {
                $('#flight_id').empty();
                getFlight(ev.target.value);
            });
        })

        function getCategory() {
            $.ajax({
                url: "{{ route('ref.category_list')}}",
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    if(res) {
                        res.forEach(el => {
                            let option ="<option value="+el.id+">"+el.text+"</option>";
                            $('#category_id').append(option);
                        });
                    }
                }
            })
        }

        function getFlight(id) {
            $.ajax({
                url: "{{ route('ref.flight_list')}}",
                type: "GET",
                dataType: 'json',
                data : {
                    category_id : id
                },
                success: function(res) {
                    if(res && res.length > 0) {
                        $('#flight_id').find('option').empty();
                        res.forEach(el => {
                            let option = "<option value="+el.id+">"+el.text+"</option>";
                            
                            $('#flight_id').append(option);
                        });
                    }
                }
            })
        }
    </script>
@endpush

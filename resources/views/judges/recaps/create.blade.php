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
            <li class="breadcrumb-item"><a href="{{ route('recaps.index') }}">Daftar Rekapitulasi</a></li>
            <li class="breadcrumb-item">Create</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Rekapitulasi Nilai</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('recaps.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label class="form-label" for="category_id">Kategori Layangan<span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" placeholder="Select Category" data-control="select2"></select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="desc">Keterangan<span class="text-danger">*</span></label>
                                <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="Keterangan" data-control="select2"></textarea>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="d-flex flex-row-reverse gap-4">
                                <button type="submit" class="btn mb-2 btn-success">Submit</button>
                                <a href="{{ route('photos.index')}}" type="button" class="btn mb-2 icon-left btn-light">
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
                theme: 'bootstrap-5'
            });
            $('#participant_id').select2({
                placeholder : 'Pilih Peserta',
                theme: 'bootstrap-5'
            });
            // $('#note').val(score.note);
            getCatNew();
            getParticipantNew(1);

            $('#category_id').on('change', function(ev) {
                $('#participant_id').empty();
                getParticipantNew(ev.target.value);
            });
        })

        function getCatNew() {
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

        function getParticipantNew(id) {
            $.ajax({
                url: "{{ route('ref.participant_list')}}",
                type: "GET",
                dataType: 'json',
                data : {
                    category_id : id
                },
                success: function(res) {
                    if(res && res.length > 0) {
                        $('#particpant_id').find('option').empty();
                        res.forEach(el => {
                            let option = "<option value="+el.id+">"+el.text+"</option>";
                            
                            $('#participant_id').append(option);
                        });
                    }
                }
            })
        }
    </script>
@endpush

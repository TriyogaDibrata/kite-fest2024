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
            <li class="breadcrumb-item"><a href="{{ route('scores.index') }}">Daftar Nilai</a></li>
            <li class="breadcrumb-item">Create</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Input Nilai</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('scores.update', $score->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="form-label" for="category_id">Kategori Layangan<span class="text-danger">*</span></label>
                                <select value="{{ old('category_id') ?? $score->participant->category_id }}" name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" placeholder="Select Category" data-control="select2"></select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="participant_id">Nomor Peserta<span class="text-danger">*</span></label>
                                <select value="{{ old('participant_id') ?? $score->participant_id }}" name="participant_id" id="participant_id" class="form-control @error('participant_id') is-invalid @enderror" placeholder="Select Category" data-control="select2"></select>
                                @error('participant_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="score">Nilai<span class="text-danger">*</span></label>
                                <input type="number"  value="{{ old('score') ?? $score->score }}" name="score" id="score" class="form-control @error('score') is-invalid @enderror" placeholder="Masukan nilai">
                                @error('score')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="note">Catatan<span class="text-danger">*</span></label>
                                <textarea type="text" name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="Catatan"></textarea>
                                @error('note')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="d-flex flex-row-reverse gap-4">
                                <button type="submit" class="btn mb-2 btn-success">Submit</button>
                                <a href="{{ route('scores.index')}}" type="button" class="btn mb-2 icon-left btn-light">
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
        
        let score = {!! $score !!};
        $(document).ready(function() {
            $('#category_id').select2({
                placeholder : 'Pilih Kategori',
                theme: 'bootstrap-5'
            });
            $('#participant_id').select2({
                placeholder : 'Pilih Peserta',
                theme: 'bootstrap-5'
            });
            $('#note').val(score.note);
            getCatNew();
            getParticipantNew(score.participant.category_id);

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
                            let option = '';
                            if(score.participant.category_id === el.id) {
                                option ="<option value="+el.id+" selected>"+el.text+"</option>";
                            } else {
                                option ="<option value="+el.id+">"+el.text+"</option>";
                            }
                            
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
                            let option = '';
                            if(score.participant_id === el.id) {
                                option ="<option value="+el.id+" selected>"+el.text+"</option>";
                            } else {
                                option ="<option value="+el.id+">"+el.text+"</option>";
                            }
                            
                            $('#participant_id').append(option);
                        });
                    }
                }
            })
        }
    </script>
@endpush

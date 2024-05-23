@extends('layouts.admin.master')
@push('css')
    {{-- css here --}}
    <link href="{{ asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="p-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('participants.index') }}">Peserta</a></li>
            <li class="breadcrumb-item">Detail</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-4">
                    <h3 class="border-bottom pb-2">Detail Peserta</h3>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Nama Sekha</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label class="col-md-9">{{ $participant->name }}</label>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Alamat</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label class="col-md-9">{{ $participant->address }}</label>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">No. HP</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label class="col-md-9">{{ $participant->phone }}</label>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Kategori Lomba</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label class="col-md-9">{{ $participant->category->name }}</label>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Serie Terbang</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label
                            class="col-md-9">{{ $participant->flight->serie . $participant->flight->session . ' - ' . formattedDate($participant->flight->date) }}</label>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Nomor Peserta</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label class="col-md-9">{{ explode('-', $participant->chest_no)[1] }}</label>
                    </div>

                    <h3 class="border-bottom py-2">Pembayaran </h3>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Biaya</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label
                            class="col-md-9">{{ 'Rp. ' . Number::format($participant->category->price, null, null, 'id') }}</label>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3 font-weight-bold d-flex justify-content-between">
                            <h6 class="font-weight-bold">Status</h6>
                            <span class="d-sm-none d-md-block">:</span>
                        </div>
                        <label class="col-md-9">
                            @if ($participant->status == 1)
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum Bayar</span>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <div class="row my-2">
                        <div class="col-md-12 mb-4">
                            <h6 class="font-weight-bold">Tanggal Pendaftaran</h6>
                            <label>{{ \Carbon\Carbon::parse($participant->created_at)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY') }}</label>
                        </div>

                        <div class="col-md-12">
                            <h6 class="font-weight-bold">No. Pendaftaran</h6>
                            <label>{{ $participant->trx_number }}</label>
                        </div>
                    </div>
                </div>

                <div class="row px-4">
                    @if ($participant->status == 0 )
                    <button type="button" id="confirm-btn" data="{{ $participant }}" data-redirect="{{ route('participants.show', $participant->id)}}" data-url="{{ route('participant.confirm_payment', $participant->id) }}" class="btn mb-2 icon-left btn-outline-success col-md-12">
                        <i class="ti-check"></i>
                        Konfirmasi Pembayaran
                    </button>
                    @endif

                    @if ($participant->status == 1 )
                    <button type="button" id="cancel-btn" data="{{ $participant }}" data-redirect="{{ route('participants.show', $participant->id)}}" data-url="{{ route('participant.cancel_payment', $participant->id) }}" class="btn mb-2 icon-left btn-outline-danger col-md-12">
                        <i class="ti-close"></i>
                        Batalkan Pembayaran
                    </button>
                    @endif

                    @if ($participant->status == 1 )
                    <a href="{{ route('participant.print', $participant->id) }}" type="button" class="btn mb-2 icon-left btn-outline-primary col-md-12">
                        <i class="ti-printer"></i>
                        Cetak Bukti Pendaftaran
                    </a>
                    @endif

                    <a href="{{ route('participants.index') }}" type="button" class="btn mb-2 icon-left btn-secondary col-md-12">
                        <i class="ti-arrow-left"></i>
                        Kembali
                    </a>
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

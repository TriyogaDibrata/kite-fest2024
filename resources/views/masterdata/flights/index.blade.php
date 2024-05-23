@extends('layouts.admin.master')
@push('css')
    {{-- css here --}}
    <link href="{{ asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- <div class="title">
        Users
    </div> --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="p-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Masterdata</li>
            <li class="breadcrumb-item">Serie Terbang</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row-reverse">
                        <a href="{{ route('flights.create') }}" type="button" class="btn mb-2 icon-left btn-primary "><i class="ti-plus"></i>Tambah Serie Terbang</a>
                    </div>
                    <div class="card-body p-4">
                        <table id="flights_table" class="table dt-responsive display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Serie Terbang</th>
                                    <th>Kategori Layangan</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Terbang</th>
                                    <th>Max. Peserta</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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

    <script>
        $(document).ready(function() {
            var userDataTable = $('#flights_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('flights.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
                    { data: 'flight_series', name: 'flight_series'},
                    { data: 'category.name', name: 'category.name'},
                    { data: 'date', name: 'date'},
                    { data: 'time', name: 'time'},
                    { data: 'limit', name: 'limit'},
                    { data: 'action', name: 'action', searchable: false, orderable: false}
                ],
                pageLength: 10,
                order: [[ 0, "asc" ]],
            })
        })
    </script>
@endpush

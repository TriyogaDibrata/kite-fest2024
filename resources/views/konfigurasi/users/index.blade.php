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
            <li class="breadcrumb-item">Konfigurasi</li>
            <li class="breadcrumb-item">Users</li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row-reverse">
                        <a href="{{ route('users.create') }}" type="button" class="btn mb-2 icon-left btn-primary "><i class="ti-plus"></i>Tambah User</a>
                    </div>
                    <div class="card-body p-4">
                        <table id="users_table" class="table dt-responsive display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
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
            var userDataTable = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email'},
                    { data: 'role', name: 'role', searchable: true, orderable: false },
                    { data: 'action', name: 'action', searchable: false, orderable: false}
                ],
                pageLength: 10,
                order: [[ 0, "asc" ]],
                columnDefs: [
                    {className: "dt-center", targets: 0},
                    {className: "dt-center", targets: 3},
                    {className: "dt-center", targets: 4},
                ],
            })
        })
    </script>
@endpush

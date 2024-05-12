{{-- <a href="#" class="btn btn-sm btn-secondary btn-active-light-primary" data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-end">Actions
    <span class="svg-icon svg-icon-5 m-0">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                fill="currentColor" />
        </svg>
    </span>
</a>
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4 enable-kt-menu"
    data-kt-menu="true">
    @if(isset($custom))
    @if ($custom == 'create-cash')
    <div class="menu-item px-3">
        <a href="{{ $custom_url }}" title='Buat Kas "{{ $data_name }}" ?' method="GET" data-url="{{ $redirect_url }}" class="menu-link px-3 btn-confirm">Buat Pengelolaan Kas</a>
    </div>
    @endif
    @if ($custom == 'cancel-cash-cout')
    <div class="menu-item px-3">
        <a href="{{ $custom_url }}" title='Batalkan Transaksi dengan Kode : "{{ $data_name }}" ?' method="DELETE" data-url="{{ $redirect_url }}" class="menu-link px-3 btn-confirm">Batalkan</a>
    </div>
    @endif
    @if ($custom == 'review')
    <div class="menu-item px-3">
        <a href="{{ $custom_url }}" title='Preview "{{ $data_name }}" ?' method="GET"  class="menu-link px-3">Preview</a>
    </div>
    @endif
    @endif
    @if(isset($edit_url))
    <div class="menu-item px-3">
        <a href="{{ $edit_url }}" class="menu-link px-3">Edit</a>
    </div>
    @endif
    @if(isset($delete_url))
    <div class="menu-item px-3">
        <a href="{{ $delete_url }}" title='Hapus data "{{ $data_name }}" ?' method="DELETE" data-url="{{ $redirect_url }}" class="menu-link px-3 btn-confirm">Delete</a>
    </div>
    @endif
    @if (isset($review_url))
    <div class="menu-item px-3">
        <a href="{{ $review_url }}" title='Preview "{{ $data_name }}" ?' method="GET"  class="menu-link px-3" target="_blank">Preview</a>
    </div>
    @endif
</div> --}}
<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Actions
    </button>
    <ul class="dropdown-menu">
        @if(isset($edit_url))
            <li>
                <a class="dropdown-item" href="{{ $edit_url }}">Edit</a>
            </li>
        @endif

        @if(isset($delete_url))
            <li>
                <a href="{{ $delete_url }}" title='Hapus data "{{ $data_name }}" ?' method="DELETE" data-url="{{ $redirect_url }}" class="dropdown-item btn-confirm-delete">Delete</a>
            </li>
        @endif
      
      {{-- <li><a class="dropdown-item" href="#">Delete</a></li> --}}
      {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
    </ul>
  </div>
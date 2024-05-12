"use strict";

$('.card-body').on('click', '.btn-confirm-delete', function (e) {
    e.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        redirect = me.attr('data-url'),
        title = me.attr('title'),
        method = me.attr('method'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    Swal.fire({
        title: title,
        icon: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger mx-2",
            cancelButton: "btn fw-bold btn-light mx-2"
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_method': method,
                    '_token': csrf_token
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data Berhasil Dihapus!',
                        icon: 'success'
                    }).then(() => window.location.href = redirect );
                    
                },
                error: function (xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Something Worng!',
                        icon: 'error'
                    });
                }
            });
        }
    })
});
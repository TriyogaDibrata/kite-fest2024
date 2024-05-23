"use strict";

$('#confirm-btn').click(function(e) {
    e.preventDefault();
    var me = $(this);
    var data = JSON.parse(me.attr('data'));
    var data_url = me.attr('data-url');
    var data_redirect = me.attr('data-redirect');
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    Swal.fire({
        title: "Konfirmasi Pembayaran ?",
        icon: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger mx-2",
            cancelButton: "btn fw-bold btn-light mx-2"
        }
    }).then((res) => {
        if(res.value) {
            $.ajax({
                url: data_url,
                type: 'POST',
                data: {
                    '_method': 'POST',
                    '_token': csrf_token
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Permbayaran Berhasil Dikonfirmasi!',
                        icon: 'success'
                    }).then(() => window.location.href = data_redirect );
                    
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
})

$('#cancel-btn').click(function(e) {
    e.preventDefault();
    var me = $(this);
    var data = JSON.parse(me.attr('data'));
    var data_url = me.attr('data-url');
    var data_redirect = me.attr('data-redirect');
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    Swal.fire({
        title: "Batalkan Pembayaran ?",
        icon: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger mx-2",
            cancelButton: "btn fw-bold btn-light mx-2"
        }
    }).then((res) => {
        if(res.value) {
            $.ajax({
                url: data_url,
                type: 'POST',
                data: {
                    '_method': 'POST',
                    '_token': csrf_token
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Permbayaran Berhasil Dibatalkan!',
                        icon: 'success'
                    }).then(() => window.location.href = data_redirect );
                    
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
})
// Defaults
var swalInit = swal.mixin({
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-light'
});

$(document).ready(function () {

    $('table').on('click', '.delete', function (e) {
        e.preventDefault();
        var action = $(this).attr('href');

        // console.log(action);
        // var master = $(this).data('master');
        // var file = $(this).data('file');

        swalInit({
            title: 'Apakah Anda Yakin?',
            text: `Ingin Menghapus`,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batalkan!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                window.location = action;
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swalInit(
                    'Batalkan',
                    `Dibatalkan`,
                    'error'
                );
            }
        });
    });


    $(document).on('click', '#btn-submit', function (e) {
        e.preventDefault();
        let form = $(this).parents('form');
        Swal.fire({
            title: "Confrimation!",
            text: "Apakah anda sudah yakin jawabannya!",
            type: "info",
            allowEscapeKey: false,
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }).then((isConfirm) => {
            if (isConfirm.value === true) {
                document.getElementById("simpan").submit();
                return true;
            }
            return false;
        });
    });


    var data = $('.success').data('simpan');
    if (data) {
        swalInit({
            title: 'Berhasil',
            text: `Berhasil ${data}`,
            type: 'success'
        });
    }

    var alert = $('.alert-validation').data('alert');
    // console.log(alert);
    if (alert) {
        $('.alert-validation').html(`
        <div class="alert alert-success border-0 alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
									<span class="font-weight-semibold">${alert}</span> Selamat akun anda telah terdaftar, Silahkan Login untuk melanjutkan.
</div>
        `);
    }


    var data = $('.error').data('error');
    if (data) {
        swalInit({
            title: 'Berhasil!',
            text: `Berhasil`,
            type: 'success'
        });
    }


});

var tableItrs;
var tableTicketOpen;
var tableTicketProses;
$(document).ready(function () {
    tableItrs = $('#tableItrs').DataTable({
        "ajax": {
            "url": '/itrs/read',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "scrollY": 300,
        "scroller": true,
        // "dom": 'Bfrtip',
        // "buttons": [
        //     'pageLength',
        //     'excel',
        //     'print',
        // ]
    });

});

function reloadItrs() {
    tableItrs.ajax.reload();
}

function addItrs() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formItrs')[0].reset();
    $('#modalItrs').modal('show');
    $('#tanggal').attr('hidden', false);
    $('#masalah').attr('hidden', false);
    $('#penyelesaian').attr('hidden', false);
    $('#plant').attr('hidden', false);
    $('#id_departemen').attr('hidden', false);
    $('#frekuensi').attr('hidden', false);
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Itrs');
    $('#submit').text('Simpan');
}

function detailItrs(id_itrs) {
    $.ajax({
        url: '/itrs/detail/' + id_itrs,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_itrs"]').val(data.id_itrs).attr('disabled', true);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', true);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', true);
            $('[name="plant"]').val(data.plant).attr('disabled', true);
            $('[name="masalah"]').val(data.masalah).attr('disabled', true);
            $('[name="penyelesaian"]').val(data.penyelesaian).attr('disabled', true);
            $('[name="itrs_status"]').val(data.itrs_status).attr('disabled', true);
            $('[name="frekuensi"]').val(data.frekuensi).attr('disabled', true);
            $('.help-block').text('');

            $('#modalItrs').modal('show');
            $('#tanggal').attr('hidden', false);
            $('#masalah').attr('hidden', false);
            $('#penyelesaian').attr('hidden', false);
            $('#plant').attr('hidden', false);
            $('#id_departemen').attr('hidden', false);
            $('#frekuensi').attr('hidden', false);
            $('.modal-title').text('Detail Data Itrs');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editItrsStatus(id_itrs) {
    method = 'update';
    $.ajax({
        url: '/itrs/edit/' + id_itrs,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_itrs"]').val(data.id_itrs).attr('disabled', false);
            $('[name="id_user"]').val(data.id_user).attr('disabled', false);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
            $('[name="id_kategori_itrs"]').val(data.id_kategori_itrs).attr('disabled', false);
            $('[name="purpose"]').val(data.purpose).attr('disabled', false);
            $('[name="itrs_status"]').val(data.itrs_status).attr('disabled', false);
            $('[name="approve_mgr"]').val(data.approve_mgr).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalItrs').modal('show');
            $('#tanggal').attr('hidden', true);
            $('#masalah').attr('hidden', true);
            $('#penyelesaian').attr('hidden', true);
            $('#plant').attr('hidden', true);
            $('#id_departemen').attr('hidden', true);
            $('.modal-title').text('Form Edit Data Itrs');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editApproveMgr(id_itrs) {
    method = 'update';
    $.ajax({
        url: '/itrs/edit/' + id_itrs,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_itrs"]').val(data.id_itrs).attr('disabled', false);
            $('[name="id_user"]').val(data.id_user).attr('disabled', false);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
            $('[name="id_kategori_itrs"]').val(data.id_kategori_itrs).attr('disabled', false);
            $('[name="purpose"]').val(data.purpose).attr('disabled', false);
            $('[name="itrs_status"]').val(data.itrs_status).attr('disabled', false);
            $('[name="approve_mgr"]').val(data.approve_mgr).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalItrs').modal('show');
            $('#tanggal').attr('hidden', true);
            $('#id_kategori_itrs').attr('hidden', true);
            $('#purpose').attr('hidden', true);
            $('#plant').attr('hidden', true);
            $('#id_departemen').attr('hidden', true);
            $('.modal-title').text('Form Edit Data Itrs');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editItrs(id_itrs) {
    method = 'update';
    $.ajax({
        url: '/itrs/edit/' + id_itrs,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_itrs"]').val(data.id_itrs).attr('disabled', false);
            $('[name="id_user"]').val(data.id_user).attr('disabled', false);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
            $('[name="id_kategori_itrs"]').val(data.id_kategori_itrs).attr('disabled', false);
            $('[name="purpose"]').val(data.purpose).attr('disabled', false);
            $('[name="itrs_status"]').val(data.itrs_status).attr('disabled', false);
            $('[name="approve_mgr"]').val(data.approve_mgr).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalItrs').modal('show');
            $('#tanggal').attr('hidden', false);
            $('#masalah').attr('hidden', false);
            $('#penyelesaian').attr('hidden', false);
            $('#plant').attr('hidden', false);
            $('#id_departemen').attr('hidden', false);
            $('.modal-title').text('Form Edit Data Itrs');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteItrs(id_itrs) {
    Swal.fire({
        title: 'Hapus Data?',
        text: "Anda yakin ingin menghapus Data ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/itrs/delete/' + id_itrs,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadItrs();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveItrs() {
    if (method == 'save') {
        url = '/itrs/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/itrs/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formItrs')[0]),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submit').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            if (data.status) {
                Swal.fire({
                    title: 'Berhasil',
                    text: $text,
                    icon: 'success',
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000
                });
                reloadItrs();

                $('.help-block').empty();
                $('#modalItrs').modal('hide');
                $('#formItrs')[0].reset();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    $('#submit').text('Simpan');
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}
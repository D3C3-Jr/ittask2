var tableLisensi;
$(document).ready(function () {
    tableLisensi = $('#tableLisensi').DataTable({
        "ajax": {
            "url": '/lisensi/read',
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

function reloadLisensi() {
    tableLisensi.ajax.reload();
}

function addLisensi() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formLisensi')[0].reset();
    $('#modalLisensi').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Lisensi');
    $('#submit').text('Simpan');
}

function detailLisensi(id_lisensi) {
    $.ajax({
        url: '/lisensi/detail/' + id_lisensi,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_lisensi"]').val(data.id_lisensi).attr('disabled', true);
            $('[name="kode_lisensi"]').val(data.kode_lisensi).attr('disabled', true);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', true);
            $('[name="product_key"]').val(data.product_key).attr('disabled', true);
            $('[name="jenis"]').val(data.jenis).attr('disabled', true);
            $('[name="valid_until"]').val(data.valid_until).attr('disabled', true);
            $('[name="status"]').val(data.status).attr('disabled', true);
            $('.help-block').text('');

            $('#modalLisensi').modal('show');
            $('.modal-title').text('Detail Data Lisensi');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editLisensi(id_lisensi) {
    method = 'update';
    $.ajax({
        url: '/lisensi/edit/' + id_lisensi,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_lisensi"]').val(data.id_lisensi).attr('disabled', false);
            $('[name="kode_lisensi"]').val(data.kode_lisensi).attr('disabled', false);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', false);
            $('[name="product_key"]').val(data.product_key).attr('disabled', false);
            $('[name="jenis"]').val(data.jenis).attr('disabled', false);
            $('[name="valid_until"]').val(data.valid_until).attr('disabled', false);
            $('[name="status"]').val(data.status).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalLisensi').modal('show');
            $('.modal-title').text('Form Edit Data Lisensi');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteLisensi(id_lisensi) {
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
                url: '/lisensi/delete/' + id_lisensi,
                type: "DELETE",
                dataType: "json",
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
                        reloadLisensi();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveLisensi() {
    if (method == 'save') {
        url = '/lisensi/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/lisensi/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formLisensi')[0]),
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
                reloadLisensi();

                $('.help-block').empty();
                $('#modalLisensi').modal('hide');
                $('#formLisensi')[0].reset();
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
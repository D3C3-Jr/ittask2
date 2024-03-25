var tableKategoriItrs;
$(document).ready(function () {
    tableKategoriItrs = $('#tableKategoriItrs').DataTable({
        "ajax": {
            "url": '/kategori_itrs/read',
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

function reloadKategoriItrs() {
    tableKategoriItrs.ajax.reload();
}

function addKategoriItrs() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formKategoriItrs')[0].reset();
    $('#modalKategoriItrs').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.start').text('Gunakan Titik untuk Menit');
    $('.end').text('Gunakan Titik untuk Menit');
    $('.modal-title').text('Form Tambah Data KategoriItrs');
    $('#submit').text('Simpan');
}

function detailKategoriItrs(id_kategori_itrs) {
    $.ajax({
        url: '/kategori_itrs/detail/' + id_kategori_itrs,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_kategori_itrs"]').val(data.id_kategori_itrs).attr('disabled', true);
            $('[name="kode_kategori_itrs"]').val(data.kode_kategori_itrs).attr('disabled', true);
            $('[name="nama_kategori_itrs"]').val(data.nama_kategori_itrs).attr('disabled', true);
            $('.help-block').text('');

            $('#modalKategoriItrs').modal('show');
            $('.modal-title').text('Detail Data KategoriItrs');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editKategoriItrs(id_kategori_itrs) {
    method = 'update';
    $.ajax({
        url: '/kategori_itrs/edit/' + id_kategori_itrs,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_kategori_itrs"]').val(data.id_kategori_itrs).attr('disabled', false);
            $('[name="kode_kategori_itrs"]').val(data.kode_kategori_itrs).attr('disabled', false);
            $('[name="nama_kategori_itrs"]').val(data.nama_kategori_itrs).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalKategoriItrs').modal('show');
            $('.modal-title').text('Form Edit Data KategoriItrs');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteKategoriItrs(id_kategori_itrs) {
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
                url: '/kategori_itrs/delete/' + id_kategori_itrs,
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
                        reloadKategoriItrs();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveKategoriItrs() {
    if (method == 'save') {
        url = '/kategori_itrs/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/kategori_itrs/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formKategoriItrs')[0]),
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
                reloadKategoriItrs();

                $('.help-block').empty();
                $('#modalKategoriItrs').modal('hide');
                $('#formKategoriItrs')[0].reset();
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
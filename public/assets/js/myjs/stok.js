var tableStok;
$(document).ready(function () {
    tableStok = $('#tableStok').DataTable({
        "ajax": {
            "url": '/stok/read',
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

function reloadStok() {
    tableStok.ajax.reload();
}

function addStok() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formStok')[0].reset();
    $('#modalStok').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Stok');
    $('#submit').text('Simpan');
}

function detailStok(id_stok) {
    $.ajax({
        url: '/stok/detail/' + id_stok,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_stok"]').val(data.id_stok).attr('disabled', true);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', true);
            $('[name="kode_barang"]').val(data.kode_barang).attr('disabled', true);
            $('[name="nama_barang"]').val(data.nama_barang).attr('disabled', true);
            $('[name="jenis_barang"]').val(data.jenis_barang).attr('disabled', true);
            $('[name="stok"]').val(data.stok).attr('disabled', true);
            $('[name="satuan"]').val(data.satuan).attr('disabled', true);

            $('#modalStok').modal('show');
            $('.modal-title').text('Detail Data Stok');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editStok(id_stok) {
    method = 'update';
    $.ajax({
        url: '/stok/edit/' + id_stok,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_stok"]').val(data.id_stok).attr('disabled', false);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
            $('[name="kode_barang"]').val(data.kode_barang).attr('disabled', false);
            $('[name="nama_barang"]').val(data.nama_barang).attr('disabled', false);
            $('[name="jenis_barang"]').val(data.jenis_barang).attr('disabled', false);
            $('[name="stok"]').val(data.stok).attr('disabled', false);
            $('[name="satuan"]').val(data.satuan).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalStok').modal('show');
            $('.modal-title').text('Form Edit Data Stok');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteStok(id_stok) {
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
                url: '/stok/delete/' + id_stok,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadStok();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveStok() {
    if (method == 'save') {
        url = '/stok/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/stok/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formStok')[0]),
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
                reloadStok();

                $('.help-block').empty();
                $('#modalStok').modal('hide');
                $('#formStok')[0].reset();
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
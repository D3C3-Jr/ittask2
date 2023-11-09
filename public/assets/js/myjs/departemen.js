var tableDepartemen;
$(document).ready(function () {
    tableDepartemen = $('#tableDepartemen').DataTable({
        "ajax": {
            "url": '/departemen/read',
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

function reloadDepartemen() {
    tableDepartemen.ajax.reload();
}

function addDepartemen() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formDepartemen')[0].reset();
    $('#modalDepartemen').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.start').text('Gunakan Titik untuk Menit');
    $('.end').text('Gunakan Titik untuk Menit');
    $('.modal-title').text('Form Tambah Data Departemen');
    $('#submit').text('Simpan');
}

function detailDepartemen(id_departemen) {
    $.ajax({
        url: '/departemen/detail/' + id_departemen,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', true);
            $('[name="kode_departemen"]').val(data.kode_departemen).attr('disabled', true);
            $('[name="nama_departemen"]').val(data.nama_departemen).attr('disabled', true);
            $('.help-block').text('');

            $('#modalDepartemen').modal('show');
            $('.modal-title').text('Detail Data Departemen');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editDepartemen(id_departemen) {
    method = 'update';
    $.ajax({
        url: '/departemen/edit/' + id_departemen,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
            $('[name="kode_departemen"]').val(data.kode_departemen).attr('disabled', false);
            $('[name="nama_departemen"]').val(data.nama_departemen).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalDepartemen').modal('show');
            $('.modal-title').text('Form Edit Data Departemen');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteDepartemen(id_departemen) {
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
                url: '/departemen/delete/' + id_departemen,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadDepartemen();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveDepartemen() {
    if (method == 'save') {
        url = '/departemen/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/departemen/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formDepartemen')[0]),
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
                reloadDepartemen();

                $('.help-block').empty();
                $('#modalDepartemen').modal('hide');
                $('#formDepartemen')[0].reset();
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
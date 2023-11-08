var tableOther;
var method;
var url;
$(document).ready(function () {
    tableOther = $('#tableOther').dataTable({
        "ajax": {
            "url": '/asset/other/read',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "scrollY": 300,
        "scroller": true,
        // "responsive": true,
        // dom: 'Bfrtip',
        // buttons: [
        //     'pageLength',
        //     'excel',
        //     'print',
        // ]
    });
    // $('#close').click(function() {
    //     $('.help-block').empty();
    //     $('#form')[0].reset();
    // })
});

function reloadOther() {
    tableOther.api().ajax.reload();
}

function addOther() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formOther')[0].reset();
    $('#modalOther').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Other');
    $('#submitOther').text('Simpan');
}

function detailOther(id_other) {
    $.ajax({
        url: '/asset/other/detail/' + id_other,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_other"]').val(data.id_other).attr('disabled', true);
            $('[name="device_id"]').val(data.device_id).attr('disabled', true);
            $('[name="jenis"]').val(data.jenis).attr('disabled', true);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', true);
            $('[name="serial_number"]').val(data.serial_number).attr('disabled', true);
            $('[name="plant"]').val(data.plant).attr('disabled', true);
            $('[name="lokasi"]').val(data.lokasi).attr('disabled', true);
            $('[name="ip"]').val(data.ip).attr('disabled', true);
            $('[name="keterangan"]').val(data.keterangan).attr('disabled', true);

            $('#modalOther').modal('show');
            $('.modal-title').text('Detail Data Other');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editOther(id_other) {
    method = 'update';
    $.ajax({
        url: '/asset/other/edit/' + id_other,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_other"]').val(data.id_other).attr('disabled', false);
            $('[name="device_id"]').val(data.device_id).attr('disabled', false);
            $('[name="jenis"]').val(data.jenis).attr('disabled', false);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', false);
            $('[name="serial_number"]').val(data.serial_number).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="lokasi"]').val(data.lokasi).attr('disabled', false);
            $('[name="ip"]').val(data.ip).attr('disabled', false);
            $('[name="keterangan"]').val(data.keterangan).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalOther').modal('show');
            $('.modal-title').text('Form Edit Data Other');
            $('#submitOther').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteOther(id_other) {
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
                url: '/asset/other/delete/' + id_other,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadOther();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveOther() {
    if (method == 'save') {
        url = '/asset/other/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/asset/other/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formOther')[0]),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submitOther').html('<i class="fas fa-spinner fa-spin"></i>');
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
                reloadOther();

                $('.help-block').empty();
                $('#modalOther').modal('hide');
                $('#form')[0].reset();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    $('#submitOther').text('Simpan');
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}
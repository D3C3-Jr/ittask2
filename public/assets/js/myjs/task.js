var tableTask;
var tableTicketOpen;
var tableTicketProses;
$(document).ready(function () {
    tableTask = $('#tableTask').DataTable({
        "ajax": {
            "url": '/task/read',
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
    tableTicketOpen = $('#tableTicketOpen').DataTable({
        "ajax": {
            "url": '/task/readTicketOpen',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "searching": false,
    });
    tableTicketProses = $('#tableTicketProses').DataTable({
        "ajax": {
            "url": '/task/readTicketProses',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "searching": false,
    });

});

function reloadTask() {
    tableTask.ajax.reload();
    tableTicketOpen.ajax.reload();
    tableTicketProses.ajax.reload();
}

function addTask() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formTask')[0].reset();
    $('#modalTask').modal('show');
    $('#tanggal').attr('hidden', false);
    $('#masalah').attr('hidden', false);
    $('#penyelesaian').attr('hidden', false);
    $('#plant').attr('hidden', false);
    $('#id_departemen').attr('hidden', false);
    $('#frekuensi').attr('hidden', false);
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Task');
    $('#submit').text('Simpan');
}

function detailTask(id_task) {
    $.ajax({
        url: '/task/detail/' + id_task,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_task"]').val(data.id_task).attr('disabled', true);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', true);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', true);
            $('[name="plant"]').val(data.plant).attr('disabled', true);
            $('[name="masalah"]').val(data.masalah).attr('disabled', true);
            $('[name="penyelesaian"]').val(data.penyelesaian).attr('disabled', true);
            $('[name="status"]').val(data.status).attr('disabled', true);
            $('[name="frekuensi"]').val(data.frekuensi).attr('disabled', true);
            $('.help-block').text('');

            $('#modalTask').modal('show');
            $('#tanggal').attr('hidden', false);
            $('#masalah').attr('hidden', false);
            $('#penyelesaian').attr('hidden', false);
            $('#plant').attr('hidden', false);
            $('#id_departemen').attr('hidden', false);
            $('#frekuensi').attr('hidden', false);
            $('.modal-title').text('Detail Data Task');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editStatus(id_task) {
    method = 'update';
    $.ajax({
        url: '/task/edit/' + id_task,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_task"]').val(data.id_task).attr('disabled', false);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="masalah"]').val(data.masalah).attr('disabled', false);
            $('[name="penyelesaian"]').val(data.penyelesaian).attr('disabled', false);
            $('[name="status"]').val(data.status).attr('disabled', false);
            $('[name="frekuensi"]').val(data.frekuensi).attr('disabled', false);
            $('.start').text('Gunakan Titik untuk Menit');
            $('.end').text('Gunakan Titik untuk Menit');

            $('.modal-footer').attr('hidden', false);
            $('#modalTask').modal('show');
            $('#tanggal').attr('hidden', true);
            $('#masalah').attr('hidden', true);
            $('#penyelesaian').attr('hidden', true);
            $('#plant').attr('hidden', true);
            $('#id_departemen').attr('hidden', true);
            $('#frekuensi').attr('hidden', true);
            $('.modal-title').text('Form Edit Data Task');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editTask(id_task) {
    method = 'update';
    $.ajax({
        url: '/task/edit/' + id_task,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_task"]').val(data.id_task).attr('disabled', false);
            $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
            $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="masalah"]').val(data.masalah).attr('disabled', false);
            $('[name="penyelesaian"]').val(data.penyelesaian).attr('disabled', false);
            $('[name="status"]').val(data.status).attr('disabled', false);
            $('[name="frekuensi"]').val(data.frekuensi).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalTask').modal('show');
            $('#tanggal').attr('hidden', false);
            $('#masalah').attr('hidden', false);
            $('#penyelesaian').attr('hidden', false);
            $('#plant').attr('hidden', false);
            $('#id_departemen').attr('hidden', false);
            $('#frekuensi').attr('hidden', false);
            $('.modal-title').text('Form Edit Data Task');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteTask(id_task) {
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
                url: '/task/delete/' + id_task,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadTask();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveTask() {
    if (method == 'save') {
        url = '/task/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/task/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formTask')[0]),
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
                reloadTask();

                $('.help-block').empty();
                $('#modalTask').modal('hide');
                $('#formTask')[0].reset();
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
var tableProyektor;
var method;
var url;
$(document).ready(function () {
    tableProyektor = $('#tableProyektor').dataTable({
        "ajax": {
            "url": '/asset/proyektor/read',
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

function resetForm() {
    $('.help-block').empty();
    $('#formProyektor')[0].reset();
}

function reloadProyektor() {
    tableProyektor.api().ajax.reload();
}

function addProyektor() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#form')[0].reset();
    $('#modalProyektor').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Proyektor');
    $('#submitProyektor').text('Simpan');
}

function detailProyektor(id_proyektor) {
    $.ajax({
        url: '/asset/proyektor/detail/' + id_proyektor,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_proyektor"]').val(data.id_proyektor).attr('disabled', true);
            $('[name="device_id"]').val(data.device_id).attr('disabled', true);
            $('[name="jenis"]').val(data.jenis).attr('disabled', true);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', true);
            $('[name="serial_number"]').val(data.serial_number).attr('disabled', true);
            $('[name="plant"]').val(data.plant).attr('disabled', true);
            $('[name="lokasi"]').val(data.lokasi).attr('disabled', true);

            $('#modalProyektor').modal('show');
            $('.modal-title').text('Detail Data Proyektor');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}


function editProyektor(id_proyektor) {
    method = 'update';
    $.ajax({
        url: '/asset/proyektor/edit/' + id_proyektor,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_proyektor"]').val(data.id_proyektor).attr('disabled', false);
            $('[name="device_id"]').val(data.device_id).attr('disabled', false);
            $('[name="jenis"]').val(data.jenis).attr('disabled', false);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', false);
            $('[name="serial_number"]').val(data.serial_number).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="lokasi"]').val(data.lokasi).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalProyektor').modal('show');
            $('.modal-title').text('Form Edit Data Proyektor');
            $('#submitProyektor').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteProyektor(id_proyektor) {
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
                url: '/asset/proyektor/delete/' + id_proyektor,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadProyektor();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveProyektor() {
    if (method == 'save') {
        url = '/asset/proyektor/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/asset/proyektor/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formProyektor')[0]),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submitProyektor').html('<i class="fas fa-spinner fa-spin"></i>');
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
                reloadProyektor();

                $('.help-block').empty();
                $('#modalProyektor').modal('hide');
                $('#formProyektor')[0].reset();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    $('#submitProyektor').text('Simpan');
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}
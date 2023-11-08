var tableComputer;
var method;
var url;

$(document).ready(function () {
    tableComputer = $('#tableComputer').DataTable({
        "ajax": {
            "url": '/asset/computer/read',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "scrollY": 300,
        "scroller": true,

        // "responsive": true,
        // "dom": 'Bfrtip',
        // "buttons": [
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
    $('#form')[0].reset();
}

function reloadComputer() {
    tableComputer.ajax.reload();
}

function addComputer() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#form')[0].reset();
    $('#modalComputer').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Computer');
    $('#submit').text('Simpan');
}

function detailComputer(id_computer) {
    $.ajax({
        url: '/asset/computer/detail/' + id_computer,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_computer"]').val(data.id_computer).attr('disabled', true);
            $('[name="asset_number"]').val(data.asset_number).attr('disabled', true);
            $('[name="device_id"]').val(data.device_id).attr('disabled', true);
            $('[name="login_user"]').val(data.login_user).attr('disabled', true);
            $('[name="jenis"]').val(data.jenis).attr('disabled', true);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', true);
            $('[name="serial_number"]').val(data.serial_number).attr('disabled', true);
            $('[name="mac_address"]').val(data.mac_address).attr('disabled', true);
            $('[name="prosesor"]').val(data.prosesor).attr('disabled', true);
            $('[name="ram"]').val(data.ram).attr('disabled', true);
            $('[name="rom"]').val(data.rom).attr('disabled', true);
            $('[name="user"]').val(data.user).attr('disabled', true);
            $('[name="status"]').val(data.status).attr('disabled', true);

            $('#modalComputer').modal('show');
            $('.modal-title').text('Detail Data Computer');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editComputer(id_computer) {
    method = 'update';
    $.ajax({
        url: '/asset/computer/edit/' + id_computer,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_computer"]').val(data.id_computer).attr('disabled', false);
            $('[name="asset_number"]').val(data.asset_number).attr('disabled', false);
            $('[name="device_id"]').val(data.device_id).attr('disabled', false);
            $('[name="login_user"]').val(data.login_user).attr('disabled', false);
            $('[name="jenis"]').val(data.jenis).attr('disabled', false);
            $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', false);
            $('[name="serial_number"]').val(data.serial_number).attr('disabled', false);
            $('[name="mac_address"]').val(data.mac_address).attr('disabled', false);
            $('[name="prosesor"]').val(data.prosesor).attr('disabled', false);
            $('[name="ram"]').val(data.ram).attr('disabled', false);
            $('[name="rom"]').val(data.rom).attr('disabled', false);
            $('[name="user"]').val(data.user).attr('disabled', false);
            $('[name="status"]').val(data.status).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalComputer').modal('show');
            $('.modal-title').text('Form Edit Data Computer');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteComputer(id_computer) {
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
                url: '/asset/computer/delete/' + id_computer,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadComputer();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function saveComputer() {
    if (method == 'save') {
        url = '/asset/computer/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/asset/computer/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#form')[0]),
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
                reloadComputer();

                $('.help-block').empty();
                $('#modalComputer').modal('hide');
                $('#form')[0].reset();
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
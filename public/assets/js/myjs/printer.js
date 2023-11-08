var tablePrinter;
var method;
var url;
$(document).ready(function () {
    tablePrinter = $('#tablePrinter').dataTable({
        "ajax": {
            "url": '/asset/printer/read',
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

function reloadPrinter() {
    tablePrinter.api().ajax.reload();
}

function addPrinter() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formPrinter')[0].reset();
    $('#modalPrinter').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data Printer');
    $('#submitPrinter').text('Simpan');
}

function detailPrinter(id_printer) {
    $.ajax({
        url: '/asset/printer/detail/' + id_printer,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_printer"]').val(data.id_printer).attr('disabled', true);
            $('[name="device_id"]').val(data.device_id).attr('disabled', true);
            $('[name="jenis"]').val(data.jenis).attr('disabled', true);
            $('[name="merk"]').val(data.merk).attr('disabled', true);
            $('[name="model"]').val(data.model).attr('disabled', true);
            $('[name="mac_sn"]').val(data.mac_sn).attr('disabled', true);
            $('[name="plant"]').val(data.plant).attr('disabled', true);
            $('[name="lokasi"]').val(data.lokasi).attr('disabled', true);
            $('[name="ip_address"]').val(data.ip_address).attr('disabled', true);

            $('#modalPrinter').modal('show');
            $('.modal-title').text('Detail Data Printer');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editPrinter(id_printer) {
    method = 'update';
    $.ajax({
        url: '/asset/printer/edit/' + id_printer,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_printer"]').val(data.id_printer).attr('disabled', false);
            $('[name="device_id"]').val(data.device_id).attr('disabled', false);
            $('[name="jenis"]').val(data.jenis).attr('disabled', false);
            $('[name="merk"]').val(data.merk).attr('disabled', false);
            $('[name="model"]').val(data.model).attr('disabled', false);
            $('[name="mac_sn"]').val(data.mac_sn).attr('disabled', false);
            $('[name="plant"]').val(data.plant).attr('disabled', false);
            $('[name="lokasi"]').val(data.lokasi).attr('disabled', false);
            $('[name="ip_address"]').val(data.ip_address).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalPrinter').modal('show');
            $('.modal-title').text('Form Edit Data Printer');
            $('#submitPrinter').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deletePrinter(id_printer) {
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
                url: '/asset/printer/delete/' + id_printer,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadPrinter();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}

function savePrinter() {
    if (method == 'save') {
        url = '/asset/printer/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/asset/printer/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formPrinter')[0]),
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
                reloadPrinter();

                $('.help-block').empty();
                $('#modalPrinter').modal('hide');
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
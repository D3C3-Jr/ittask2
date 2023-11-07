<div class="tab-pane" id="printer-two" role="tabpanel" aria-labelledby="printer-tab-two">
    <form action="<?= base_url() ?>exportExcelPrinter" method="post">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadPrinter()"><i class="fas fa-sync"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addPrinter()"><i class="fas fa-plus"> </i> Tambah Data</a>
        <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
    </form>
    <table class="table-striped table-sm" id="tablePrinter" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Model</th>
                <th>MAC / SN</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalPrinter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formPrinter" enctype="multipart/form-data">
                <input type="hidden" name="id_printer" id="id_printer">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="device_id" class="col-sm-4 col-form-label">Device ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="device_id" class="form-control form-control-sm" id="device_id">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="jenis" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <input type="text" name="jenis" class="form-control form-control-sm" id="jenis">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                        <div class="col-sm-8">
                            <input type="text" name="merk" class="form-control form-control-sm" id="merk">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="model" class="col-sm-4 col-form-label">Model</label>
                        <div class="col-sm-8">
                            <input type="text" name="model" class="form-control form-control-sm" id="model">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="mac_sn" class="col-sm-4 col-form-label">MAC / SN</label>
                        <div class="col-sm-8">
                            <input type="text" name="mac_sn" class="form-control form-control-sm" id="mac_sn">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="plant" class="col-sm-4 col-form-label">Plant</label>
                        <div class="col-sm-8">
                            <select name="plant" id="plant" class="form-control form-control-sm">
                                <option disabled selected hidden>Pilih Plant</option>
                                <option value="Plant 1">Plant 1</option>
                                <option value="Plant 2">Plant 2</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-8">
                            <input type="text" name="lokasi" class="form-control form-control-sm" id="lokasi">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ip_address" class="col-sm-4 col-form-label">IP Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="ip_address" class="form-control form-control-sm" id="ip_address">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submitPrinter" class="btn btn-primary" onclick="savePrinter()"></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var tablePrinter;
    var method;
    var url;
    $(document).ready(function() {
        tablePrinter = $('#tablePrinter').dataTable({
            "ajax": {
                "url": '<?= site_url() ?>/asset/printer/read',
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
            url: '<?php site_url() ?>/asset/printer/detail/' + id_printer,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function editPrinter(id_printer) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/asset/printer/edit/' + id_printer,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
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
                    url: '<?php site_url() ?>/asset/printer/delete/' + id_printer,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadPrinter();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function savePrinter() {
        if (method == 'save') {
            url = '<?= site_url() ?>/asset/printer/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/asset/printer/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#formPrinter')[0]),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(data) {
                $('#submit').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        });
    }
</script>
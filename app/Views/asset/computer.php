<div class="tab-pane fade show active" id="computer-two" role="tabpanel" aria-labelledby="computer-tab-two">
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadComputer()"><i class="fas fa-sync"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addComputer()"><i class="fas fa-plus"> </i> Tambah Data</a>
    <a href="/pdfComputer" class="btn btn-sm btn-success my-2"><i class="fas fa-file"> </i> Laporan</a>
    <table class="table-sm table-striped" id="tableComputer" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>User ID</th>
                <th>Serial Number</th>
                <th>User</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalComputer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
                <input type="hidden" name="id_computer" id="id_computer">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="asset_number" class="col-sm-4 col-form-label">Nomor Asset</label>
                        <div class="col-sm-8">
                            <input type="text" name="asset_number" class="form-control form-control-sm" id="asset_number">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="device_id" class="col-sm-4 col-form-label">Device ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="device_id" class="form-control form-control-sm" id="device_id">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="login_user" class="col-sm-4 col-form-label">Login User</label>
                        <div class="col-sm-8">
                            <input type="text" name="login_user" class="form-control form-control-sm" id="login_user">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="jenis" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis" id="jenis" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Jenis</option>
                                <option value="Laptop">Laptop</option>
                                <option value="PC Desktop">PC Desktop</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_produk" class="form-control form-control-sm" id="nama_produk">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="serial_number" class="col-sm-4 col-form-label">Serial Number</label>
                        <div class="col-sm-8">
                            <input type="text" name="serial_number" class="form-control form-control-sm" id="serial_number">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="mac_address" class="col-sm-4 col-form-label">MAC Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="mac_address" class="form-control form-control-sm" id="mac_address">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="prosesor" class="col-sm-4 col-form-label">Prosesor</label>
                        <div class="col-sm-8">
                            <input type="text" name="prosesor" class="form-control form-control-sm" id="prosesor">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ram" class="col-sm-4 col-form-label">RAM</label>
                        <div class="col-sm-8">
                            <input type="text" name="ram" class="form-control form-control-sm" id="ram">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="rom" class="col-sm-4 col-form-label">ROM</label>
                        <div class="col-sm-8">
                            <input type="text" name="rom" class="form-control form-control-sm" id="rom">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="user" class="col-sm-4 col-form-label">User</label>
                        <div class="col-sm-8">
                            <input type="text" name="user" class="form-control form-control-sm" id="user">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option disabled selected hidden>Pilih Status</option>
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveComputer()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var tableComputer;
    var method;
    var url;

    $(document).ready(function() {
        tableComputer = $('#tableComputer').DataTable({
            "ajax": {
                "url": '<?= site_url() ?>/asset/computer/read',
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
            url: '<?php site_url() ?>/asset/computer/detail/' + id_computer,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function editComputer(id_computer) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/asset/computer/edit/' + id_computer,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
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
                    url: '<?php site_url() ?>/asset/computer/delete/' + id_computer,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadComputer();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function saveComputer() {
        if (method == 'save') {
            url = '<?= site_url() ?>/asset/computer/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/asset/computer/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#form')[0]),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(data) {
                $('#submit').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(data) {
                if (data.status) {
                    Swal.fire(
                        'Berhasil',
                        $text,
                        'success'
                    );
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        });
    }
</script>
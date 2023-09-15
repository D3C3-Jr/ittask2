<div class="tab-pane fade show active" id="computer-two" role="tabpanel" aria-labelledby="computer-tab-two">
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadComputer()"><i class="fas fa-sync"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addComputer()"><i class="fas fa-plus"> </i> Tambah Data</a>
    <table class="table table-sm" id="tableComputer">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>Jenis</th>
                <th>User ID</th>
                <th>Serial Number</th>
                <th>User</th>
                <th>Aksi</th>
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
                    <div class="row mb-3">
                        <label for="asset_number" class="col-sm-4 col-form-label">Nomor Asset</label>
                        <div class="col-sm-8">
                            <input type="text" name="asset_number" class="form-control form-control-sm" id="asset_number">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="device_id" class="col-sm-4 col-form-label">Device ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="device_id" class="form-control form-control-sm" id="device_id">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="login_user" class="col-sm-4 col-form-label">Login User</label>
                        <div class="col-sm-8">
                            <input type="text" name="login_user" class="form-control form-control-sm" id="login_user">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <input type="text" name="jenis" class="form-control form-control-sm" id="jenis">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_produk" class="form-control form-control-sm" id="nama_produk">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="serial_number" class="col-sm-4 col-form-label">Serial Number</label>
                        <div class="col-sm-8">
                            <input type="text" name="serial_number" class="form-control form-control-sm" id="serial_number">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mac_address" class="col-sm-4 col-form-label">MAC Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="mac_address" class="form-control form-control-sm" id="mac_address">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="prosesor" class="col-sm-4 col-form-label">Prosesor</label>
                        <div class="col-sm-8">
                            <input type="text" name="prosesor" class="form-control form-control-sm" id="prosesor">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ram" class="col-sm-4 col-form-label">RAM</label>
                        <div class="col-sm-8">
                            <input type="text" name="ram" class="form-control form-control-sm" id="ram">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rom" class="col-sm-4 col-form-label">ROM</label>
                        <div class="col-sm-8">
                            <input type="text" name="rom" class="form-control form-control-sm" id="rom">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="user" class="col-sm-4 col-form-label">User</label>
                        <div class="col-sm-8">
                            <input type="text" name="user" class="form-control form-control-sm" id="user">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" name="status" class="form-control form-control-sm" id="status">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveComputer()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var table;
    var method;
    var url;

    $(document).ready(function() {
        table = $('#tableComputer').dataTable({
            "ajax": {
                "url": '<?= site_url() ?>/asset/computer/read',
                "type": 'GET'
            },
            "deferRender": true,
            "responsive": true,
            "serverSide": true,
            "processing": true,
            // "scrollY": 250,
            // "scroller": true,
            // "dom": 'Bfrtip',
            // "buttons": [
            //     'pageLength',
            //     'excel',
            //     'print',
            // ]
        });
        $('#close').click(function() {
            $('.help-block').empty();
            $('#form')[0].reset();
        })
    });

    function reloadComputer() {
        table.api().ajax.reload();
    }

    function addComputer() {
        method = 'save';
        $('#form')[0].reset();
        $('#modalComputer').modal('show');
        $('.modal-title').text('Form Tambah Data Computer');
        $('#submit').text('Simpan');
    }

    function editComputer(id_computer) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/asset/computer/edit/' + id_computer,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_computer"]').val(data.id_computer);
                $('[name="asset_number"]').val(data.asset_number);
                $('[name="device_id"]').val(data.device_id);
                $('[name="login_user"]').val(data.login_user);
                $('[name="jenis"]').val(data.jenis);
                $('[name="nama_produk"]').val(data.nama_produk);
                $('[name="serial_number"]').val(data.serial_number);
                $('[name="mac_address"]').val(data.mac_address);
                $('[name="prosesor"]').val(data.prosesor);
                $('[name="ram"]').val(data.ram);
                $('[name="rom"]').val(data.rom);
                $('[name="user"]').val(data.user);
                $('[name="status"]').val(data.status);

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
            $text = 'Data berhasil di Update';
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
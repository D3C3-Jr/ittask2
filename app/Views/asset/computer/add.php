<!-- Modal -->
<div class="modal fade" id="modalAddComputer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
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
                    $('#modalAddComputer').modal('hide');
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
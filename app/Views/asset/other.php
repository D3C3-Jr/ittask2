<div class="tab-pane" id="other-two" role="tabpanel" aria-labelledby="other-tab-two">
    <form action="<?= base_url() ?>exportExcelOther" method="post">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadOther()"><i class="fas fa-sync"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addOther()"><i class="fas fa-plus"> </i> Tambah Data</a>
        <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
    </form>
    <table class="table-striped table-sm" id="tableOther" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>Jenis</th>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formOther" enctype="multipart/form-data">
                <input type="hidden" name="id_other" id="id_other">
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
                            <select name="jenis" id="jenis" class="form-control form-control-sm">
                                <option hidden selected disabled>Pilih Jenis</option>
                                <option value="Server">Server</option>
                                <option value="Pocker Wifi">Pocker Wifi</option>
                                <option value="Flashdisk">Flashdisk</option>
                                <option value="Router">Router</option>
                                <option value="Switch">Switch</option>
                                <option value="IPScan">IPScan</option>
                                <option value="Access Point">Access Point</option>
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
                        <label for="ip" class="col-sm-4 col-form-label">IP Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="ip" class="form-control form-control-sm" id="ip">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" name="keterangan" class="form-control form-control-sm" id="keterangan">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submitOther" class="btn btn-primary" onclick="saveOther()"></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var tableOther;
    var method;
    var url;
    $(document).ready(function() {
        tableOther = $('#tableOther').dataTable({
            "ajax": {
                "url": '<?= site_url() ?>/asset/other/read',
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
            url: '<?php site_url() ?>/asset/other/detail/' + id_other,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function editOther(id_other) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/asset/other/edit/' + id_other,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
            error: function(jqXHR, textStatus, errorThrown) {
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
                    url: '<?php site_url() ?>/asset/other/delete/' + id_other,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadOther();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function saveOther() {
        if (method == 'save') {
            url = '<?= site_url() ?>/asset/other/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/asset/other/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#formOther')[0]),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(data) {
                $('#submitOther').html('<i class="fas fa-spinner fa-spin"></i>');
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        });
    }
</script>
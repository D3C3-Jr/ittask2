<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Stok</h4>
                </div>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadStok()"><i class="fas fa-sync"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addStok()"><i class="fas fa-plus"> </i> Tambah Data</a>
                <table class="table-sm table-striped" id="tableStok" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formStok" enctype="multipart/form-data">
                <input type="hidden" name="id_stok" id="id_stok">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal" class="form-control form-control-sm" id="tanggal">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="kode_barang" class="col-sm-4 col-form-label">Kode Barang</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_barang" class="form-control form-control-sm" id="kode_barangh">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_barang" class="form-control form-control-sm" id="nama_barang">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="jenis_barang" class="col-sm-4 col-form-label">Jenis Barang</label>
                        <div class="col-sm-8">
                            <select name="jenis_barang" id="jenis_barang" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Jenis Barang</option>
                                <option value="Cair">Cair</option>
                                <option value="Padat">Padat</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="number" name="stok" class="form-control form-control-sm" id="stok" onchange="total()">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                        <div class="col-sm-8">
                            <input type="text" name="satuan" class="form-control form-control-sm" id="satuan">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveStok()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var tableStok;
    $(document).ready(function() {
        tableStok = $('#tableStok').DataTable({
            "ajax": {
                "url": '<?= site_url() ?>/stok/read',
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
    });

    function reloadStok() {
        tableStok.ajax.reload();
    }

    function addStok() {
        method = 'save';
        $('.modal-footer').attr('hidden', false);
        $('#formStok')[0].reset();
        $('#modalStok').modal('show');
        $('input').attr('disabled', false);
        $('select').attr('disabled', false);
        $('.modal-title').text('Form Tambah Data Stok');
        $('#submit').text('Simpan');
    }

    function detailStok(id_stok) {
        $.ajax({
            url: '<?php site_url() ?>/stok/detail/' + id_stok,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_stok"]').val(data.id_stok).attr('disabled', true);
                $('[name="tanggal"]').val(data.tanggal).attr('disabled', true);
                $('[name="kode_barang"]').val(data.kode_barang).attr('disabled', true);
                $('[name="nama_barang"]').val(data.nama_barang).attr('disabled', true);
                $('[name="jenis_barang"]').val(data.jenis_barang).attr('disabled', true);
                $('[name="stok"]').val(data.stok).attr('disabled', true);
                $('[name="satuan"]').val(data.satuan).attr('disabled', true);

                $('#modalStok').modal('show');
                $('.modal-title').text('Detail Data Stok');
                $('.modal-footer').attr('hidden', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function editStok(id_stok) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/stok/edit/' + id_stok,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_stok"]').val(data.id_stok).attr('disabled', false);
                $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
                $('[name="kode_barang"]').val(data.kode_barang).attr('disabled', false);
                $('[name="nama_barang"]').val(data.nama_barang).attr('disabled', false);
                $('[name="jenis_barang"]').val(data.jenis_barang).attr('disabled', false);
                $('[name="stok"]').val(data.stok).attr('disabled', false);
                $('[name="satuan"]').val(data.satuan).attr('disabled', false);

                $('.modal-footer').attr('hidden', false);
                $('#modalStok').modal('show');
                $('.modal-title').text('Form Edit Data Stok');
                $('#submit').text('Update');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function deleteStok(id_stok) {
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
                    url: '<?php site_url() ?>/stok/delete/' + id_stok,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadStok();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function saveStok() {
        if (method == 'save') {
            url = '<?= site_url() ?>/stok/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/stok/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#formStok')[0]),
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
                    reloadStok();

                    $('.help-block').empty();
                    $('#modalStok').modal('hide');
                    $('#formStok')[0].reset();
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

<?= $this->endSection(); ?>
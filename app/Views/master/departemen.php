<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data Departemen</h4>
                </div>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadDepartemen()"><i class="fas fa-sync"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addDepartemen()"><i class="fas fa-plus"> </i> Tambah Data</a>
                <table class="table-sm table-striped" id="tableDepartemen" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Kode Departemen</th>
                            <th>Nama Departemen</th>
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
<div class="modal fade" id="modalDepartemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formDepartemen" enctype="multipart/form-data">
                <input type="hidden" name="id_departemen" id="id_departemen">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="kode_departemen" class="col-sm-4 col-form-label">Kode Departemen</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_departemen" class="form-control form-control-sm" id="kode_departemen">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nama_departemen" class="col-sm-4 col-form-label">Nama Departemen</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_departemen" class="form-control form-control-sm" id="nama_departemen">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveDepartemen()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var tableDepartemen;
    $(document).ready(function() {
        tableDepartemen = $('#tableDepartemen').DataTable({
            "ajax": {
                "url": '<?= site_url() ?>/departemen/read',
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

    function reloadDepartemen() {
        tableDepartemen.ajax.reload();
    }

    function addDepartemen() {
        method = 'save';
        $('.modal-footer').attr('hidden', false);
        $('#formDepartemen')[0].reset();
        $('#modalDepartemen').modal('show');
        $('input').attr('disabled', false);
        $('select').attr('disabled', false);
        $('.start').text('Gunakan Titik untuk Menit');
        $('.end').text('Gunakan Titik untuk Menit');
        $('.modal-title').text('Form Tambah Data Departemen');
        $('#submit').text('Simpan');
    }

    function detailDepartemen(id_departemen) {
        $.ajax({
            url: '<?php site_url() ?>/departemen/detail/' + id_departemen,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', true);
                $('[name="kode_departemen"]').val(data.kode_departemen).attr('disabled', true);
                $('[name="nama_departemen"]').val(data.nama_departemen).attr('disabled', true);
                $('.help-block').text('');

                $('#modalDepartemen').modal('show');
                $('.modal-title').text('Detail Data Departemen');
                $('.modal-footer').attr('hidden', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function editDepartemen(id_departemen) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/departemen/edit/' + id_departemen,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
                $('[name="kode_departemen"]').val(data.kode_departemen).attr('disabled', false);
                $('[name="nama_departemen"]').val(data.nama_departemen).attr('disabled', false);

                $('.modal-footer').attr('hidden', false);
                $('#modalDepartemen').modal('show');
                $('.modal-title').text('Form Edit Data Departemen');
                $('#submit').text('Update');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function deleteDepartemen(id_departemen) {
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
                    url: '<?php site_url() ?>/departemen/delete/' + id_departemen,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadDepartemen();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function saveDepartemen() {
        if (method == 'save') {
            url = '<?= site_url() ?>/departemen/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/departemen/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#formDepartemen')[0]),
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
                    reloadDepartemen();

                    $('.help-block').empty();
                    $('#modalDepartemen').modal('hide');
                    $('#formDepartemen')[0].reset();
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
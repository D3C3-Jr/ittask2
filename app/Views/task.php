<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Job Activity IT</h4>
                </div>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadTask()"><i class="fas fa-sync"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addTask()"><i class="fas fa-plus"> </i> Tambah Data</a>
                <table class="table-sm table-striped" id="tableTask" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Departemen</th>
                            <th>Keterangan</th>
                            <th>Status</th>
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
<div class="modal fade" id="modalTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formTask" enctype="multipart/form-data">
                <input type="hidden" name="id_task" id="id_task">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal" class="form-control form-control-sm" id="tanggal">
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
                    <div class="row mb-1">
                        <label for="plant" class="col-sm-4 col-form-label">Plant</label>
                        <div class="col-sm-8">
                            <select name="plant" id="plant" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Plant</option>
                                <option value="Plant 1">Plant 1</option>
                                <option value="Plant 2">Plant 2</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="id_departemen" class="col-sm-4 col-form-label">Departemen</label>
                        <div class="col-sm-8">
                            <select name="id_departemen" id="id_departemen" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Departemen</option>
                                <?php foreach ($departemen as $data) : ?>
                                    <option value="<?= $data['id_departemen'] ?>"><?= $data['nama_departemen'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="frekuensi" class="col-sm-4 col-form-label">Frekuensi</label>
                        <div class="col-sm-8">
                            <select name="frekuensi" id="frekuensi" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Frekuensi</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Event">Event</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="start" class="col-sm-4 col-form-label">Start</label>
                        <div class="col-sm-8">
                            <input type="number" name="start" class="form-control form-control-sm" id="start" onchange="total()">
                            <small class="help-block text-danger start"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="end" class="col-sm-4 col-form-label">End</label>
                        <div class="col-sm-8">
                            <input type="number" name="end" class="form-control form-control-sm" id="end">
                            <small class="help-block text-danger end"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="total" class="col-sm-4 col-form-label">Total</label>
                        <div class="col-sm-8">
                            <input type="text" name="total" class="form-control form-control-sm" id="total" readonly>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Status</option>
                                <option value="0">Open</option>
                                <option value="1">On Proccess</option>
                                <option value="2">Done</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveTask()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var tableTask;
    $(document).ready(function() {
        tableTask = $('#tableTask').DataTable({
            "ajax": {
                "url": '<?= site_url() ?>/task/read',
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

        $('#start, #end').keyup(function() {
            var start = $('#start').val()
            var end = $('#end').val()

            var total = parseFloat(end).toFixed(2) - parseFloat(start).toFixed(2);
            $('#total').val(total.toFixed(2))
        });
    });

    function reloadTask() {
        tableTask.ajax.reload();
    }

    function addTask() {
        method = 'save';
        $('.modal-footer').attr('hidden', false);
        $('#formTask')[0].reset();
        $('#modalTask').modal('show');
        $('input').attr('disabled', false);
        $('select').attr('disabled', false);
        $('.start').text('Gunakan Titik untuk Menit');
        $('.end').text('Gunakan Titik untuk Menit');
        $('.modal-title').text('Form Tambah Data Task');
        $('#submit').text('Simpan');
    }

    function detailTask(id_task) {
        $.ajax({
            url: '<?php site_url() ?>/task/detail/' + id_task,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_task"]').val(data.id_task).attr('disabled', true);
                $('[name="tanggal"]').val(data.tanggal).attr('disabled', true);
                $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', true);
                $('[name="plant"]').val(data.plant).attr('disabled', true);
                $('[name="keterangan"]').val(data.keterangan).attr('disabled', true);
                $('[name="status"]').val(data.status).attr('disabled', true);
                $('[name="frekuensi"]').val(data.frekuensi).attr('disabled', true);
                $('[name="start"]').val(data.start).attr('disabled', true);
                $('[name="end"]').val(data.end).attr('disabled', true);
                $('[name="total"]').val(data.total).attr('disabled', true);
                $('.help-block').text('');

                $('#modalTask').modal('show');
                $('.modal-title').text('Detail Data Task');
                $('.modal-footer').attr('hidden', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function editTask(id_task) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/task/edit/' + id_task,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_task"]').val(data.id_task).attr('disabled', false);
                $('[name="tanggal"]').val(data.tanggal).attr('disabled', false);
                $('[name="id_departemen"]').val(data.id_departemen).attr('disabled', false);
                $('[name="plant"]').val(data.plant).attr('disabled', false);
                $('[name="keterangan"]').val(data.keterangan).attr('disabled', false);
                $('[name="status"]').val(data.status).attr('disabled', false);
                $('[name="frekuensi"]').val(data.frekuensi).attr('disabled', false);
                $('[name="start"]').val(data.start).attr('disabled', false);
                $('[name="end"]').val(data.end).attr('disabled', false);
                $('[name="total"]').val(data.total).attr('disabled', false);
                $('.start').text('Gunakan Titik untuk Menit');
                $('.end').text('Gunakan Titik untuk Menit');

                $('.modal-footer').attr('hidden', false);
                $('#modalTask').modal('show');
                $('.modal-title').text('Form Edit Data Task');
                $('#submit').text('Update');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function deleteTask(id_task) {
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
                    url: '<?php site_url() ?>/task/delete/' + id_task,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadTask();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function saveTask() {
        if (method == 'save') {
            url = '<?= site_url() ?>/task/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/task/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#formTask')[0]),
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
                    reloadTask();

                    $('.help-block').empty();
                    $('#modalTask').modal('hide');
                    $('#formTask')[0].reset();
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
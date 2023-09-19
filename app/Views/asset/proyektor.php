<div class="tab-pane fade show " id="proyektor-two" role="tabpanel" aria-labelledby="proyektor-tab-two">
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadProyektor()"><i class="fas fa-sync"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addProyektor()"><i class="fas fa-plus"> </i> Tambah Data</a>
    <table id="tableProyektor" class=" table-sm table-striped" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>ID</th>
                <th>Jenis</th>
                <th>Nama Produk</th>
                <th>Serial Number</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalProyektor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formProyektor" enctype="multipart/form-data">
                <input type="hidden" name="id_proyektor" id="id_proyektor">
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
                            <input type="text" name="plant" class="form-control form-control-sm" id="plant">
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
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submitProyektor" class="btn btn-primary" onclick="saveProyektor()"></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var tableProyektor;
    var method;
    var url;
    $(document).ready(function() {
        tableProyektor = $('#tableProyektor').dataTable({
            "ajax": {
                "url": '<?= site_url() ?>/asset/proyektor/read',
                "type": 'GET'
            },
            "deferRender": true,
            "serverSide": true,
            "processing": true,
            "bDestroy": true,
            "scrollY": 250,
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

    function resetForm() {
        $('.help-block').empty();
        $('#formProyektor')[0].reset();
    }

    function reloadProyektor() {
        tableProyektor.api().ajax.reload();
    }

    function addProyektor() {
        method = 'save';
        $('.modal-footer').attr('hidden', false);
        $('#form')[0].reset();
        $('#modalProyektor').modal('show');
        $('input').attr('disabled', false);
        $('select').attr('disabled', false);
        $('.modal-title').text('Form Tambah Data Proyektor');
        $('#submitProyektor').text('Simpan');
    }

    function detailProyektor(id_proyektor) {
        $.ajax({
            url: '<?php site_url() ?>/asset/proyektor/detail/' + id_proyektor,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_proyektor"]').val(data.id_proyektor).attr('disabled', true);
                $('[name="device_id"]').val(data.device_id).attr('disabled', true);
                $('[name="jenis"]').val(data.jenis).attr('disabled', true);
                $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', true);
                $('[name="serial_number"]').val(data.serial_number).attr('disabled', true);
                $('[name="plant"]').val(data.plant).attr('disabled', true);
                $('[name="lokasi"]').val(data.lokasi).attr('disabled', true);

                $('#modalProyektor').modal('show');
                $('.modal-title').text('Detail Data Proyektor');
                $('.modal-footer').attr('hidden', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }


    function editProyektor(id_proyektor) {
        method = 'update';
        $.ajax({
            url: '<?php site_url() ?>/asset/proyektor/edit/' + id_proyektor,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('[name="id_proyektor"]').val(data.id_proyektor).attr('disabled', false);
                $('[name="device_id"]').val(data.device_id).attr('disabled', false);
                $('[name="jenis"]').val(data.jenis).attr('disabled', false);
                $('[name="nama_produk"]').val(data.nama_produk).attr('disabled', false);
                $('[name="serial_number"]').val(data.serial_number).attr('disabled', false);
                $('[name="plant"]').val(data.plant).attr('disabled', false);
                $('[name="lokasi"]').val(data.lokasi).attr('disabled', false);

                $('.modal-footer').attr('hidden', false);
                $('#modalProyektor').modal('show');
                $('.modal-title').text('Form Edit Data Proyektor');
                $('#submitProyektor').text('Update');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        })
    }

    function deleteProyektor(id_proyektor) {
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
                    url: '<?php site_url() ?>/asset/proyektor/delete/' + id_proyektor,
                    type: "DELETE",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            reloadProyektor();
                        };
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error');
                    }
                });
            };
        });
    }

    function saveProyektor() {
        if (method == 'save') {
            url = '<?= site_url() ?>/asset/proyektor/save';
            $text = 'Data berhasil di Ditambah';
        } else {
            url = '<?= site_url() ?>/asset/proyektor/update';
            $text = 'Data berhasil di Update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData($('#formProyektor')[0]),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(data) {
                $('#submitProyektor').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(data) {
                if (data.status) {
                    Swal.fire(
                        'Berhasil',
                        $text,
                        'success'
                    );
                    reloadProyektor();

                    $('.help-block').empty();
                    $('#modalProyektor').modal('hide');
                    $('#formProyektor')[0].reset();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        $('#submitProyektor').text('Simpan');
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        });
    }
</script>
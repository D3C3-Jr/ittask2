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
                            <th>Plant</th>
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
                                <option value="1">IT</option>
                                <option value="2">PPIC</option>
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
                            <input type="text" name="start" class="form-control form-control-sm" id="start" onchange="total()">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="end" class="col-sm-4 col-form-label">End</label>
                        <div class="col-sm-8">
                            <input type="text" name="end" class="form-control form-control-sm" id="end">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="total" class="col-sm-4 col-form-label">Total</label>
                        <div class="col-sm-8">
                            <input type="text" name="total" class="form-control form-control-sm" id="total" readonly>
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
    $(document).ready(function() {
        $('#start, #end').keyup(function() {
            var start = $('#start').val()
            var end = $('#end').val()

            var total = parseFloat(end).toFixed(2) - parseFloat(start).toFixed(2);
            $('#total').val(total.toFixed(2))
        });
    })

    function addTask() {
        method = 'save';
        $('.modal-footer').attr('hidden', false);
        $('#formTask')[0].reset();
        $('#modalTask').modal('show');
        $('input').attr('disabled', false);
        $('select').attr('disabled', false);
        $('.modal-title').text('Form Tambah Data Task');
        $('#submit').text('Simpan');
    }
</script>

<?= $this->endSection(); ?>
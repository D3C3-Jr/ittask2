<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title"><?= (in_groups('Administrator')) ? 'IT Job Activity' : 'Ticket' ?></h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>exportExcelTask" method="post">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadTask()"><i class="fas fa-sync"></i></a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addTask()"><i class="fas fa-plus"> </i> Tambah Data</a>
                    <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
                </form>
                <table class="table-sm table-striped" id="tableTask" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Departemen</th>
                            <th>Masalah</th>
                            <th>Status</th>
                            <?php if (in_groups('Administrator')) : ?>
                                <th class="text-center">Aksi</th>
                            <?php endif; ?>
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
                <input type="hidden" name="id_user" id="id_user" value="<?= user_id() ?>">
                <div class="modal-body">
                    <div class="row mb-1" id="tanggal">
                        <label class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal" class="form-control form-control-sm" id="tanggal">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1" id="masalah">
                        <label class="col-sm-4 col-form-label">Masalah</label>
                        <div class="col-sm-8">
                            <input type="text" name="masalah" class="form-control form-control-sm" id="masalah">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <?php if (in_groups('Administrator')) : ?>
                        <div class="row mb-1" id="penyelesaian">
                            <label class="col-sm-4 col-form-label">Penyelesaian</label>
                            <div class="col-sm-8">
                                <textarea class="form-control form-control-sm" name="penyelesaian" id="penyelesaian"></textarea>
                                <small class="help-block text-danger"></small>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-1" id="plant">
                        <label class="col-sm-4 col-form-label">Plant</label>
                        <div class="col-sm-8">
                            <select name="plant" id="plant" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Plant</option>
                                <option value="Plant 1">Plant 1</option>
                                <option value="Plant 2">Plant 2</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1" id="id_departemen">
                        <label class="col-sm-4 col-form-label">Departemen</label>
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

                    <?php if (in_groups('Administrator')) : ?>
                        <div class="row mb-1" id="frekuensi">
                            <label class="col-sm-4 col-form-label">Frekuensi</label>
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
                            <label class="col-sm-4 col-form-label">Status</label>
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
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveTask()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
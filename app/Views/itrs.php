<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">ITRS</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>exportExcelItrs" method="post">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadItrs()"><i class="fas fa-sync"></i></a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addItrs()"><i class="fas fa-plus"> </i> Tambah Data</a>
                    <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
                </form>
                <table class="table-sm table-striped" id="tableItrs" width="100%" style="font-size: smaller;">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>User</th>
                            <th>Tanggal</th>
                            <th>Plant</th>
                            <th>Departemen</th>
                            <th>Kategori</th>
                            <th>Purpose</th>
                            <th>Manager</th>
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
<div class="modal fade" id="modalItrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form ITRS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formItrs" enctype="multipart/form-data">
                <input type="hidden" name="id_itrs" id="id_itrs">
                <input type="hidden" name="id_user" id="id_user" value="<?= user_id() ?>">
                <input type="hidden" name="id_departemen" id="id_departemen" value="<?= user()->id_departemen ?>">
                <div class="modal-body">
                    <div class="row mb-1" id="tanggal">
                        <label class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal" class="form-control form-control-sm" id="tanggal">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1" id="id_kategori_itrs">
                        <label class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select name="id_kategori_itrs" id="id_kategori_itrs" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Kategori</option>
                                <?php foreach ($kategoriItrs as $kategori) : ?>
                                    <option value="<?= $kategori['id_kategori_itrs'] ?>"><?= $kategori['nama_kategori_itrs'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
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
                    <div class="row mb-1" id="purpose">
                        <label class="col-sm-4 col-form-label">Purpose</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" name="purpose" id="purpose"></textarea>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                    <?php if (in_groups('Manager') || in_groups('Administrator')) : ?>
                        <div class="row mb-1">
                            <label class="col-sm-4 col-form-label">Approve Manager</label>
                            <div class="col-sm-8">
                                <select name="approve_mgr" id="approve_mgr" class="form-control form-control-sm">
                                    <option selected hidden disabled>Pilih Status</option>
                                    <option value="0">Not Approve</option>
                                    <option value="1">Approve</option>
                                </select>
                                <small class="help-block text-danger"></small>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (in_groups('Administrator')) : ?>
                        <div class="row mb-1">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select name="itrs_status" id="itrs_status" class="form-control form-control-sm">
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
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveItrs()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
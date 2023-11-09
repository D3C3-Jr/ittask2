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

<?= $this->endSection(); ?>
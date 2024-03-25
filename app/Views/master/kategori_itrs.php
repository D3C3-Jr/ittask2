<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data KategoriItrs</h4>
                </div>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadKategoriItrs()"><i class="fas fa-sync"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addKategoriItrs()"><i class="fas fa-plus"> </i> Tambah Data</a>
                <table class="table-sm table-striped" id="tableKategoriItrs" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Kode KategoriItrs</th>
                            <th>Nama KategoriItrs</th>
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
<div class="modal fade" id="modalKategoriItrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formKategoriItrs" enctype="multipart/form-data">
                <input type="hidden" name="id_kategori_itrs" id="id_kategori_itrs">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="kode_kategori_itrs" class="col-sm-4 col-form-label">Kode KategoriItrs</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_kategori_itrs" class="form-control form-control-sm" id="kode_kategori_itrs">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nama_kategori_itrs" class="col-sm-4 col-form-label">Nama KategoriItrs</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_kategori_itrs" class="form-control form-control-sm" id="nama_kategori_itrs">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveKategoriItrs()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
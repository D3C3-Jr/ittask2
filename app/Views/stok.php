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
                <form action="<?= base_url() ?>exportExcelStok" method="post">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadStok()"><i class="fas fa-sync"></i></a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addStok()"><i class="fas fa-plus"> </i> Tambah Data</a>
                    <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
                </form>
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

<?= $this->endSection(); ?>
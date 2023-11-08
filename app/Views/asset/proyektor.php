<div class="tab-pane fade show " id="proyektor-two" role="tabpanel" aria-labelledby="proyektor-tab-two">
    <form action="<?= base_url() ?>exportExcelProyektor" method="post">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadProyektor()"><i class="fas fa-sync"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addProyektor()"><i class="fas fa-plus"> </i> Tambah Data</a>
        <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
    </form>
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
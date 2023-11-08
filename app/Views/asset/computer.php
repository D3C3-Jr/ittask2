<div class="tab-pane fade show active" id="computer-two" role="tabpanel" aria-labelledby="computer-tab-two">
    <form action="<?= base_url() ?>exportExcelComputer" method="post">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadComputer()"><i class="fas fa-sync"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addComputer()"><i class="fas fa-plus"> </i> Tambah Data</a>
        <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
    </form>
    <table class="table-sm table-striped" id="tableComputer" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>User ID</th>
                <th>Serial Number</th>
                <th>User</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalComputer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
                <input type="hidden" name="id_computer" id="id_computer">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="asset_number" class="col-sm-4 col-form-label">Nomor Asset</label>
                        <div class="col-sm-8">
                            <input type="text" name="asset_number" class="form-control form-control-sm" id="asset_number">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="device_id" class="col-sm-4 col-form-label">Device ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="device_id" class="form-control form-control-sm" id="device_id">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="login_user" class="col-sm-4 col-form-label">Login User</label>
                        <div class="col-sm-8">
                            <input type="text" name="login_user" class="form-control form-control-sm" id="login_user">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="jenis" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis" id="jenis" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Jenis</option>
                                <option value="Laptop">Laptop</option>
                                <option value="PC Desktop">PC Desktop</option>
                            </select>
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
                        <label for="mac_address" class="col-sm-4 col-form-label">MAC Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="mac_address" class="form-control form-control-sm" id="mac_address">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="prosesor" class="col-sm-4 col-form-label">Prosesor</label>
                        <div class="col-sm-8">
                            <input type="text" name="prosesor" class="form-control form-control-sm" id="prosesor">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="ram" class="col-sm-4 col-form-label">RAM</label>
                        <div class="col-sm-8">
                            <input type="text" name="ram" class="form-control form-control-sm" id="ram">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="rom" class="col-sm-4 col-form-label">ROM</label>
                        <div class="col-sm-8">
                            <input type="text" name="rom" class="form-control form-control-sm" id="rom">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="user" class="col-sm-4 col-form-label">User</label>
                        <div class="col-sm-8">
                            <input type="text" name="user" class="form-control form-control-sm" id="user">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option disabled selected hidden>Pilih Status</option>
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
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
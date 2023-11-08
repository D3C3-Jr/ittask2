<div class="tab-pane" id="other-two" role="tabpanel" aria-labelledby="other-tab-two">
    <form action="<?= base_url() ?>exportExcelOther" method="post">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadOther()"><i class="fas fa-sync"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addOther()"><i class="fas fa-plus"> </i> Tambah Data</a>
        <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
    </form>
    <table class="table-striped table-sm" id="tableOther" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>Jenis</th>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formOther" enctype="multipart/form-data">
                <input type="hidden" name="id_other" id="id_other">
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
                            <select name="jenis" id="jenis" class="form-control form-control-sm">
                                <option hidden selected disabled>Pilih Jenis</option>
                                <option value="Server">Server</option>
                                <option value="Pocker Wifi">Pocker Wifi</option>
                                <option value="Flashdisk">Flashdisk</option>
                                <option value="Router">Router</option>
                                <option value="Switch">Switch</option>
                                <option value="IPScan">IPScan</option>
                                <option value="Access Point">Access Point</option>
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
                        <label for="plant" class="col-sm-4 col-form-label">Plant</label>
                        <div class="col-sm-8">
                            <select name="plant" id="plant" class="form-control form-control-sm">
                                <option disabled selected hidden>Pilih Plant</option>
                                <option value="Plant 1">Plant 1</option>
                                <option value="Plant 2">Plant 2</option>
                            </select>
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
                    <div class="row mb-1">
                        <label for="ip" class="col-sm-4 col-form-label">IP Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="ip" class="form-control form-control-sm" id="ip">
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
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submitOther" class="btn btn-primary" onclick="saveOther()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

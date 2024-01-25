<div class="tab-pane" id="printer-two" role="tabpanel" aria-labelledby="printer-tab-two">
    <form action="<?= base_url() ?>exportExcelPrinter" method="post">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadPrinter()"><i class="fas fa-sync"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addPrinter()"><i class="fas fa-plus"> </i> Tambah Data</a>
        <button class="btn btn-sm btn-primary my-2"><i class="fas fa-file-excel"> </i> Export Excel</button>
    </form>
    <table class="table-striped table-sm" id="tablePrinter" width="100%">
        <thead>
            <tr class="ligth">
                <th>No</th>
                <th>Device ID</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Model</th>
                <th>MAC / SN</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalPrinter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formPrinter" enctype="multipart/form-data">
                <input type="hidden" name="id_printer" id="id_printer">
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
                        <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                        <div class="col-sm-8">
                            <input type="text" name="merk" class="form-control form-control-sm" id="merk">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="model" class="col-sm-4 col-form-label">Model</label>
                        <div class="col-sm-8">
                            <input type="text" name="model" class="form-control form-control-sm" id="model">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="mac_sn" class="col-sm-4 col-form-label">MAC / SN</label>
                        <div class="col-sm-8">
                            <input type="text" name="mac_sn" class="form-control form-control-sm" id="mac_sn">
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
                        <label for="ip_address" class="col-sm-4 col-form-label">IP Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="ip_address" class="form-control form-control-sm" id="ip_address">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="status" class="col-sm-4 col-form-label">Plant</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option disabled selected hidden>Pilih Staus</option>
                                <option value="0">Rusak</option>
                                <option value="1">Aktif</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
                    <button type="button" id="submitPrinter" class="btn btn-primary" onclick="savePrinter()"></button>
                </div>
            </form>
        </div>
    </div>
</div>
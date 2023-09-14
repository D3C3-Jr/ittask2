<div class="tab-pane fade show" id="printer-two" role="tabpanel" aria-labelledby="printer-tab-two">
    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#addProyektor">
        Tambah Data
    </button>
    <div class="table-responsive">
        <table id="computerTable" class="table data-table table-striped">
            <thead>
                <tr class="ligth">
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>MAC / SN</th>
                    <th>Plant</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($printers as $printer) : ?>
                    <tr>
                        <td><?= $printer['device_id'] ?></td>
                        <td><?= $printer['jenis'] ?></td>
                        <td><?= $printer['merk'] ?></td>
                        <td><?= $printer['model'] ?></td>
                        <td><?= $printer['mac_sn'] ?></td>
                        <td><?= $printer['plant'] ?></td>
                        <td><?= $printer['lokasi'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
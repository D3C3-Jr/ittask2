<div class="tab-pane fade show " id="proyektor-two" role="tabpanel" aria-labelledby="proyektor-tab-two">
    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#addComputer">
        Tambah Data
    </button>
    <div class="table-responsive">
        <table id="computerTable" class="table data-table table-striped">
            <thead>
                <tr class="ligth">
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Nama Produk</th>
                    <th>Serial Number</th>
                    <th>Plant</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyektors as $proyektor) : ?>
                    <tr>
                        <td><?= $proyektor['device_id'] ?></td>
                        <td><?= $proyektor['jenis'] ?></td>
                        <td><?= $proyektor['nama_produk'] ?></td>
                        <td><?= $proyektor['serial_number'] ?></td>
                        <td><?= $proyektor['plant'] ?></td>
                        <td><?= $proyektor['lokasi'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
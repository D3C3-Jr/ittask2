<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <?php if (in_groups('Administrator')) : ?>
        <div class="col-md-4 col-lg-4">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h5>Lisensi</h5>
                        <i class="fas fa-certificate fa-2xl text-info"></i>
                    </div>
                    <h3><span class="counter"><?= $lisensi ?></span></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="card card-block card-stretch card-height">
                <div class="card-body" data-toggle="modal" data-target="#modalStock">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h5>Stok Minim</h5>
                        <i class="fas fa-cart-arrow-down fa-2xl text-info"></i>
                    </div>
                    <h3><span class="counter"><?= $stockMinimAngka ?></span></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="card card-block card-stretch card-height">
                <div class="card-body" data-toggle="modal" data-target="#modalLisensi">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h5>License Expired</h5>
                        <i class="fas fa-certificate fa-2xl text-danger"></i>
                    </div>
                    <h3><span class="counter"><?= $totalLisensiExpired ?></span></h3>
                </div>
            </div>
        </div>

        <div>
            <canvas id="myChart"></canvas>
        </div>

    <?php endif; ?>
</div>

</div>



<!-- Modal -->

<div class="modal fade" id="modalStock" tabindex="-1" role="dialog" aria-labelledby="modalStockTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Details</h5>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <th>Kode Barang</th>
                        <th class="col-sm-12">Nama Barang</th>
                        <th>Stok</th>
                    </thead>
                    <tbody>
                        <?php foreach ($stockMinimData as $stok) : ?>
                            <tr>
                                <td><?= $stok['kode_barang'] ?></td>
                                <td><?= $stok['nama_barang'] ?></td>
                                <td><span class="badge badge-danger counter"><?= $stok['stok'] ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLisensi" tabindex="-1" role="dialog" aria-labelledby="modalLisensiTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Details</h5>
            </div>
            <div class="modal-body">
                <table class="table table-striped ">
                    <thead>
                        <th class="col-sm-12">Nama Produk</th>
                        <th>Expired Date</th>
                    </thead>
                    <tbody>
                        <?php foreach ($lisensiValid as $lisensi) : ?>
                            <tr>
                                <td><?= $lisensi->nama_produk ?></td>
                                <td>
                                    <badge class="badge badge-danger"><?= $lisensi->valid_until ?></badge>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
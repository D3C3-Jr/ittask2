<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <?php if (in_groups('Administrator')) : ?>
        <div class="col-md-4 col-lg-3">
            <div class="card card-block card-stretch card-height card-">
                <div class="card-body" id="computer" data-toggle="modal" data-target="#modalComputer">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h5>Computer</h5>
                        <i class="fas fa-laptop fa-2xl text-primary"></i>
                    </div>
                    <h3 class="counter"><?= $computerTotal ?></h3>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h5>Printer</h5>
                        <i class="fas fa-print fa-2xl text-success"></i>
                    </div>
                    <h3><span class="counter"><?= $printer ?></span></h3>
                    <!-- <div class="d-flex align-items-center justify-content-between mt-1">
                    <p class="mb-0">Total Revenue</p>
                    <span class="text-success">85%</span>
                </div>
                <div class="iq-progress-bar bg-success-light mt-2">
                    <span class="bg-success iq-progress progress-1" data-percent="85"></span>
                </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h5>Proyektor</h5>
                        <i class="fas fa-video fa-2xl text-info"></i>
                    </div>
                    <h3><span class="counter"><?= $proyektor ?></span></h3>
                    <!-- <div class="d-flex align-items-center justify-content-between mt-1">
                    <p class="mb-0">Total Revenue</p>
                    <span class="text-success">85%</span>
                </div>
                <div class="iq-progress-bar bg-success-light mt-2">
                    <span class="bg-success iq-progress progress-1" data-percent="85"></span>
                </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
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
        <div class="col-md-4 col-lg-3">
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
        <div class="col-md-4 col-lg-3">
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
    <?php endif; ?>
</div>

</div>



<!-- Modal -->
<div class="modal fade" id="modalComputer" tabindex="-1" role="dialog" aria-labelledby="modalComputerTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Details</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <div id="circle-progress-21" class="circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="<?= $computerPersentaseAktif ?>" data-type="percent"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mt-3 mt-md-0">
                                                <h5 class="mb-1">Computer Active</h5>
                                                <p class="mb-0"><?= $computerAktif ?> Pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <div id="circle-progress-24" class="circle-progress-01 circle-progress circle-progress-warning" data-min-value="0" data-max-value="100" data-value="<?= $computerPersentaseSpare ?>" data-type="percent"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mt-3 mt-md-0">
                                                <h5 class="mb-1">Computer Spare</h5>
                                                <p class="mb-0"><?= $computerSpare ?> Pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                        <th>Nama Barang</th>
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
                <table class="table table-striped">
                    <thead>
                        <th>Nama Produk</th>
                        <th>Expired Date</th>
                    </thead>
                    <tbody>
                        <?php foreach ($lisensiValid as $lisensi) : ?>
                            <tr>
                                <td><?= $lisensi->nama_produk ?></td>
                                <td><badge class="badge badge-danger"><?= $lisensi->valid_until ?></badge></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
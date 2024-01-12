<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <?php if (in_groups('Administrator')) : ?>
        <div class="col-md-4 col-lg-3">
            <div class="card card-block card-stretch card-height">
                <div class="card-body" id="computer" data-toggle="modal" data-target="#exampleModalCenter">
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


    <?php endif; ?>

    <!-- <div class="col-md-6 col-lg-6">
        <div class="card  card-height">
            <div class="card-body">
                <div class="top-block d-flex align-items-center justify-content-between">
                    <h4 class="mb-2">Ticket Open</h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>Departemen</th>
                        <th>Masalah</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php foreach ($taskClose as $task) : ?>
                            <tr>
                                <td><?= $task['nama_departemen'] ?></td>
                                <td><?= $task['masalah'] ?></td>
                                <?php if ($task['status'] == '0') : ?>
                                    <td><span class="badge badge-danger">Open</span></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div class="card  card-height">
            <div class="card-body">
                <div class="top-block d-flex align-items-center justify-content-between">
                    <h4 class="mb-2">Process</h4>
                </div>
                <table class="table table-striped ">
                    <thead>
                        <th>Departemen</th>
                        <th>Masalah</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php foreach ($taskProses as $task) : ?>
                            <tr>
                                <td><?= $task['nama_departemen'] ?></td>
                                <td><?= $task['masalah'] ?></td>
                                <?php if ($task['status'] == '1') : ?>
                                    <td><span class="badge badge-warning">Process</span></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <?php if (in_groups('Administrator')) : ?>
        <div class="col-md-6 col-lg-6">
            <div class="card  card-height">
                <div class="card-body">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h4 class="mb-2">Stok Minim</h4>
                    </div>
                    <table class="table table-striped " style="width: 100%;">
                        <thead>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                        </thead>
                        <tbody>
                            <?php foreach ($stockMinim as $stok) : ?>
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

        <div class="col-md-6 col-lg-6">
            <div class="card  card-height">
                <div class="card-body">
                    <div class="top-block d-flex align-items-center justify-content-between">
                        <h4 class="mb-2">Lisensi Expired</h4>
                    </div>
                    <table class="table table-striped " style="width: 100%;">
                        <thead>
                            <th class="col-sm-6">Nama Produk</th>
                            <th class="col-sm-6">Expired Date</th>
                        </thead>
                        <tbody>
                            <?php foreach ($lisensiValid as $lisensi) : ?>
                                <tr>
                                    <td><?= $lisensi->nama_produk ?></td>
                                    <td><?= $lisensi->valid_until ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

<?= $this->endSection(); ?>
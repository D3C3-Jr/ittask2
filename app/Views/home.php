<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <div class="top-block d-flex align-items-center justify-content-between">
                    <h5>Computer</h5>
                    <i class="fas fa-laptop fa-2xl text-primary"></i>
                </div>
                <h3 class="counter"><?= $computerTotal ?></h3>
                <div class="d-flex align-items-center justify-content-between mt-1">
                    <p class="mb-0">Aktif</p>
                    <span class="text-primary counter"><b><?= $computerAktif ?></b> (<?= $computerPersentaseAktif ?>%)</span>
                </div>
                <div class="iq-progress-bar bg-primary-light mt-2">
                    <span class="bg-primary iq-progress progress-1" data-percent="<?= $computerPersentaseAktif ?>"></span>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-1">
                    <p class="mb-0">Spare</p>
                    <span class="text-primary counter"><b><?= $computerSpare ?></b> (<?= $computerPersentaseSpare ?>%)</span>
                </div>
                <div class="iq-progress-bar bg-primary-light mt-2">
                    <span class="bg-primary iq-progress progress-1" data-percent="<?= $computerPersentaseSpare ?>"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
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
    <div class="col-md-6 col-lg-3">
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



</div>

<?= $this->endSection(); ?>
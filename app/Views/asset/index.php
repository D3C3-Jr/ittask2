<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="card card-block card-stretch card-height card-">
            <div class="card-body" id="computer" data-toggle="modal" data-target="#detailComputer">
                <div class="top-block d-flex align-items-center justify-content-between">
                    <h5>Computer</h5>
                    <i class="fas fa-laptop fa-2xl text-primary"></i>
                </div>
                <h3 class="counter"><?= $computerTotal ?></h3>

            </div>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="card card-block card-stretch card-height">
            <div class="card-body" id="printer" data-toggle="modal" data-target="#detailPrinter">
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
    <div class="col-md-3 col-lg-3">
        <div class="card card-block card-stretch card-height">
            <div class="card-body" id="proyektor" data-toggle="modal" data-target="#detailProyektor">
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
    <div class="col-md-3 col-lg-3">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <div class="top-block d-flex align-items-center justify-content-between">
                    <h5>Other</h5>
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


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab-two" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="computer-tab-two" data-toggle="tab" href="#computer-two" role="tab" aria-controls="computer" aria-selected="true" onclick="reloadComputer()">computer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="printer-tab-two" data-toggle="tab" href="#printer-two" role="tab" aria-controls="printer" aria-selected="false" onclick="reloadPrinter()">printer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="proyektor-tab-two" data-toggle="tab" href="#proyektor-two" role="tab" aria-controls="proyektor" aria-selected="false" onclick="reloadProyektor()">proyektor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="other-tab-two" data-toggle="tab" href="#other-two" role="tab" aria-controls="other" aria-selected="false" onclick="reloadOther()">other</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent-1">

                    <?= $this->include('asset/computer') ?>
                    <?= $this->include('asset/printer') ?>
                    <?= $this->include('asset/proyektor') ?>
                    <?= $this->include('asset/other') ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL DETAIL -->
<div class="modal fade" id="detailComputer" tabindex="-1" role="dialog" aria-labelledby="modalComputerTitle" aria-hidden="true">
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
                                            <div id="circle-progress-20" class="circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="<?= $computerPersentaseAktif ?>" data-type="percent"></div>
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
                                            <div id="circle-progress-21" class="circle-progress-01 circle-progress circle-progress-warning" data-min-value="0" data-max-value="100" data-value="<?= $computerPersentaseSpare ?>" data-type="percent"></div>
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

<div class="modal fade" id="detailPrinter" tabindex="-1" role="dialog" aria-labelledby="modalPrinterTitle" aria-hidden="true">
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
                                            <div id="circle-progress-22" class="circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="<?= $printerPersentaseAktif ?>" data-type="percent"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mt-3 mt-md-0">
                                                <h5 class="mb-1">Printer Active</h5>
                                                <p class="mb-0"><?= $printerAktif ?> Pcs</p>
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
                                            <div id="circle-progress-23" class="circle-progress-01 circle-progress circle-progress-warning" data-min-value="0" data-max-value="100" data-value="<?= $printerPersentaseSpare ?>" data-type="percent"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mt-3 mt-md-0">
                                                <h5 class="mb-1">Printer Rusak</h5>
                                                <p class="mb-0"><?= $printerSpare ?> Pcs</p>
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

<div class="modal fade" id="detailProyektor" tabindex="-1" role="dialog" aria-labelledby="modalProyektorTitle" aria-hidden="true">
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
                                            <div id="circle-progress-24" class="circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="<?= $proyektorPersentaseAktif ?>" data-type="percent"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mt-3 mt-md-0">
                                                <h5 class="mb-1">Proyektor Active</h5>
                                                <p class="mb-0"><?= $proyektorAktif ?> Pcs</p>
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
                                            <div id="circle-progress-25" class="circle-progress-01 circle-progress circle-progress-warning" data-min-value="0" data-max-value="100" data-value="<?= $proyektorPersentaseSpare ?>" data-type="percent"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mt-3 mt-md-0">
                                                <h5 class="mb-1">Proyektor Rusak</h5>
                                                <p class="mb-0"><?= $proyektorSpare ?> Pcs</p>
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
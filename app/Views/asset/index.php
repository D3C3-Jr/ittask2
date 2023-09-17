<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

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
                        <a class="nav-link active" id="computer-tab-two" data-toggle="tab" href="#computer-two" role="tab" aria-controls="computer" aria-selected="true">computer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="printer-tab-two" data-toggle="tab" href="#printer-two" role="tab" aria-controls="printer" aria-selected="false">printer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="proyektor-tab-two" data-toggle="tab" href="#proyektor-two" role="tab" aria-controls="proyektor" aria-selected="false">proyektor</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent-1">

                    <?= $this->include('asset/computer') ?>
                    <?= $this->include('asset/printer') ?>
                    <?= $this->include('asset/proyektor/read') ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->include('asset/proyektor/add'); ?>

<?= $this->endSection(); ?>
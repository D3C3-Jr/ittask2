<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <h5 class="card-header">Asset</h5>
    <div class="card-body">
        <div class="card-title"></div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="computer-tab" data-bs-toggle="tab" data-bs-target="#computer" type="button" role="tab" aria-controls="computer" aria-selected="true">Computer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="printer-tab" data-bs-toggle="tab" data-bs-target="#printer" type="button" role="tab" aria-controls="printer" aria-selected="false">Printer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="proyektor-tab" data-bs-toggle="tab" data-bs-target="#proyektor" type="button" role="tab" aria-controls="proyektor" aria-selected="false">Proyektor</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <?= $this->include('asset/computer') ?>
            <?= $this->include('asset/printer') ?>
            <?= $this->include('asset/proyektor') ?>            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
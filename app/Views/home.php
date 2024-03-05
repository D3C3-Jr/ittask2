<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-transparent">
            <div class="card-body p-0">
                <div class="profile-image position-relative">
                    <img src="<?= base_url() ?>/assets/images/page-img/profile.png" class="img-fluid rounded w-100" alt="profile-image">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row m-sm-0 px-3">
    <div class="col-lg-12 card-profile">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="ml-3">
                        <h4 class="mb-1">SIL(IT)</h4>
                        <p class="mb-2">Sistem Layanan IT</p>
                    </div>
                </div>
                <p class="container">
                    Merupakan sistem layanan Open Ticket (Request) bagi para User, khusus nya karyawan PT. TJForge Indonesia untuk meminta berbagai permintaan kepada Departement IT perihal IT.
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
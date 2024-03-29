<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <title>SiL(IT)</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo-it.svg " />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</head>

<body>
    <!-- loader Start -->
    <!-- <div id="loading">
        <div id="loading-center">
        </div>
    </div> -->
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <?= $this->include('layout/sidebar'); ?>
        <?= $this->include('layout/navbar'); ?>
        <div class="content-page">
            <div class="container-fluid">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->


    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>©
                    </span> <a href="#" class="">Webkit</a>.
                </div>
            </div>
        </div>
    </footer>

    <!-- MyJs -->
    <script src="<?= base_url() ?>/assets/js/myjs/computer.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/printer.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/proyektor.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/other.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/task.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/stok.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/departemen.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/user.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/lisensi.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/kategori_itrs.js"></script>
    <script src="<?= base_url() ?>/assets/js/myjs/itrs.js"></script>

    <!-- Backend Bundle JavaScript -->
    <script src="<?= base_url() ?>/assets/js/backend-bundle.min.js"></script>
    <!-- app JavaScript -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>

    <script src="<?= base_url() ?>/assets/vendor/moment.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Asset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        /* @page {
                size: A4
            } */

        h2 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .table tbody {
            font-size: small;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="sheet padding-10mm">
        <!-- <img src="<?= base_url() ?>\assets\images\logo.svg" alt="" width="10%"> -->
        <h2>LAPORAN DATA ASSET <br> PT. TJFORGE INDONESIA</h2>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Asset Number</th>
                    <th>Device ID</th>
                    <th>User ID</th>
                    <th>Serial Number</th>
                    <th>User</th>
                    <th>Jenis</th>
                    <th>Nama Produk</th>
                    <th>MAC Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($computers as $computer) : ?>
                    <tr>
                        <td class="text-center" width="20"><?= $no++ ?></td>
                        <td><?= $computer['asset_number'] ?></td>
                        <td><?= $computer['device_id'] ?></td>
                        <td><?= $computer['login_user'] ?></td>
                        <td><?= $computer['serial_number'] ?></td>
                        <td><?= $computer['user'] ?></td>
                        <td><?= $computer['jenis'] ?></td>
                        <td><?= $computer['nama_produk'] ?></td>
                        <td><?= $computer['mac_address'] ?></td>
                        <?php if ($computer['status'] == '1') : ?>
                            <td>Aktif</td>
                        <?php else : ?>
                            <td style="background-color: yellow;">Spare</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th colspan="9">Total PC Aktif</th>
                    <th>108</th>
                </tr>
                <tr>
                    <th colspan="9">Total PC Spare</th>
                    <th>9</th>
                </tr>
                <tr>
                    <th colspan="9">Total PC</th>
                    <th>117</th>
                </tr>
            </tfoot> -->
        </table>
    </section>
</body>

</html>
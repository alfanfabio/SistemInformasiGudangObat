<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Gudang Obat Bitung</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jumlah Obat</h1>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>


        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Obat Keluar</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?= $i = 1; ?>
                        <?php foreach ($obat as $o) : ?>
                            <tr>
                                <td><?= $o['id']; ?></td>
                                <td><?= $o['nama']; ?></td>
                                <td><?= $o['jenis']; ?></td>
                                <td><?= $o['jumlah']; ?></td>
                                <td><?= $o['obat_keluar']; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="my-2"></div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="css/bootstrap.min.js"></script>

</body>

</html>
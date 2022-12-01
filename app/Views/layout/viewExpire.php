<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Obat Expire</h1>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Obat</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Expire</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Obat</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Expire</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?= $i = 1; ?>
                        <?php foreach ($view as $v) : ?>
                            <tr>
                                <td><?= $v['id']; ?></td>
                                <td><?= $v['nama']; ?></td>
                                <td><?= $v['jumlah_masuk']; ?></td>
                                <td><?= $v['tanggal_masuk']; ?></td>
                                <td><?= $v['tanggal_expire']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="my-2"></div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
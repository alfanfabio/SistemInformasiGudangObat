<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jumlah Obat</h1>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">DataTables Example</h6>
        </div>


        <div class="card-body">
            <a href="obat/printpdf" class="btn btn-primary">Print PDF</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Obat Keluar</th>
                            <?php if (allow('Operator')) : ?>
                                <th>#</th>
                            <?php endif; ?>
                            <?php if (allow('Operator')) : ?>
                                <th>#</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Obat Keluar</th>
                            <?php if (allow('Operator')) : ?>
                                <th>#</th>
                            <?php endif; ?>
                            <?php if (allow('Operator')) : ?>
                                <th>#</th>
                            <?php endif; ?>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?= $i = 1; ?>
                        <?php foreach ($obat as $o) : ?>
                            <tr>
                                <td><?= $o['id']; ?></td>
                                <td><?= $o['nama']; ?></td>
                                <td><?= $o['jenis']; ?></td>
                                <td><?= $o['jumlah']; ?></td>
                                <td><?= $o['obat_keluar']; ?></td>
                                <?php if (allow('Operator')) : ?>
                                    <td>
                                        <form action="/obat/<?= $o['id']; ?>" method="post" class="d-inline">
                                            <?php csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                                <?php if (allow('Operator')) : ?>
                                    <td>
                                        <a href="/obat/edit/<?= $o['id']; ?>" class="btn btn-success">Ubah</a>
                                    </td>
                                <?php endif; ?>
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
<!-- End of Main Content -->
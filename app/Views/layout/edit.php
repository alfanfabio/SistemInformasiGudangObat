<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Stok Obat</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-5">
                <form action="/obat/update/<?= $obat['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $obat['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control " id="nama" name="nama" autofocus value="<?= $obat['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Tipe Obat</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" autofocus value="<?= $obat['jenis']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Stok Obat</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" autofocus value="<?= $obat['jumlah']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="obat_keluar" class="form-label">Jumlah Obat Keluar</label>
                        <input type="text" class="form-control" id="obat_keluar" name="obat_keluar" autofocus value="<?= $obat['obat_keluar']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>
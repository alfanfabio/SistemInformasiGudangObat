<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Obat Masuk</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-5">
                <form action="/obatMasuk/update/<?= $expire['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $expire['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control " id="nama" name="nama" autofocus value="<?= $expire['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_masuk" class="form-label">Jumlah Obat Masuk/label>
                            <input type="text" class="form-control" id="jumlah_masuk" name="jumlah_masuk" autofocus value="<?= $expire['jumlah_masuk']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Obat Masuk</label>
                        <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk" autofocus value="<?= $expire['tanggal_masuk']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_expire" class="form-label">Tanggal Obat Expire</label>
                        <input type="text" class="form-control" id="tanggal_expire" name="tanggal_expire" autofocus value="<?= $expire['tanggal_expire']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>
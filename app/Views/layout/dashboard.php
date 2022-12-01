<?php 
$con = mysqli_connect("127.0.0.1","root","","user");
?>

<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

<div id="content-wrapper" class="d-flex flex-column">





    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        

    </div>
    <hr>
    <!-- Content Row -->
    <div class="row">

<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Obat</div>
                        <?php $results = mysqli_query($con, "SELECT sum(jumlah) FROM obat");
while($rows = mysqli_fetch_array($results)){?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rows['sum(jumlah)']; ?><?php } ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                            Obat Masuk</div>
                                            <?php $results = mysqli_query($con, "SELECT sum(jumlah_masuk) FROM expire");
while($rows = mysqli_fetch_array($results)){?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rows['sum(jumlah_masuk)']; ?><?php } ?></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                  
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                        <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">
                                            Obat Keluar</div>
                                            <?php $results = mysqli_query($con, "SELECT sum(obat_keluar) FROM obat");
while($rows = mysqli_fetch_array($results)){?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rows['sum(obat_keluar)']; ?><?php } ?></div>
                                    </div>
                                    </div>
                            </div>
                        </div>
    </div>


    

    <!-- Content Row -->


    <!-- /.container-fluid -->

</div>

</div>
</div>
    


<?= $this->endSection(); ?>
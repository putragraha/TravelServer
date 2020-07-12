<?php
//user
$voucher = mysqli_query($konek, "SELECT * FROM voucher");
$jlhvoucher = mysqli_num_rows($voucher);
$aksesoris = mysqli_query($konek, "SELECT * FROM aksesoris");
$jlhaksesoris = mysqli_num_rows($aksesoris);
$barang = mysqli_query($konek, "SELECT * FROM barang");
$jlhbarang = mysqli_num_rows($barang);
?>


<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <marquee direction="left" scrollamount="10" align="center"> Welcome to Neptuunia Travel. . . . .
</marquee>
          </h1>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-success">
                <i class="ion ion-card"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total voucher</h4>
                  </div>
                  <div class="card-body"><?php echo $jlhvoucher;?></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-dark">
                  <i class="ion ion-cube"></i>
                </div><div class="card-wrap">
                  <div class="card-header">
                    <h4>Total barang</h4>
                  </div>
                  <div class="card-body"><?php echo $jlhbarang;?></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-warning">
                  <i class="ion ion-headphone"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total aksesoris</h4>
                  </div>
                  <div class="card-body"><?php echo $jlhaksesoris;?></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  
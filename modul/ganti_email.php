    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else {
    die ("Error. No ID Selected! ");    
    }
    //proses ganti password
    if (isset($_POST['ganti'])) {
    $email        = $_POST['email'];
    $password_lama    = $_POST['password_lama'];
    $email_baru    = $_POST['email_baru'];
    $konf_email    = $_POST['konf_email'];
    //cek old password
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password_lama'";
    $sql = mysqli_query ($konek, $query);
    $hasil = mysqli_num_rows ($sql);
    if (! $hasil >= 1) {
        ?>
            <script>
                swal({ title: 'Alert!!',
                text: 'Password/Email lama salah!!, silahkan ulang kembali!'}).then(okay => {
                    if (okay) {
                        window.location.href = '?page=ganti_email&id=<?php echo $_GET['id'];?>';
                    }
                });
            </script> 
        <?php
    }
    //validasi data data kosong
    else if (empty($_POST['email_baru']) || empty($_POST['konf_email'])) { ?>
           <script>
                swal({ title: 'Alert!!',
                text: 'Password baru dan Konfirmasi Password Harus di isi'}).then(okay => {
                    if (okay) {
                        window.location.href = '?page=ganti_email&id=<?php echo $_GET['id'];?>';
                    }
                });
            </script>   
    <?php }
    //validasi input konfirm password
    else if (($_POST['email_baru']) != ($_POST['konf_email'])) { ?>
             <script>
                swal({ title: 'Alert!!',
                text: 'Email baru dan Konfirmasi Email Berbeda'}).then(okay => {
                    if (okay) {
                        window.location.href = '?page=ganti_email&id=<?php echo $_GET['id'];?>';
                    }
                });
            </script>
    <?php }
    else {
    //update data
    $query = "UPDATE user SET email='$email_baru' WHERE id='$id'";
    $sql = mysqli_query ($konek, $query);
    //setelah berhasil update
    if ($sql) {
        echo "<script>
                swal({ title: 'Berhasil!',
                text: 'Profil Berhasil Diubah',
                icon: 'success'}).then(okay => {
                    if (okay) {
                        window.location.href = 'logout.php';
                    }
                });
            </script>";    
    } else {
        echo "<h3><font color=red><center>Ganti Password Gagal!</center></font></h3>";    
    }
    }
    }
?>
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Edit Password</div>
            <div class="float-right">
            </div>
          </h1>
<div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Password</h4>
                  </div>
                  <div class="card-body">
                  <form class="form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email"  name="email" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="password" maxlength="20" name="password_lama" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email Baru</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" maxlength="20" name="email_baru" class="form-control" required>
                      </div>
                    </div><div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" maxlength="20" name="konf_email" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" name="ganti" class="btn btn-info">
                            <i class="ion ion-android-done-all"></i> Ubah</button>
                      </div>
                    </div>
                    </form>
                  </div>
                  </div>
              </div>
            </div>
          </div>

        </section>
      </div>
    </div>
  </div>
      <?php
$ids = $_GET[id];
      ?>
      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Profil</div>
            <div class="float-right">
            </div>
          </h1>

        <!-- Edit profil -->
       <?php
        { $query = mysqli_query($konek, "SELECT * FROM admin WHERE id = '$_GET[id]'") OR DIE(mysqli_connect_error($konek));
          $data = mysqli_fetch_assoc($query);
        ?>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit profil</h4>
                    <div class="float-right">
                    <a href="?page=ganti_password&id=<?php echo $ids;?>" class="btn btn-primary btn-sm">
                    <i class="ion-locked"></i> Ubah Password
                </a></div>
                <div class="float-right">
                    <a href="?page=ganti_email&id=<?php echo $ids;?>" class="btn btn-primary btn-sm">
                    <i class="ion-person"></i>Ubah Email
                </a></div>
                  </div>

                  <div class="card-body">
                  <form class="form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" maxlength="20" name="nama_admin" placeholder="Tidak bisa lebih dari 20 karakter....." class="form-control" value="<?php echo $data['nama_admin'];?>" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="foto" id="image-upload"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" name="ubah" class="btn btn-info">
                            <i class="ion ion-android-done-all"></i> Ubah</button>
                      </div>
                    </div>
                    </form>
                    <!-- <a href=""></a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Aksi Simpan profil -->
        <?php if(isset($_POST['ubah'])) {
            if ($_FILES['foto']['name'] == ""){
              $namafile = $data['foto'];
            } else {
              $namafile = $_FILES['foto']['name'];
            }
            mysqli_query($konek, "UPDATE admin SET
            nama_admin = '$_POST[nama_admin]',
            foto = '$namafile'
            WHERE id = '$_GET[id]'");
            move_uploaded_file($_FILES['foto']['tmp_name'], "upload/profil/".$namafile);
            echo "<script>
                swal({ title: 'Berhasil!',
                text: 'profil berhasil diubah',
                icon: 'success'}).then(okay => {
                    if (okay) {
                        window.location.href = 'admin.php';
                    }
                });
            </script>";
        }
        ?>
          <?php } ?>

        </section>
      </div>
    </div>
  </div>

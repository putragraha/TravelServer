            <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Driver</div>
            <div class="float-right">
            </div>
          </h1>
          <!-- Tambah driver -->
          <?php if(isset($_GET['add'])) { ?>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Driver</h4>
                    <a href="?page=driver" class="btn btn-primary btn-sm">
                    <i class="ion-back"></i><-- Back
                </a>
                  </div>
                  <div class="card-body">
                  <form class="form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Driver</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama_driver" class="form-control" autocomplete="off" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Driver</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="foto_driver" id="image-upload"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SIM</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="foto_sim" id="image-upload"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto STNK</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="foto_stnk" id="image-upload"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SKCK</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="foto_skck" id="image-upload"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobil</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="mobil" id="image-upload"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Handphone</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="no_handphone" class="form-control" autocomplete="off" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Duduk</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="tempat_duduk" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" name="simpan" class="btn btn-primary">
                            <i class="ion ion-android-done-all"></i> Simpan</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Aksi Simpan driver -->
        <?php if(isset($_POST['simpan'])) {
              {
              $nama_driver = $_POST['nama_driver']; 
              $foto_driver = $_FILES['foto_driver']['name'];
              $foto_sim = $_FILES['foto_sim']['name'];
              $foto_stnk = $_FILES['foto_stnk']['name'];
              $foto_skck = $_FILES['foto_skck']['name'];
              $mobil = $_FILES['mobil']['name'];
              $no_handphone = $_POST['no_handphone'];
              $tempat_duduk = $_POST['tempat_duduk'];
              } 
            $sql=mysqli_query($konek, "INSERT INTO driver (nama_driver, foto_driver, foto_sim, foto_stnk, foto_skck, no_handphone, mobil, tempat_duduk)
            VALUES ('$nama_driver', '$foto_driver', '$foto_sim', '$foto_stnk', '$foto_skck', '$no_handphone', '$mobil', '$tempat_duduk')");
            move_uploaded_file($_FILES['foto_driver']['tmp_name'], 'upload/foto driver/'.$foto_driver);
            move_uploaded_file($_FILES['foto_sim']['tmp_name'], 'upload/foto sim/'.$foto_sim);
            move_uploaded_file($_FILES['foto_stnk']['tmp_name'], 'upload/foto stnk/'.$foto_stnk);
            move_uploaded_file($_FILES['foto_skck']['tmp_name'], 'upload/foto skck/'.$foto_skck);
            move_uploaded_file($_FILES['mobil']['tmp_name'], 'upload/mobil/'.$mobil); 
            echo "<script>
                swal({ title: 'Berhasil!',
                text: 'driver berhasil ditambahkan',
                icon: 'success'}).then(okay => {
                    if (okay) {
                        window.location.href = '?page=driver';
                    }
                });
            </script>";
        }
        ?> 
        <!-- Aksi Edit Driver -->
            <?php if(isset($_POST['ubah'])) {
            {
              $foto_driver = $_FILES['foto_driver']['name'];
              $foto_sim = $_FILES['foto_sim']['name'];
              $foto_stnk = $_FILES['foto_stnk']['name'];
              $foto_skck = $_FILES['foto_skck']['name'];
              $mobil = $_FILES['mobil']['name'];
            } 
            $sql=mysqli_query($konek, "UPDATE driver SET
            nama_driver = '$_POST[nama_driver]',
            foto_driver = '$_POST[foto_driver]',
            foto_sim = '$_POST[foto_sim]',
            foto_stnk = '$_POST[foto_stnk]',
            foto_skck = '$_POST[foto_skck]',
            no_handphone = '$_POST[no_handphone]',
            mobil = '$_POST[mobil]',
            tempat_duduk = '$_POST[tempat_duduk]'
            WHERE id = '$_GET[ubah]'");
            move_uploaded_file($_FILES['foto_driver']['tmp_name'], 'upload/foto driver/'.$foto_driver);
            move_uploaded_file($_FILES['foto_sim']['tmp_name'], 'upload/foto sim/'.$foto_sim);
            move_uploaded_file($_FILES['foto_stnk']['tmp_name'], 'upload/foto stnk/'.$foto_stnk);
            move_uploaded_file($_FILES['foto_skck']['tmp_name'], 'upload/foto skck/'.$foto_skck);
            move_uploaded_file($_FILES['mobil']['tmp_name'], 'upload/mobil/'.$mobil);
            echo "<script>
            swal({ title: 'Berhasil!',
            text: 'driver berhasil diubah',
            icon: 'success'}).then(okay => {
            if (okay) {
            window.location.href = '?page=driver';
            }});
            </script>";
            }
            ?>
        <!-- Tabel driver -->
                <?php } else { ?>
                <div class="section-body">
                <div class="row">
                <div class="col-12">
                <div class="card">  
                </div>
                </div>
                </div>
                <?php } ?>
                </section>
                </div>
                </div>
                </div>

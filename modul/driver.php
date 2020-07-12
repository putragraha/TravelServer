      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Driver</div>
            <div class="float-right">
                <a href="?page=travel&add" class="btn btn-primary btn-sm">
                    <i class="ion-plus"></i>Daftar Driver
                </a>
            </div>
          </h1>
          <!-- Edit driver -->
          <?php if(isset($_GET['add'])) { ?>
        <?php } elseif(isset($_GET['ubah'])) {
          $query = mysqli_query($konek, "SELECT * FROM driver WHERE id = '$_GET[ubah]'") OR DIE(mysqli_connect_error($konek));
          $data = mysqli_fetch_assoc($query);
        ?>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Driver</h4>
                    <a href="?page=driver" class="btn btn-primary btn-sm">
                    <i class="ion-back"></i><-- Back
                </a>
                  </div>
                  <div class="card-body">
                  <form class="form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Driver</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama_driver" value="<?php echo $data['nama_driver'];?>" class="form-control" autocomplete="off" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Driver</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="" style="">
                          <input type="file" name="foto_driver"  id="image-upload"/>
                          <span><?php echo $data['foto_driver'];?></span>
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
                    <input type="text" name="no_handphone" class="form-control" value="<?php echo $data['no_handphone'];?>" autocomplete="off" required>
                    </div>
                    </div>

                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Duduk</label>
                    <div class="col-sm-12 col-md-7">
                    <input type="text" name="tempat_duduk" value="<?php echo $data['tempat_duduk'];?>" class="form-control" required>
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
                text: 'aksesoris berhasil diubah',
                icon: 'success'}).then(okay => {
                    if (okay) {
                        window.location.href = '?page=driver';
                    }
                });
            </script>";
        }
        ?>
        <!-- Hapus driver -->
        <?php } elseif(isset($_GET['hapus'])) {
          // memilih gambar untuk dihapus
    $nama_file1=mysqli_fetch_array($hapus1);
    $nama_file2=mysqli_fetch_array($hapus2);
    $nama_file3=mysqli_fetch_array($hapus3);
    $nama_file4=mysqli_fetch_array($hapus4);
    $nama_file5=mysqli_fetch_array($hapus5);
    // nama field gambar
    $lokasi1=$nama_file1['lampiran_brd'];
    $lokasi2=$nama_file2['lampiran_fsd'];
    $lokasi3=$nama_file3['lampiran_sit'];
    $lokasi4=$nama_file4['lampiran_uat'];
    $lokasi5=$nama_file5['lampiran_to'];
    // alamat tempat gambar
    $hapus_file1="file/brd/$lokasi1";
    $hapus_file2="file/fsd/$lokasi2";
    $hapus_file3="file/sit/$lokasi3";
    $hapus_file4="file/uat/$lokasi4";
    $hapus_file5="file/to/$lokasi5";
    // script delete gambar dari folder
    unlink($hapus_file1);
    unlink($hapus_file2);
    unlink($hapus_file3);
    unlink($hapus_file4);
    unlink($hapus_file5);

          $sql = mysqli_query($konek, "DELETE FROM driver WHERE id = '$_GET[hapus]'") or die (mysql_error());
          echo "<script>
            swal({ title: 'Berhasil!',
            text: 'Data berhasil dihapus',
            icon: 'success'}).then(okay => {
              if (okay) {
                window.location.href = '?page=driver';
              }
            });
            </script>";
        ?>

        <!--nampilkan data driver-->
        <?php } else { ?>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama Driver</th>
                            <th>Foto Driver</th>
                            <th>Foto Sim</th>
                            <th>Foto STNK</th>
                            <th>Foto SKCK</th>
                            <th>No Handphone</th>
                            <th>Mobil</th>
                            <th>Tempat Duduk</th>
                            <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                        <!-- Aksi Menampilkan Data -->
                        <?php
                        $no = 0;
                        $query = mysqli_query ($konek, "SELECT * FROM driver");
                        { ?>
                        <?php } while ($baca = mysqli_fetch_assoc($query)) {
                        $no=$no+1;
                        ?>                                 
                        <tr>
                            <td class="align-middle" width="40"><?php echo $no;?></td>
                            <td class="align-middle"><?php echo $baca['nama_driver'];?></td>
                            <td class="align-middle"><?php echo ($baca['foto_driver']) ;?></td>
                            <td class="align-middle"><?php echo ($baca['foto_sim']) ;?></td>
                            <td class="align-middle"><?php echo ($baca['foto_stnk']) ;?></td>
                            <td class="align-middle"><?php echo ($baca['foto_skck']) ;?></td>
                            <td class="align-middle"><?php echo ($baca['no_handphone']) ;?></td>
                            <td class="align-middle"><?php echo ($baca['mobil']) ;?></td>
                            <td class="align-middle"><?php echo ($baca['tempat_duduk']) ;?></td>
                            <td class="align-middle">
                            <a href="?page=driver&ubah=<?php echo $baca['id'];?>" class="btn btn-info btn-sm" title="Edit Driver">
                            <i class="ion-edit"></i></a>
                            <a href="?page=driver&hapus=<?php echo $baca['id'];?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" title="Hapus Driver">
                            <i class="ion-trash-a"></i></a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</section>
</div>
</div>
</div>
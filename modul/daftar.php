<?php 
require '../config/koneksi.php';
require '../config/function.php';
?>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Daftar &mdash; Kasir</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <!-- CSS -->

  <link rel="stylesheet" href="../assets/css/datepicker.css">
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="../assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../assets/modules/summernote/summernote-lite.css">
  <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="../assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <!-- Kustom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- JS Sweet Alert -->
  <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="../assets/js/ckeditor/ckeditor.js"></script>
</head>
      <body>
      <div>
        <section class="section">
          <h1 class="section-header">
            <div>Daftar Diri</div>
          </h1>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar</br>
                    <div class="float-left">
                <a href="../login.php" class="btn btn-primary btn-sm">
                    <i class="ion-back"></i><-- back
                </a>
            </div></h4>
                  </div>
                  <div class="card-body">
                  <form class="form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm- col-md-7">
                        <input type="text" name="nama" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="" class="">
                          <input type="file" name="foto" id="image-upload" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" name="email" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="password" class="form-control" required>
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
        <!-- Aksi Simpan makanan -->
        <?php if(isset($_POST['simpan'])) {
            $namafile = $_FILES['foto']['name'];
            mysqli_query($konek, "INSERT INTO user (nama_user, foto, email, password)
            VALUES ('$_POST[nama]', '$namafile','$_POST[email]', '$_POST[password]')");
            move_uploaded_file($_FILES['foto']['tmp_name'], "../upload/profil/".$namafile);
            echo "<script>
                swal({ title: 'Berhasil!',
                text: 'berita berhasil ditambahkan',
                icon: 'success'}).then(okay => {
                    if (okay) {
                        window.location.href = '../login.php';
                    }
                });
            </script>";
        }
        ?>
        
        </section>
      </div>
    </div>
  </div>
</body>
<script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="../assets/modules/chart.min.js"></script>
  <script src="../assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../assets/modules/summernote/summernote-lite.js"></script>
  <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/js/sa-functions.min.js"></script>
  <!-- Data Table -->
  <script src="../assets/modules/datatables/datatables.min.js"></script>
  <script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  
  <script>
    $("#table-1").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [2,3] }
        ]
    });
  </script>
  <!-- JS Preview Gambar -->
  <script src="../assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script>
    $.uploadPreview({
      input_field: "#image-upload",   // Default: .image-upload
      preview_box: "#image-preview",  // Default: .image-preview
      label_field: "#image-label",    // Default: .image-label
      label_default: "Pilih Gambar",  // Default: Choose File
      label_selected: "Ganti Gambar", // Default: Change File
      no_label: false,                // Default: false
      success_callback: null          // Default: null
    });
  </script>
  <script src="../assets/js/scripts.min.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/print.js"></script>
</body>
</html>
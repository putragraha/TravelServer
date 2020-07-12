<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Neptuunia Travel</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  <!-- CSS -->

  <link rel="stylesheet" href="assets/css/datepicker.css">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-lite.css">
  <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <!-- Kustom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- JS Sweet Alert -->
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="assets/js/ckeditor/ckeditor.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar bg-info"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <?php
        { $query = mysqli_query($konek, "SELECT * FROM admin WHERE id = '$idku'") OR DIE(mysqli_connect_error($konek));
          $data = mysqli_fetch_assoc($query);
        ?>

            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">Welcome, <?php echo $data['nama_admin'];?></div></a>
            <div class="dropdown-menu dropdown-menu-right"><?php } ?>
              <a href="logout.php" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

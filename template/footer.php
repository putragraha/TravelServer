<script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/summernote/summernote-lite.js"></script>
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/js/sa-functions.min.js"></script>
  <!-- Data Table -->
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

  <?php
  //$produk = mysqli_query ($konek, "SELECT * FROM tbl_produk");
  //$jual = mysqli_query ($konek, "SELECT * FROM tbl_produk");
  $jual = mysqli_query ($konek, "SELECT COUNT(noinvoice) AS terjual FROM tbl_transaksi GROUP BY idproduk");


  if($currentFile == "admin.php?page=grafik"){?>
 <script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php while($b = mysqli_fetch_array($produk)) { echo '"' . $b['namaproduk'] . '",'; } ?>],
        datasets: [{
          label: 'Jumlah',
          data: [<?php while($b = mysqli_fetch_array($jual)) { echo '"' . $b['terjual'] . '",'; } ?>],
          borderWidth: 2,
          backgroundColor: [
            '#558b2f',
            '#5d4037',
            '#dc3545',
            '#76ff03',
            '#00c853',
          ],
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 150
            }
          }],
          xAxes: [{
            ticks: {
              display: false
            },
            gridLines: {
              display: false
            }
          }]
        },
      }
    });
  </script>
  
  <?php } ?>
  <script>
    $("#table-1").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [2,3] }
        ]
    });
  </script>
  <!-- JS Preview Gambar -->
  <script src="assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
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
  <script src="assets/js/scripts.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/print.js"></script>
</body>
</html>
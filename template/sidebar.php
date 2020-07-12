      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Neptuunia Travel</a>
          </div>
          <?php
        { $query = mysqli_query($konek, "SELECT * FROM admin WHERE id = '$idku'") OR DIE(mysqli_connect_error($konek));
          $data = mysqli_fetch_assoc($query);
        ?>
          <div class="sidebar-user">
              <img alt="image" style="border-radius: 10px;" width="230" src="upload/profil/<?php echo $data['foto']; ?>">
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo $data['nama_admin']; ?></div>
              <div class="user-role">
               <?php echo $data['email']; ?>
              </div>
            </div>
          </div>
          <?php } ?>
          <ul class="sidebar-menu">
            <li class="menu-header">MENU</li>
            <li <?php if($currentFile == "admin.php"){?>class="active"<?php }?>>
              <a href="admin.php"><i class="ion ion-ios-analytics"></i><span>Dashboard</span></a>
            </li>
            <li <?php if($currentFile == "?page=profil"){?>class="active"<?php }?>>
              <a href="?page=profil&id=<?php echo $idku;?>"><i class="ion ion-ios-person"></i><span>Administrator</span></a>
            </li>
            <li <?php if($currentFile == "?page=profil"){?>class="active"<?php }?>>
              <a href="?page=driver&id=<?php echo $idku;?>"><i class="ion ion-ios-people"></i><span>Driver</span></a>
            </li>
            <li <?php if($currentFile == "?page=profil"){?>class="active"<?php }?>>
              <a href="?page=driver&id=<?php echo $idku;?>"><i class="ion ion-ios-people"></i><span>User</span></a>
            </li>
          </ul>
        </aside>
      </div>
      

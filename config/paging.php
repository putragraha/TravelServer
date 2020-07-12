<?php if(isset($_GET['page'])) {
    $page = $_GET['page'];
    //Kondisi
    switch ($page) {
        case 'travel':    
            include "modul/travel/travel.php";
        break;
        case 'ganti_password':
            include "modul/ganti_password.php";
        break;
        case 'profil': 
            include "modul/profil.php";
        break;
        case 'driver': 
            include "modul/driver.php";
        break;
        case 'ganti_email': 
            include "modul/ganti_email.php";
        break;
		default:
			include "modul/home.php";
		break;
        

    }
} else {
    include "modul/home.php";
}
?>
<?php
	if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
		echo '<script language="javascript">alert("Anda belum login");</script>';
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
		exit;
	}else if($_SESSION['hak_akses']!="Administrator"){
		echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	}
  
if($_GET) {
	switch($_GET['menu']){				
		case '' :
			if(!file_exists ("dashboard.php")) die ("Empty Main Page!"); 
			include "dashboard.php";
            break;
        
        case 'Logout' :
			if(!file_exists ("logout.php")) die ("Empty Main Page!"); 
			include "logout.php";
            break;
        
        case 'Profile' :
			if(!file_exists ("../profile_data.php")) die ("Empty Main Page!"); 
			include "../profile_data.php";
            break;
      
      case 'Update_Profile' :
        if(!file_exists ("../edit_data.php")) die ("Empty Main Page!"); 
        include "../edit_data.php";
      break;
        
        /* ----- ***** ----- */

		case 'Data_Administrator' :
			if(!file_exists ("administrator/admin.php")) die ("Sorry Empty Page!"); 
			include "administrator/admin.php";
            break;
            
		case 'Tambah_Administrator' :
			if(!file_exists ("administrator/tambah_data.php")) die ("Sorry Empty Page!"); 
			include "administrator/tambah_data.php";
            break;
            
		case 'Edit_Administrator' :
			if(!file_exists ("administrator/perintah.php")) die ("Sorry Empty Page!"); 
			include "administrator/perintah.php";
            break;
        
        /* ----- ***** ----- */

		case 'Data_Penyakit' :
			if(!file_exists ("penyakit/penyakit.php")) die ("Sorry Empty Page!"); 
			include "penyakit/penyakit.php";
            break;
            
		case 'Tambah_Penyakit' :
			if(!file_exists ("penyakit/tambah_data.php")) die ("Sorry Empty Page!"); 
			include "penyakit/tambah_data.php";
            break;
            
		case 'Edit_Penyakit' :
			if(!file_exists ("penyakit/perintah.php")) die ("Sorry Empty Page!"); 
			include "penyakit/perintah.php";
            break;
        
        /* ----- ***** ----- */

		case 'Data_Gejala' :
			if(!file_exists ("gejala/gejala.php")) die ("Sorry Empty Page!"); 
			include "gejala/gejala.php";
            break;
            
		case 'Tambah_Gejala' :
			if(!file_exists ("gejala/tambah_data.php")) die ("Sorry Empty Page!"); 
			include "gejala/tambah_data.php";
            break;
            
		case 'Edit_Gejala' :
			if(!file_exists ("gejala/perintah.php")) die ("Sorry Empty Page!"); 
			include "gejala/perintah.php";
            break;
        
        /* ----- ***** ----- */

		case 'Data_Penyebab' :
			if(!file_exists ("penyebab/penyebab.php")) die ("Sorry Empty Page!"); 
			include "penyebab/penyebab.php";
            break;
            
		case 'Tambah_Penyebab' :
			if(!file_exists ("penyebab/tambah_data.php")) die ("Sorry Empty Page!"); 
			include "penyebab/tambah_data.php";
            break;
            
		case 'Detail_Penyebab' :
			if(!file_exists ("penyebab/perintah.php")) die ("Sorry Empty Page!"); 
			include "penyebab/perintah.php";
            break;
            
		case 'Delete_Penyebab' :
			if(!file_exists ("penyebab/hapus.php")) die ("Sorry Empty Page!"); 
			include "penyebab/hapus.php";
            break;
            
		case 'Hapus_Penyebab' :
			if(!file_exists ("penyebab/perintah.php")) die ("Sorry Empty Page!"); 
			include "penyebab/perintah.php";
            break;
        
        case 'Add_Gejala' :
			if(!file_exists ("penyebab/tambah_gejala.php")) die ("Sorry Empty Page!"); 
			include "penyebab/tambah_gejala.php";
            break;
        
        /* ----- ***** ----- */

		case 'Basis_Pengetahuan' :
			if(!file_exists ("basis.php")) die ("Sorry Empty Page!"); 
			include "basis.php";
            break;
        
        /* ----- ***** ----- */

		case 'Data_Judul' :
			if(!file_exists ("judul/judul.php")) die ("Sorry Empty Page!"); 
			include "judul/judul.php";
            break;
            
		case 'Edit_Judul' :
			if(!file_exists ("judul/edit_data.php")) die ("Sorry Empty Page!"); 
			include "judul/edit_data.php";
            break;
        
        /* ----- ***** ----- */

		case 'Data_Deskripsi' :
			if(!file_exists ("deskripsi/deskripsi.php")) die ("Sorry Empty Page!"); 
			include "deskripsi/deskripsi.php";
            break;
            
		case 'Edit_Deskripsi' :
			if(!file_exists ("deskripsi/perintah.php")) die ("Sorry Empty Page!"); 
			include "deskripsi/perintah.php";
            break;
        
        /* ----- ***** ----- */
            
		case 'Data_Password' :
			if(!file_exists ("password/data_password.php")) die ("Sorry Empty Page!"); 
			include "password/data_password.php";
            break;
            
		case 'Edit_Password' :
			if(!file_exists ("password/edit_password.php")) die ("Sorry Empty Page!"); 
			include "password/edit_password.php";
            break;
            
		/* ----- ***** ----- */
        
        case 'Data_About' :
			if(!file_exists ("password/edit_password.php")) die ("Sorry Empty Page!"); 
			include "password/edit_password.php";
            break;
        
		default:
			if(!file_exists ("dashboard.php")) die ("Empty Main Page!"); 
			include "dashboard.php";						
		break;
	}
}
else {
	if(!file_exists ("dashboard.php")) die ("Sorry Empty Page!"); 
			include "dashboard.php";
}
?>
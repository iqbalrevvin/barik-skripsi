<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Super Admin"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }

  if($_GET) {
    switch($_GET['menu']){				
      case '' :
        if(!file_exists ("home.php")) die ("Empty Main Page!"); 
        include "home.php";
      break;
      
      case 'Login' :
        if(!file_exists ("login.php")) die ("Empty Main Page!"); 
        include "login.php";
      break;
      
      case 'Profile' :
        if(!file_exists ("../profile_data.php")) die ("Empty Main Page!"); 
        include "../profile_data.php";
      break;
      
      case 'Update_Profile' :
        if(!file_exists ("../edit_data.php")) die ("Empty Main Page!"); 
        include "../edit_data.php";
      break;
      
      case 'Logout' :
        if(!file_exists ("logout.php")) die ("Empty Main Page!"); 
        include "logout.php";
      break;
      
      case 'Data_Administrator' :
        if(!file_exists ("administrator/data.php")) die ("Empty Main Page!"); 
        include "administrator/data.php";
      break;
      
      case 'Tambah_Administrator' :
        if(!file_exists ("administrator/tambah_data.php")) die ("Empty Main Page!"); 
        include "administrator/tambah_data.php";
      break;
      
      case 'Delete_Administrator' :
        if(!file_exists ("administrator/perintah.php")) die ("Empty Main Page!"); 
        include "administrator/perintah.php";
      break;
      
      case 'Judul' :
        if(!file_exists ("pengaturan/judul_data.php")) die ("Empty Main Page!"); 
        include "pengaturan/judul_data.php";
      break;
      
      case 'Edit_Judul' :
        if(!file_exists ("pengaturan/judul_ubah.php")) die ("Empty Main Page!"); 
        include "pengaturan/judul_ubah.php";
      break;
      
      case 'Desk_Utama' :
        if(!file_exists ("pengaturan/deut_data.php")) die ("Empty Main Page!"); 
        include "pengaturan/deut_data.php";
      break;
      
      case 'Edit_Deskripsi_Utama' :
        if(!file_exists ("pengaturan/deut_ubah.php")) die ("Empty Main Page!"); 
        include "pengaturan/deut_ubah.php";
      break;
      
      case 'Desk_Admin' :
        if(!file_exists ("pengaturan/dead_data.php")) die ("Empty Main Page!"); 
        include "pengaturan/dead_data.php";
      break;
      
      case 'Edit_Deskripsi_Admin' :
        if(!file_exists ("pengaturan/dead_ubah.php")) die ("Empty Main Page!"); 
        include "pengaturan/dead_ubah.php";
      break;
      
      case 'Desk_Superadmin' :
        if(!file_exists ("pengaturan/desu_data.php")) die ("Empty Main Page!"); 
        include "pengaturan/desu_data.php";
      break;
      
      case 'Edit_Deskripsi_Superadmin' :
        if(!file_exists ("pengaturan/desu_ubah.php")) die ("Empty Main Page!"); 
        include "pengaturan/desu_ubah.php";
      break;
      
      default:
        if(!file_exists ("home.php")) die ("Empty Main Page!"); 
        include "home.php";						
      break;
    }
  }else {
  if(!file_exists ("home.php")) die ("Sorry Empty Page!"); 
    include "home.php";
  }
?>
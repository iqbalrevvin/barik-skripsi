<?php
if($_GET) {
	switch($_GET['menus']){				
    case '' :
      if(!file_exists ("home.php")) die ("Empty Main Page!"); 
      include "home.php";
    break;
    
    case 'Login' :
      if(!file_exists ("login.php")) die ("Empty Main Page!"); 
      include "login.php";
    break;
    
    case 'Diagnosa' :
      if(!file_exists ("diagnosis.php")) die ("Empty Main Page!"); 
      include "diagnosis.php";
    break;
    
    case 'About' :
      if(!file_exists ("me.php")) die ("Empty Main Page!"); 
      include "me.php";
    break;
    
    case 'Data_Penyakit' :
      if(!file_exists ("penyakit.php")) die ("Empty Main Page!"); 
      include "penyakit.php";
    break;
    
    case 'Analisa' :
      if(!file_exists ("analist.php")) die ("Empty Main Page!"); 
      include "analist.php";
    break;
    
    case 'Daftar_Pasien' :
      if(!file_exists ("simpan_pasien.php")) die ("Empty Main Page!"); 
      include "simpan_pasien.php";
    break;
    
    case 'Cek_Analisa' :
      if(!file_exists ("analyzing.php")) die ("Empty Main Page!"); 
      include "analyzing.php";
    break;
    
    case 'Hasil_Analisa' :
      if(!file_exists ("finaly.php")) die ("Empty Main Page!"); 
      include "finaly.php";
    break;
    
    case 'Detail_Penyakit' :
      if(!file_exists ("detail.php")) die ("Empty Main Page!"); 
      include "detail.php";
    break;

    case 'Video' :
      if(!file_exists ("video.php")) die ("Empty Main Page!"); 
      include "video.php";
    break;
    
    case 'Logout' :
      if(!file_exists ("../libs/logout.php")) die ("Empty Main Page!"); 
      include "../libs/logout.php";
    break;
      
    default:
      if(!file_exists ("home.php")) die ("Empty Main Page!"); 
      include "home.php";						
    break;
	}
}
else {
	if(!file_exists ("home.php")) die ("Sorry Empty Page!"); 
			include "home.php";
}
?>
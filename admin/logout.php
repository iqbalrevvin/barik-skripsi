<?php
  // session_start();

  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
		echo '<script language="javascript">alert("Anda belum login");</script>';
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
		exit;
	}else if($_SESSION['hak_akses']!="Administrator"){
		echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	}

  unset($_SESSION['kode']);
  unset($_SESSION['hak_akses']);
  
  session_unset();
  session_destroy();
  
  echo "<meta http-equiv='refresh' content='0; url=../login.php'>";

/**
 * @author Phantom
 * @copyright 2016
 */

?>
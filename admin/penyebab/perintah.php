<?php
	if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
		echo '<script language="javascript">alert("Anda belum login");</script>';
		echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
		exit;
	}else if($_SESSION['hak_akses']!="Administrator"){
		echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	}

if(isset($_GET['act'])){
  	if($_GET['act']=='view'){
		$id = $_GET['id'];

		$query = mysql_query("select * from tbl_penyakit where kode_penyakit = '$id'");
		$data = mysql_fetch_array($query);

		include "detail_data.php";
	}elseif($_GET['act']=='delete'){
		$id = $_GET['id'];

		$query = mysql_query("DELETE FROM tbl_penyebab WHERE kode_penyakit = '$id'");
		echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Data_Penyebab&page=success'>";
	}
}


?>
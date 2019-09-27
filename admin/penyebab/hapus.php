<?php
	if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
		echo '<script language="javascript">alert("Anda belum login");</script>';
		echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
		exit;
	}else if($_SESSION['hak_akses']!="Administrator"){
		echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	}
	
  $penyakit = $_GET['detail'];
  $id = $_GET['id'];
  
  $qry = mysql_query("select * from tbl_penyebab where id = '$id'");
  $data = mysql_fetch_array($qry);
  
  echo "<script>alert('Kode Gejala ".$data['kode_gejala']." Berhasil Dihapus!!!');</script>";
  
  $query = mysql_query("delete from tbl_penyebab where id = '$id'");
  echo"<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?menu=Detail_Penyebab&act=view&id=".$penyakit."'>";

/**
 * @author Phantom
 * @copyright 2016
 */

?>
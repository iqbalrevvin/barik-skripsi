<?php
if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Super Admin"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
  $id = $_GET['id'];
  
  $query = mysql_query("DELETE FROM tbl_pengguna WHERE kode_pengguna = '$id'");

  echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Data_Administrator&pesan=success&isi=2'>";


/**
 * @author IqbalRevvin
 * @copyright 2016
 */

?>


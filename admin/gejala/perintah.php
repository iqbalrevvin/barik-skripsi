<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }

 if(isset($_GET['act'])){
   if($_GET['act']=='delete'){
     $id = $_GET['id'];
    
     $qry = mysql_query("select * from tbl_gejala where kode_gejala = '$id'");
     $data = mysql_fetch_array($qry);
  
     $query1 = mysql_query("delete from tbl_penyebab where kode_gejala = '$id'");
     $query2 = mysql_query("delete from tbl_gejala where kode_gejala = '$id'");
    
     echo"<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?menu=Data_Gejala&page=success'>";
   }elseif($_GET['act']=='edit'){
     $id = $_GET['id'];
    
     $query = mysql_query("select * from tbl_gejala where kode_gejala = '$id'");
     $data = mysql_fetch_array($query);
  
     include "edit_data.php";
   }
 }

/**
 * @author Phantom1605
 * @copyright 2015
 */

?>
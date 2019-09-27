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
    
     $qry_sb = mysql_query("select * from tbl_penyebab where kode_penyakit = '$id'");
       $data_sb = mysql_fetch_array($qry_sb);
    
     $id_gj = $data_sb['kode_gejala'];
       $qry_gj = mysql_query("select * from tbl_gejala where kode_gejala = '$id_gj'");
         $data_gj = mysql_fetch_array($qry_gj);
    
     if($data_gj > 0){
       echo"<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?menu=Data_Penyakit&page=error&id=$id'>";
     }else{
       $qry = mysql_query("select * from tbl_penyakit where kode_penyakit = '$id'");
       $data = mysql_fetch_array($qry);
      
       echo "<script>alert('Kode Penyakit ".$data['kode_penyakit']." dan Nama Penyakit ".$data['nama_penyakit']." Berhasil Dihapus!!!');</script>";
    
       $query = mysql_query("delete from tbl_penyebab where kode_penyakit = '$id'");
       $query = mysql_query("delete from tbl_penyakit where kode_penyakit = '$id'");
      
       echo"<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?menu=Data_Penyakit&page=success'>";
       //echo"<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?menu=Data_Penyakit'>";
     }
   }elseif($_GET['act']=='edit'){
     $id = $_GET['id'];
    
     $query = mysql_query("select * from tbl_penyakit where kode_penyakit = '$id'");
     $data = mysql_fetch_array($query);
    
     include "edit_data.php";
   }else
  if($_GET['act']=='detail'){
    $id = $_GET['id'];
    
    $query = mysql_query("select * from tbl_penyakit where kode_penyakit = '$id'");
    $data = mysql_fetch_array($query);
    
    include "detail_data.php";
  }
}


?>
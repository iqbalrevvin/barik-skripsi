<?php
  include "libs/koneksi.php";
  include "libs/library.php";
  
  if(isset($_POST['Tb_Validasi'])){
    $Txt_User = $_POST['Txt_User'];
    $Txt_Pass = $_POST['Txt_Pass'];
    
    $error = array();
    
    if(empty($Txt_User)){
      $error[] = 'Username tidak boleh kosong.';
    }
    if(empty($Txt_Pass)){
      $error[] = 'Password tidak boleh kosong.';
    }
    if (count($error)>=1 ){
      $Txt_User = $_POST['Txt_User'];
      $Txt_Pass = $_POST['Txt_Pass'];
    ?>
    
        <div class="row">
          <div class="col s12">
            <div class="card-panel red">
              <span class="white-text">
    <?php
    $noPesan=0;
    foreach ($error as $indeks=>$pesan_tampil) { 
      $noPesan++;
      echo "$noPesan. $pesan_tampil<br>";	
    }
    ?>
              </span>
            </div>
          </div>
        </div>
    <?php
    }
    if(empty($error)){  
      $TxtPass = encryptIt($Txt_Pass);
      
      $query = mysql_query("SELECT * FROM tbl_pengguna WHERE username = '$Txt_User' and pass = '$TxtPass'");
      $cek = mysql_num_rows($query);
      
      if ($cek >= 1){
        $ambil = mysql_fetch_array($query);
        
        $_SESSION['kode']       = $ambil['kode_pengguna'];
        $_SESSION['hak_akses']  = $ambil['hak_akses'];
        
        echo "<script type='text/javascript'>alert('LOGIN BERHASIL')</script>";
        
        //if(!empty($_SESSION['kode'])){
        if ($ambil['hak_akses']=="Administrator"){
          //header ('location:../admin/');
          echo "<meta http-equiv='refresh' content='0; url=admin/'>";
        }else if ($ambil['hak_akses']=="Super Admin"){
          //header ('location:../superadmin/');
          echo "<meta http-equiv='refresh' content='0; url=superadmin/'>";
        }
      }
      else{
        //echo "<script>alert('Login Gagal'); window.location=('".$_SERVER['PHP_SELF']."');</script>";
      ?>
        <div class="row">
          <div class="col s12">
            <div class="card-panel red">
              <span class="white-text">GAGAL LOGIN...</span>
            </div>
          </div>
        </div>
      <?php
      }              
    }
  }

/**
 * @author IqbalRevvin
 * @copyright 2016
 */

?>
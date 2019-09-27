<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Super Admin"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }

  $id = $_GET['id'];
  $query = mysql_query("select * from tbl_deskripsi where id = '$id'");
  $data = mysql_fetch_array($query);
  
  $dataJudul = isset($_POST['Txt_Judul']) ? $_POST['Txt_Judul'] : $data['judul'];
?>
                  

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php
            $sql = mysql_query("select * from tbl_deskripsi");
            $deskripsi = mysql_fetch_array($sql);
            echo $deskripsi['judul'];
          ?>
            <br />
            <small>versi Tugas Sistem Pakar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?menu=Data_Administrator"><i class="fa fa-file"></i> Data Judul</a></li>
            <li class="active">Ubah Judul</li>
          </ol>
        </section>
          <!-- Main content -->
        <section class="content">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Judul</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Judul</label>
                <div class="col-sm-6">
                  <input type="text" name="Txt_Judul" class="form-control" placeholder="Masukkan Nama Administrator" value="<?php echo $dataJudul;?>"/>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-md-6 col-md-offset-2">
                <input type="submit" name="Tb_Simpan" class="btn btn-primary" value="Edit" data-target=".bs-example-modal-sm"/>
                <button class="btn btn-danger pull-right" onclick="history.back();"><i class="fa fa-reply"></i> Kembali</button>
              </div>
              </div>
            </form>
          </div>
        </section>

<?php
  if(isset($_POST['Tb_Simpan'])){
    $TxtJudul = $_POST['Txt_Judul'];
    
    $pesanError = array();
    
    if (trim($TxtJudul)=="") {
      $pesanError[] = "<b>Judul Utama</b> Masih Kosong !";			
    }
    
    if (count($pesanError)>=1 ){
      $TxtJudul = $_POST['Txt_Judul'];
    ?>
    
      <!-- Main content -->
      <section class="content">
        <!-- Horizontal Form -->
        <div class="box box-danger box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="glyphicon glyphicon-alert"></i> PERINGATAN</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal">
            <div class="box-body">
            
              <?php
                $noPesan=0;
                foreach ($pesanError as $indeks=>$pesan_tampil) { 
                  $noPesan++;
                  echo "$noPesan. $pesan_tampil<br>";	
                }
              ?>
            </div><!-- /.box-body -->
          </form>
        </div><!--/.col (right) -->
      </section><!-- /.content -->
      
    <?php
    }else {
      $mySql	= "update tbl_deskripsi set judul = '$TxtJudul' where id = '$id'";
      
      $myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
      
      echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Judul&pesan=success&isi=1'>";
      exit;
    }
  }
?>

      </div>
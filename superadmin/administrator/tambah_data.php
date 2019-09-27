<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Super Admin"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
  $dataNama     = isset($_POST['Txt_Nama']) ? $_POST['Txt_Nama'] : '';
  $dataUsername = isset($_POST['Txt_Username']) ? $_POST['Txt_Username'] : '';
  $dataPassword = isset($_POST['Txt_Password']) ? $_POST['Txt_Password'] : '';
  $dataAkses    = isset($_POST['Cmb_Akses']) ? $_POST['Cmb_Akses'] : '';
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
                    <li><a href="index.php?menu=Data_Administrator"><i class="fa fa-group"></i> Data Administrator</a></li>
                    <li class="active">Tambah Data</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Administrator</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="index.php?menu=Tambah_Administrator">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Administrator</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Txt_Nama" class="form-control" placeholder="Masukkan Nama Administrator" value="<?php echo $dataNama;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Txt_Username" class="form-control" placeholder="Masukkan Username" value="<?php echo $dataUsername;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="Txt_Password" class="form-control" placeholder="Masukkan Password" value="<?php echo $dataPassword;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hak Akses</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" name="Cmb_Akses">
                                      <option value="#">Pilih Hak Akses</option>
                                      <?php
                                        $pilih = array("Administrator","Super Admin");
                                        foreach($pilih as $akses){
                                          if($dataAkses == $akses){
                                            $cek = "selected";
                                          }else{
                                            $cek = "";
                                          }
                                          echo "<option value='".$akses."' ".$cek.">".$akses."</option>";
                                        }
                                      ?>
                                    </select>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-2">
                                <!-- <input type="submit" name="Tb_Simpan" class="btn btn-primary" value="Simpan"/> -->
                                <button type="submit" class="btn btn-primary" name="Tb_Simpan"><i class="fa fa-save"></i> Simpan</button>
                                <button class="btn btn-danger pull-right" onclick="history.back();"><i class="fa fa-reply"></i> Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            
            <?php
                if(isset($_POST['Tb_Simpan'])){
                  $TxtNama      = $_POST['Txt_Nama'];
                  $TxtUsername  = $_POST['Txt_Username'];
                  $TxtPassword  = $_POST['Txt_Password'];
                  $CmbAkses     = $_POST['Cmb_Akses'];

                	$pesanError = array();
                  
                  if (trim($TxtNama)=="") {
                		$pesanError[] = "<b>Nama Administrator</b> Masih Kosong !";			
                	}
                  if (trim($TxtUsername)=="") {
                		$pesanError[] = "<b>Username</b> Masih Kosong !";			
                	}
                  if (trim($TxtPassword)=="") {
                		$pesanError[] = "<b>Password</b> Masih Kosong !";			
                	}
                  if (trim($CmbAkses)=="#") {
                    $pesanError[] = "<b>Hak Akses</b> Belum Dipilih !";     
                  }
                  $cek_username = mysql_num_rows(mysql_query("SELECT username FROM tbl_pengguna WHERE username = '".$TxtUsername."'"));
                  if ($cek_username > 0){
                      $pesanError[] = "<b>Username</b> sudah ada. Silahkan ganti username yang lain.";
                  }
                    		
                	if (count($pesanError)>=1 ){
                      $TxtNama      = $_POST['Txt_Nama'];
                      $TxtUsername  = $_POST['Txt_Username'];
                      $TxtPassword  = $_POST['Txt_Password'];
                      $CmbAkses     = $_POST['Cmb_Akses'];
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
                	}
                	else {
                    $tanggal    = date("Y-m-d");
                    $dataKode   = acak(11);
                    $cekKode    = mysql_query("select * from tbl_pengguna where kode_pengguna = '$dataKode'");
                    $hasilKode  = mysql_num_rows($cekKode);
                    
                    if ($hasilKode >= 1) {
                      $dataKode;
                    }else{
                      $Pass   = encryptIt($TxtPassword);
                      $mySql  = "INSERT INTO tbl_pengguna(kode_pengguna,nama_pengguna,tgl_daftar,username,pass,hak_akses) VALUES ('$dataKode','$TxtNama','$tanggal','$TxtUsername','$Pass','$CmbAkses')";
                      $myQry  = mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
                  
                      echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Data_Administrator&pesan=success&isi=1'>";
                      exit;
                    }
                  }
                }
            ?>
        
        </div><!-- /.content-wrapper -->
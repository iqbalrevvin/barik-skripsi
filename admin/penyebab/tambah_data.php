<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
    $Cmb_Penyakit = isset($_POST['Cmb_Penyakit']) ? $_POST['Cmb_Penyakit'] : '';
    $Cmb_Gejala   = isset($_POST['Cmb_Gejala']) ? $_POST['Cmb_Gejala'] : '';
?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Sistem Pakar Pengobatan Homeopathy
                    <br />
                    <small>Versi Skripsi Sistem Pakar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="index.php?menu=Data_Penyakit">Data Penyebab</a></li>
                    <li class="active">Tambah Data</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Penyebab</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Penyakit</label>
                                <div class="col-sm-6">
          												<select name="Cmb_Penyakit" class="form-control" id="select-1">
          													<option value="#">- Pilih Nama Penyakit -</option>
                                    <?php
                                      $qry = mysql_query("select * from tbl_penyakit");
                                      while($data = mysql_fetch_array($qry)){
                                        if($Cmb_Penyakit == $data['kode_penyakit']){
                                          $cek = "selected";
                                        }else{
                                          $cek = "";
                                        }
                                        echo "<option value='".$data['kode_penyakit']."'".$cek.">".$data['nama_penyakit']."</option>";
                                      }
                                    ?>
          												</select>
          											</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Gejala</label>
                                <div class="col-sm-6">
          												<select name="Cmb_Gejala" class="form-control" id="select-2">
          													<option value="#">- Pilih Nama Gejala -</option>
                                    <?php
                                      $qry = mysql_query("select * from tbl_gejala");
                                      while($data = mysql_fetch_array($qry)){
                                        if($Cmb_Gejala == $data['kode_gejala']){
                                          $cek = "selected";
                                        }else{
                                          $cek = "";
                                        }
                                        echo "<option value='".$data['kode_gejala']."'".$cek.">".$data['nama_gejala']."</option>";
                                      }
                                    ?>
          												</select>
          											</div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="submit" name="Tb_Simpan" class="btn btn-primary" value="Simpan"/>
                                <a href="?menu=Data_Penyebab" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!--/.col (right) -->
            </section><!-- /.content -->
            
            <?php
                if(isset($_POST['Tb_Simpan'])){
                    $Cmb_Penyakit = $_POST['Cmb_Penyakit'];
                    $Cmb_Gejala   = $_POST['Cmb_Gejala'];
                    
                
                	$pesanError = array();
                    
                	if (trim($Cmb_Penyakit)=="#") {
                		$pesanError[] = "<b>Nama Penyakit</b> Belum Dipilih !";			
                	}
                    if (trim($Cmb_Gejala)=="#") {
                		$pesanError[] = "<b>Nama Gejala</b> Belum Dipilih !";			
                	}
                    		
                	if (count($pesanError)>=1 ){
                        $Cmb_Penyakit = $_POST['Cmb_Penyakit'];
                        $Cmb_Gejala   = $_POST['Cmb_Gejala'];
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
                      $mySql	= "INSERT INTO tbl_penyebab(kode_penyakit,kode_gejala) VALUES ('$Cmb_Penyakit','$Cmb_Gejala')";
              		    $myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
              		
                      echo "<script>alert('Data Berhasil Disimpan!');</script>";
                		echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Detail_Penyebab&act=view&id=".$Cmb_Penyakit."'>";
                		exit;
                	}
                }
            ?>
        
        </div><!-- /.content-wrapper -->
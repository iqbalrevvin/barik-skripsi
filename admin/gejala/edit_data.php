<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
  $dataKode   = $data['kode_gejala'];
  $dataGejala = isset($_POST['Txt_Gejala']) ? $_POST['Txt_Gejala'] : $data['nama_gejala'];    
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
                    <li><a href="index.php?menu=Data_Gejala">Data Gejala</a></li>
                    <li class="active">Edit Data</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data Gejala</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode Gejala</label>
                                <div class="col-sm-2">
                                    <input type="text" name="Txt_Kode" class="form-control" placeholder="Kode Gejala" value="<?php echo $dataKode?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gejala</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Txt_Gejala" class="form-control" placeholder="Masukkan Gejala Penyakit" value="<?php echo $dataGejala?>"/>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="submit" name="Tb_Edit" class="btn btn-primary" value="Edit"/>
                                <a href="?menu=Data_Gejala" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!--/.col (right) -->
            </section><!-- /.content -->
            
            <?php
                if(isset($_POST['Tb_Edit'])){
                    $TxtKode    = $_POST['Txt_Kode'];
                    $TxtGejala  = $_POST['Txt_Gejala'];
                    
                
                	$pesanError = array();
                    
                	if (trim($TxtKode)=="") {
                		$pesanError[] = "<b>Kode Gejala</b> Belum Dibuat !";			
                	}
                    if (trim($TxtGejala)=="") {
                		$pesanError[] = "<b>Nama Gejala</b> Masih Kosong !";			
                	}
                    		
                	if (count($pesanError)>=1 ){
                        $TxtKode    = $_POST['Txt_Kode'];
                        $TxtGejala  = $_POST['Txt_Gejala'];
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
                        $dataKode   = $data['kode_gejala'];
                        
                        $mySql	= "update tbl_gejala set nama_gejala = '$TxtGejala' where kode_gejala = '$TxtKode'";
                        
                		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
                		
                        echo "<script>alert('Data Berhasil Diubah!');</script>";    		
                		echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Data_Gejala'>";
                		exit;
                	}
                }
            ?>
            
        </div><!-- /.content-wrapper -->
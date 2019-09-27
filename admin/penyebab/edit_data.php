<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
    $dataKode       = $data['kode_penyakit'];
    $dataNama       = isset($_POST['Txt_Nama']) ? $_POST['Txt_Nama'] : $data['nama_penyakit'];
    $dataLatin      = isset($_POST['Txt_Latin']) ? $_POST['Txt_Latin'] : $data['nama_latin'];
    $dataDeskripsi  = isset($_POST['Txt_Deskripsi']) ? $_POST['Txt_Deskripsi'] : $data['deskripsi'];
    $dataSolusi     = isset($_POST['Txt_Solusi']) ? $_POST['Txt_Solusi'] : $data['solusi'];
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
                    <li><a href="index.php?menu=Data_Penyakit">Data Penyakit</a></li>
                    <li class="active">Tambah Data</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data Penyakit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode Penyakit</label>
                                <div class="col-sm-2">
                                    <input type="text" name="Txt_Kode" class="form-control" placeholder="Kode Penyakit" value="<?php echo $dataKode;?>" readonly="readonly"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Penyakit</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Txt_Nama" class="form-control" placeholder="Masukkan Nama Penyakit" value="<?php echo $dataNama;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Latin</label>
                                <div class="col-sm-6">
                                    <input type="text" name="Txt_Latin" class="form-control" placeholder="Masukkan Nama Latin" value="<?php echo $dataLatin;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><small class="text-red">*</small>Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="Txt_Deskripsi" name="Txt_Deskripsi" placeholder="Masukkan Deskripsi Disini..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $dataDeskripsi;?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><small class="text-red">*</small>Solusi</label>
                                <div class="col-sm-8">
                                    <textarea class="Txt_Solusi" name="Txt_Solusi" placeholder="Masukkan Solusi Disini..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $dataSolusi;?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <dl class="help-block dl-horizontal">
                                    <dt><small class="text-red">*</small></dt>
                                    <dd>Shift + Enter untuk pindah baris</dd>
                                    <dd>Enter untuk pindah paragraf</dd>
                                </dl>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="submit" name="Tb_Edit" class="btn btn-primary" value="Edit"/>
                                <a href="?menu=Data_Penyebab" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!--/.col (right) -->
            </section><!-- /.content -->
            
            <?php
                if(isset($_POST['Tb_Edit'])){
                    $TxtKode        = $_POST['Txt_Kode'];
                    $TxtNama        = $_POST['Txt_Nama'];
                    $TxtLatin       = $_POST['Txt_Latin'];
                    $TxtDeskripsi   = $_POST['Txt_Deskripsi'];
                    $TxtSolusi      = $_POST['Txt_Solusi'];
                    
                
                	$pesanError = array();
                    
                	if (trim($TxtKode)=="") {
                		$pesanError[] = "<b>Kode Penyakit</b> Belum Dibuat !";			
                	}
                    if (trim($TxtNama)=="") {
                		$pesanError[] = "<b>Nama Penyakit</b> Masih Kosong !";			
                	}
                    if (trim($TxtLatin)=="") {
                		$pesanError[] = "<b>Nama Latin Penyakit</b> Masih Kosong !";			
                	}
                    if (trim($TxtSolusi)=="") {
                		$pesanError[] = "<b>Solusi</b> Masih Kosong !";			
                	}
               		
                	if (count($pesanError)>=1 ){
                        $TxtKode        = $_POST['Txt_Kode'];
                        $TxtNama        = $_POST['Txt_Nama'];
                        $TxtLatin       = $_POST['Txt_Latin'];
                        $TxtDeskripsi   = $_POST['Txt_Deskripsi'];
                        $TxtSolusi      = $_POST['Txt_Solusi']
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
                        $dataKode       = $data['kode_penyakit'];
                        
                        $mySql	= "UPDATE tbl_penyakit SET nama_penyakit = '$TxtNama',
                                                            nama_latin = '$TxtLatin',
                                                            deskripsi = '$TxtDeskripsi',
                                                            solusi = '$TxtSolusi' where kode_penyakit = '$TxtKode'";
                                                            
                		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
                		
                        echo "<script>alert('Data Berhasil Diubah!');</script>";    		
                		echo "<meta http-equiv='refresh' content='0; url=index.php?menu=Data_Penyakit'>";
                		exit;
                	}
                }
            ?>
            
        </div><!-- /.content-wrapper -->
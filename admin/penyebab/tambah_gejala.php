<?php
  error_reporting(0);
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $query = mysql_query("select * from tbl_penyebab,tbl_penyakit where tbl_penyebab.kode_penyakit = tbl_penyakit.kode_penyakit and tbl_penyebab.kode_penyakit = '$id'");
      $data = mysql_fetch_array($query);
    }
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
                    <li><a href="index.php?menu=Data_Penyebab">Data Penyebab</a></li>
                    <li><a href="index.php?menu=Detail_Penyebab&id=<?php echo $data['kode_penyakit'];?>">Penyebab <?php echo $data['kode_penyakit']?></a></li>
                    <li class="active">Tambah Gejala</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header">
                      <h3>Tambah Gejala Kerusakan <?php echo $data['nama_penyakit'];?></h3>
                      <h4>Daftar Gejala</h4>
                    </div><!-- /.box-header -->
                    <form method="post">
                    <div class="box-body">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px;"><input type="checkbox" class="flat-red" disabled="disabled"/></th>
                            <th style="width: 100px; text-align: center;">Kode Gejala</th>
                            <th style="text-align: center;">Nama Gejala</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $mqry = mysql_query("select * from tbl_gejala order by kode_gejala");
                                while($data = mysql_fetch_array($mqry)){
                                    $mrelasi = mysql_query("select * from tbl_penyebab where kode_penyakit = '$id' and kode_gejala = '".$data['kode_gejala']."'");
                                    $cocok = mysql_num_rows($mrelasi);
                                    if($cocok == 1){
                                        $cek = "checked";
                                    }else{
                                        $cek = "";
                                    }
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="flat-red" name="CekGejala[]" value="<?php echo $data['kode_gejala'];?>" <?php echo $cek;?>/></td>
                                    <td><?php echo $data['kode_gejala'];?></td>
                                    <td><?php echo $data['nama_gejala'];?></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                      </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div>
                            <input type="submit" name="Tb_Simpan" class="btn btn-primary" value="Simpan"/>
                            <a href="?menu=Data_Penyebab" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </div><!-- /.box-footer -->
                    </form>
              </div><!-- /.box -->
            </section>
            
            <?php
                if(isset($_POST['Tb_Simpan'])){
                    $CekGejala = $_POST['CekGejala'];
                    
                    $jum = count($CekGejala);
                    if ($jum == 0){
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
                                        <label>Gejala Belum Dipilih.</label>
                                    </div><!-- /.box-body -->
                                </form>
                            </div><!--/.col (right) -->
                        </section><!-- /.content -->
                        <?php
                	}
                	else {
                        $sqlpil = "SELECT * FROM tbl_penyebab WHERE kode_penyakit='$id'";
                        $qrypil = mysql_query($sqlpil);
                        while ($datapil=mysql_fetch_array($qrypil)){
                            for ($i = 0; $i < $jum; ++$i) {
                                if ($datapil['kode_gejala'] != $CekGejala[$i]) {
                                    $sqldel  = "DELETE FROM tbl_penyebab WHERE kode_penyakit='$id' AND NOT kode_gejala IN ('$CekGejala[$i]')";
                                    mysql_query($sqldel);
                                }
                            }
                        }
                        
                        for ($i = 0; $i < $jum; ++$i) {		
                            $sqlr  = "SELECT * FROM tbl_penyebab WHERE kode_penyakit='$id' AND kode_gejala='$CekGejala[$i]'";
                            $qryr  = mysql_query($sqlr, $koneksi);
                            $cocok = mysql_num_rows($qryr);
                            
                            if (! $cocok==1) {
                                $sql  = "INSERT INTO tbl_penyebab(id,kode_penyakit,kode_gejala) VALUES ('','$id','$CekGejala[$i]')";
                                mysql_query($sql, $koneksi) or die ("SQL Input Relasi Gagal ".mysql_error());
                            }
                        }			
                        echo "<script>alert('Data Berhasil Disimpan!');</script>";    		
                		?>
                            <meta http-equiv='refresh' content='0; url="index.php?menu=Data_Penyebab";'/>
                		<?php
                        exit;
                    }
                }
            ?>
            
        </div>
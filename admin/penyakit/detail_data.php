<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
    $dataKode       = $data['kode_penyakit'];
    $dataNama       = $data['nama_penyakit'];
    $dataLatin      = $data['nama_latin'];
    $dataDeskripsi  = $data['deskripsi'];
    $dataSolusi     = $data['solusi'];
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
                    <li><a href="index.php?menu=Data_Penyakit">Data Kerusakan</a></li>
                    <li class="active">Detail Data</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Data Kerusakan</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="dl-horizontal">
                                <dt>Kode Kerusakan :</dt>
                                    <dd><?php echo $dataKode;?></dd>
                                <dt>Nama Kerusakan :</dt>
                                    <dd><?php echo $dataNama;?></dd>
                                <!--<dt>Nama Latin Kerusakan :</dt>
                                    <dd><i><?php echo $dataLatin;?></i></dd>-->
                                <dt>Deskripsi :</dt>
                                    <dd><?php echo ($dataDeskripsi);?></dd>
                                <dt>Solusi :</dt>
                                    <dd><?php echo ($dataSolusi);?></dd>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-2">
                                 <a href="index.php?menu=Edit_Penyakit&act=edit&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a href="index.php?menu=Edit_Penyakit&act=delete&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-danger" onclick="return confirm('Yakin Menghapus Data Kode Penyakit <?php echo $data['kode_penyakit'];?> dan Nama Penyakit <?php echo $data['nama_penyakit'];?> ?');"><i class="fa fa-trash"></i> Hapus</a> 
                                <a href="?menu=Data_Penyakit" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!--/.col (right) -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
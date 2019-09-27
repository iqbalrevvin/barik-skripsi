<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  
    $dataKode       = $data['kode_penyakit'];
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
                    <li class="active">Detail Data</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Data Penyakit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="dl-horizontal">
                                <?php
                                    $mque = mysql_query("select * from tbl_penyakit where kode_penyakit = '$dataKode'");
                                    while($res = mysql_fetch_array($mque)){
                                ?>
                                <dt>Kode Penyakit :</dt>
                                    <dd><?php echo $res['kode_penyakit'];?></dd>
                                <dt>Nama Penyakit :</dt>
                                    <dd><?php echo $res['nama_penyakit'];?></dd>
                                <!--<dt>Nama Latin Penyakit :</dt>
                                    <dd><?php echo $res['nama_latin']?></dd>-->
                                <dt>Deskripsi :</dt>
                                    <dd><?php echo strip_tags($res['deskripsi']);?></dd>
                                <dt>Solusi :</dt>
                                    <dd><?php echo strip_tags($res['solusi']);?></dd>
                                <dt>Gejala :</dt>
                                    <?php
                                        $mqry = mysql_query("select * from tbl_gejala, tbl_penyebab, tbl_penyakit where tbl_penyebab.kode_penyakit = tbl_penyakit.kode_penyakit and tbl_penyebab.kode_gejala = tbl_gejala.kode_gejala and tbl_penyebab.kode_penyakit = '$dataKode'");
                                        $r_mqry = mysql_num_rows($mqry);
                                        if($r_mqry == 0){
                                            echo "<dd class='text-red'>Gejala belum ditambahkan</dd>";
                                        }else{
                                            while($result = mysql_fetch_array($mqry)){
                                    ?>
                                                <dd><i class='fa fa-arrow-circle-o-right'></i> <a href="index.php?menu=Delete_Penyebab&detail=<?php echo $dataKode;?>&id=<?php echo $result['id'];?>"><span style='color: red;' onclick="return confirm('Yakin Menghapus Data Gejala <?php echo $result['nama_gejala']."&nbsp;(".$result['kode_gejala'];?>) ?');"><i class='fa fa-remove '></i></span></a> <?php echo $result['nama_gejala'];?></dd>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <dd><a href="index.php?menu=Add_Gejala&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Gejala</a></dd>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6">
                                <a href="?menu=Data_Penyebab" class="btn btn-danger pull-right"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!--/.col (right) -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
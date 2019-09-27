<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
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
                    <small>Versi Skripsi Sistem Pakar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Data Gejala</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                
                <?php
                  if(isset($_GET['page'])){
                    echo "<div class='box-body'>";
                    if($_GET['page']=='error'){
                      $id = $_GET['id'];
                      $mqry = mysql_query("select * from tbl_gejala where kode_gejala = '$id'");
                      $res = mysql_fetch_array($mqry);
                ?>
                    
                      <div class="alert alert-danger">
                        <h4><i class="icon fa fa-ban"></i> PERINGATAN!</h4>
                        Tidak Dapat Menghapus Data <?php echo $res['nama_gejala'];?> ( <?php echo $res['kode_gejala'];?> )
                      </div>
                  <?php
                    }elseif($_GET['page']=='success'){
                  ?>
                    <div class="alert alert-success">
                      <h4>	<i class="icon fa fa-check"></i> SUKSES!</h4>
                      Data Berhasil Dihapus!
                    </div>
                  <?php
                    }
                    echo "</div><!-- /.box-body -->";
                  }
                ?>
                
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Tabel Data Gejala</h3>
                       <a href="index.php?menu=Tambah_Gejala" class="btn btn-flat btn-info pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px;">No.</th>
                            <th style="width: 100px; text-align: center;">Kode Gejala</th>
                            <th style="text-align: center;">Nama Gejala</th>
                            <!-- <th style="width: 150px; text-align: center;">Operasi</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $mqry = mysql_query("select * from tbl_gejala order by kode_gejala");
                                while($data = mysql_fetch_array($mqry)){
                            ?>
                                <tr>
                                    <td><?php echo $no++;?>.</td>
                                    <td><?php echo $data['kode_gejala'];?></td>
                                    <td><?php echo $data['nama_gejala'];?></td>
                                     <td style="text-align: center;">
                                        <a href="index.php?menu=Edit_Gejala&act=edit&id=<?php echo $data['kode_gejala'];?>" class="btn btn-flat btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <a href="index.php?menu=Edit_Gejala&act=delete&id=<?php echo $data['kode_gejala'];?>" class="btn btn-flat btn-danger" onclick="return confirm('Yakin Menghapus Data Kode Gejala <?php echo $data['kode_gejala'];?> ?');"><i class="fa fa-trash"></i> Hapus</a>
                                    </td> 
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                      </table>
                      <a href="report_gejala.php" class="btn btn-flat btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section>
        </div>
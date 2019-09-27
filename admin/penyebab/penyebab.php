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
                    Sistem Pakar Pengobatan Homeopathy
                    <br />
                    <small>Versi Skripsi Sistem Pakar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Data Penyebab</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                
            <?php
                if(isset($_GET['page'])){
                    echo "<div class='box-body'>";
                    if($_GET['page']=='success'){
            ?>
                        <div class="alert alert-success">
                            <h4>  <i class="icon fa fa-check"></i> SUKSES!</h4>
                            Data Berhasil Dihapus!
                        </div>
            <?php
                    }
                    echo "</div>";
                }
            ?>

                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Tabel Data Penyebab</h3>
                      <a href="index.php?menu=Tambah_Penyebab" class="btn btn-flat btn-info pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px;">No.</th>
                            <th style="width: 100px; text-align: center;">Kode Penyakit</th>
                            <th style="text-align: center;">Nama Penyakit</th>
                            <!--<th style="text-align: center;">Nama Lain Penyakit</th>-->
                            <th style="width: 150px; text-align: center;">Operasi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $mqry = mysql_query("select * from tbl_penyebab,tbl_penyakit where tbl_penyebab.kode_penyakit = tbl_penyakit.kode_penyakit group by tbl_penyebab.kode_penyakit");
                                while($data = mysql_fetch_array($mqry)){
                            ?>
                                <tr>
                                    <td><?php echo $no++;?>.</td>
                                    <td><a href="index.php?menu=Detail_Penyebab&act=view&id=<?php echo $data['kode_penyakit'];?>"><?php echo $data['kode_penyakit'];?></a></td>
                                    <td><a href="index.php?menu=Detail_Penyebab&act=view&id=<?php echo $data['kode_penyakit'];?>"><?php echo $data['nama_penyakit'];?></a></td>
                                    <<!--<td><i><?php echo $data['nama_latin'];?></i></td>-->
                                    <td style="text-align: center;">
                                        <a href="index.php?menu=Detail_Penyebab&act=view&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-info"><i class="fa fa-eye"></i> Detail</a>
                                        <a href="index.php?menu=Hapus_Penyebab&act=delete&id=<?php echo $data['kode_penyakit'];?>" onclick="return confirm('Yakin akan menghapus data ini ?');" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                      </table>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section>
        </div>
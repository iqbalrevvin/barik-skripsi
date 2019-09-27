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
                    <li class="active">Data Laporan Diagnosa</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Tabel Laporan Diagnosa</h3>
<!--                        <a href="index.php?menu=Tambah_Penyakit" class="btn btn-flat btn-info pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a> -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px;">No.</th>
                            <th style="width: 100px; text-align: center;">Nama Pasien</th>
                            <th style="text-align: center;">Usia</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Apa Yang Dirasakan</th>
                            <th style="text-align: center;">Kode Penyakit</th>
                            <!--<th style="text-align: center;">Nama Lain Penyakit</th>-->
                            <!-- <th style="width: 220px; text-align: center;">Operasi</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $mqry = mysql_query("select * from analisa_hasil order by nama_pasien");
                                while($data = mysql_fetch_array($mqry)){
                            ?>
                                <tr>
                                    <td><?php echo $no++;?>.</td>
                                    <td><?php echo $data['nama_pasien'];?></td>
                                    <td><?php echo $data['usia'];?></td>
                                    <td><?php echo $data['kelamin'];?></td>
                                    <td><?php echo $data['alamat'];?></td>
                                    <td><?php echo $data['apa_yang_dirasakan'];?></td>
                                    <td><a href='index.php?menu=Edit_Penyakit&act=detail&id=<?= $data['kode_penyakit'] ?>'><?php echo $data['kode_penyakit'];?></a></td>
                                    <!--<td><i><?php echo $data['nama_latin'];?></i></td>-->
                                    <!-- <td style="text-align: center;">
                                        <a href="index.php?menu=Edit_Penyakit&act=detail&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-info"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                                         <a href="index.php?menu=Edit_Penyakit&act=edit&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <a href="index.php?menu=Edit_Penyakit&act=delete&id=<?php echo $data['kode_penyakit'];?>" class="btn btn-flat btn-danger" onclick="return confirm('Yakin Menghapus Data Kode Penyakit <?php echo $data['kode_penyakit'];?> dan Nama Penyakit <?php echo $data['nama_penyakit'];?> ?');"><i class="fa fa-trash"></i> Hapus</a>
                                    </td> -->
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                      </table>
                      <a href="laporan/cetak_laporan_diagnosa.php" class="btn btn-flat btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section>
        </div>
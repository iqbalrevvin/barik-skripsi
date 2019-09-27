<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Super Admin"){
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
            <small>versi Tugas Sistem Pakar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Administrator</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <?php
            if(isset($_GET['pesan'])){
              echo "<div class='box-body'>";
              if($_GET['pesan']=='success'){
            ?>
            
            <div class="alert alert-success">
              <h4><i class="icon fa fa-check"></i> SUKSES!</h4>
            
            <?php
              if(isset($_GET['isi'])){
                if($_GET['isi']=='1'){
                  echo "Data Berhasil Disimpan!";
                }elseif($_GET['isi']=='2'){
                  echo "Data Berhasil Dihapus!";
                }
              }
            ?>
            
            </div>
              <?php
              }
              echo "</div><!-- /.box-body -->";
            }
          ?>

          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Administrator</h3>
              <a href="index.php?menu=Tambah_Administrator" class="btn btn-flat btn-info pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px;">No.</th>
                    <th style="width: 100px; text-align: center;">Kode Administrator</th>
                    <th style="text-align: center;">Nama Administrator</th>
                    <th style="text-align: center;">Username</th>
                    <th style="text-align: center;">Tanggal Daftar</th>
                    <th style="text-align: center;">Hak Akses</th>
                    <th style="width: 100px; text-align: center;">Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = mysql_query("select * from tbl_pengguna order by tgl_daftar asc");
                    $i=1;
                    while($data = mysql_fetch_array($sql)){
                  ?>

                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $data['kode_pengguna'];?></td>
                    <td><?php echo $data['nama_pengguna'];?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo IndonesiaTgl($data['tgl_daftar']);?></td>
                    <td><?php echo $data['hak_akses'];?></td>
                    <td align="center">
                    <button onclick="confirm_modal('index.php?menu=Delete_Administrator&id=<?php echo $data['kode_pengguna'];?>');" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> Hapus</button></td>
                  </tr>

                  <?php
                    }
                  ?>

                </tbody>
              </table>
              <a href="report_admin.php" class="btn btn-flat btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </section>
      </div>

      <div class="modal fade" id="modal_delete">
        <div class="modal-dialog" style="width: 300px; top: 150px;">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <h4 class="modal-title" style="text-align:center;"><b>K O N F I R M A S I</b></h4>
            </div>
            <div class="modal-body">
              Yakin menghapus data ini?
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-success pull-left" id="delete_link"><i class="fa fa-check"></i> Ya</a>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        function confirm_modal(hapus_data){
          $('#modal_delete').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href',hapus_data);
        }
      </script>
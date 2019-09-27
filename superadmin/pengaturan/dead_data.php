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
            <li class="active">Deskripsi Admin</li>
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
              <h3 class="box-title">Deskripsi Administrator</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px;">No.</th>
                    <th style="text-align: center;">Deskripsi</th>
                    <th style="width: 100px; text-align: center;">Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = mysql_query("select * from tbl_deskripsi");
                    $i=1;
                    while($data = mysql_fetch_array($sql)){
                  ?>

                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $data['des_admin'];?></td>
                    <td align="center">
                      <a href="index.php?menu=Edit_Deskripsi_Admin&id=<?php echo $data['id'];?>" class="btn btn-flat btn-success open-modal"><i class="fa fa-edit"></i> Ubah</button>
                    </td>
                  </tr>

                  <?php
                    }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
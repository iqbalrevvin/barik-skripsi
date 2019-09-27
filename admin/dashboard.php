<?php
	if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
		echo '<script language="javascript">alert("Anda belum login");</script>';
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
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
                    Sistem Pakar Diganosa Penyakit
                    <br />
                    <small>Versi Skripsi Sistem Pakar</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deskripsi</h3>
                    </div>
                    <div class="box-body">
                        <?php
                          $sql = mysql_query("select * from tbl_deskripsi");
                          $deskripsi = mysql_fetch_array($sql);
                          echo $deskripsi['des_admin'];
                        ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
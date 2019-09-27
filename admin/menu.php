<?php
	if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
		echo '<script language="javascript">alert("Anda belum login");</script>';
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
		exit;
	}else if($_SESSION['hak_akses']!="Administrator"){
		echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	}
?>

    <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/Unknown.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <p><?php echo $data['nama_pengguna'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="../index.php"><i class="fa fa-home"></i> <span>Sistem Pakar</span></i></a></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></i></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?menu=Data_Penyakit"><i class="fa fa-circle-o"></i> Penyakit</a></li>
                <li><a href="index.php?menu=Data_Gejala"><i class="fa fa-circle-o"></i> Gejala</a></li>
                <li><a href="index.php?menu=Data_Penyebab"><i class="fa fa-circle-o"></i> Penyebab</a></li>
              </ul>
            </li>
            <li><a href="index.php?menu=Laporan_Diagnosa"><i class="fa fa-file"></i> <span>Laporan Diagnosa</span></i></a></li>
            <li><a href="index.php?menu=Basis_Pengetahuan"><i class="fa fa-database"></i> <span>Basis Pengetahuan</span></i></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
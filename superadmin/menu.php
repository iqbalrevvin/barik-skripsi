<?php
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
    echo '<script language="javascript">alert("Anda belum login");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    exit;
  }else if($_SESSION['hak_akses']!="Super Admin"){
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
            <li><a href="index.php?menu=Data_Administrator"><i class="fa fa-group"></i> <span>Data Administrator</span></i></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gear"></i>
                <span>Pengaturan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?menu=Judul"><i class="fa fa-circle-o"></i> Judul</a></li>
                <li><a href="index.php?menu=Desk_Utama"><i class="fa fa-circle-o"></i> Deskripsi Utama</a></li>
                <li><a href="index.php?menu=Desk_Admin"><i class="fa fa-circle-o"></i> Deskripsi Administrator</a></li>
                <li><a href="index.php?menu=Desk_Superadmin"><i class="fa fa-circle-o"></i> Deskripsi Super Admin</a></li>
                <!-- <li><a href="index.php?menu=Update_Profile"><i class="fa fa-circle-o"></i> Ubah Profile</a></li>
                <li><a href="index.php?menu=Update_Password"><i class="fa fa-circle-o"></i> Ubah Password</a></li> -->
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
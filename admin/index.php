<?php
    session_start();
    include "../libs/koneksi.php";
    include "../libs/library.php";
    
    if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
        echo '<script language="javascript">alert("Anda belum login");</script>';
        echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
        exit;
    }else if($_SESSION['hak_akses']!="Administrator"){
        echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
    }else{
        $kode      = $_SESSION['kode'];
        $hak_akses = $_SESSION['hak_akses'];
        
        $query = mysql_query("select * from tbl_pengguna where kode_pengguna = '$kode'");
        $data = mysql_fetch_array($query);
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Sistem Pakar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bootstrap/ionicons/css/ionicons.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css"/>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css"/>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css"/>
    
    <link rel="icon" type="image/png" sizes="32x32" href="../home/images/favicon-32x32.png"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>dm</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Administrator</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/Unknown.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $data['nama_pengguna'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/Unknown.png" class="img-circle" alt="User Image"/>
                    <p>
                      <?php echo $data['nama_pengguna'];?>
                      <small>Member sejak [ <?php echo IndonesiaTgl($data['tgl_daftar']);?> ]</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php?menu=Profile" class="btn btn-info btn-flat"><i class="fa fa-info-circle"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="index.php?menu=Logout" class="btn btn-danger btn-flat"><i class="fa fa-power-off"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <?php include "menu.php";?>

      <!-- =============================================== -->

      <?php include "openfile.php";?>
      
      <!-- =============================================== -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> Skripsi Sistem Pakar
        </div>
        <strong>Copyright &copy; 2018 <a href="#">M. Iqbal | 1406082</a>.</strong> All rights reserved.
      </footer>
      
      <!-- =============================================== -->
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <!-- Page Script -->
    <script>
      $(function() {
        $(".Txt_Deskripsi").wysihtml5();
        $(".Txt_Solusi").wysihtml5();
        $('#example2').DataTable();
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green'
        });
      });  
    </script>
  </body>
</html>
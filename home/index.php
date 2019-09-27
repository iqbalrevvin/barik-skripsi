<?php
  session_start();
  include "../libs/koneksi.php";
  include "../libs/library.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="msapplication-tap-highlight" content="no"/>
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. "/>
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,"/>
  <title>Sistem Pakar</title>
  
  <!-- Favicons-->
  <link rel="icon" href="images/favicon-32x32.png" sizes="32x32"/>
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png"/>
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4"/>
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png"/>
  <!-- For Windows Phone -->
  
  <!-- CORE CSS-->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <!-- Start Page Loading -->
  <!-- <div id="loader-wrapper">
    <div id="loader"></div>        
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div> -->
  <!-- End Page Loading -->
  
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  
  <!-- START HEADER -->
  <header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
      <nav class="green">
      <div class="nav-wrapper">
        <h1 class="logo-wrapper">
          <a href="index.php" class="brand-logo darken-1"><img src="images/sistem-pakar.png" alt="Sistem Pakar Logo"/></a> <span class="logo-text">Sistem Pakar</span>
        </h1>
      </div>
      </nav>
    </div>
    <!-- end header nav-->
  </header>
  <!-- END HEADER -->
  
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
    
      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed">
          <?php
            if(isset($_SESSION['kode']) && isset($_SESSION['hak_akses'])){
              $kode      = $_SESSION['kode'];
              $hak_akses = $_SESSION['hak_akses'];
              $query = mysql_query("select * from tbl_pengguna where kode_pengguna = '$kode'");
              $data = mysql_fetch_array($query);
              $login = "";
          ?>
          
          <?php
            }else{
              echo "<li class='user-details cyan darken-2'><div class='row'>&nbsp;</div></li>";
              $login = "<li class='bold'><a href='../login.php' class='waves-effect waves-block waves-light'><i class='mdi-action-lock-outline'></i> Login Administrator</a></li>";
            }
          ?>          
          <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-action-home"></i> Home</a></li>
          <!--<li class="bold"><a href="index.php?menus=Data_Penyakit" class="waves-effect waves-cyan"><i class="mdi-action-list"></i> Kerusakan</a></li>-->
          <li class="bold">
            <a href="index.php?menus=Diagnosa" class="waves-effect waves-cyan">
              <i class="mdi-action-assignment-turned-in"></i> Konsultasi
            </a>
          </li>
          <li class="bold">
            <a href="index.php?menus=Petunjuk" class="waves-effect waves-cyan">
              <i class="mdi-action-book"></i> Petunjuk
            </a>
          </li>

          <!-- <li class="bold"><a href="index.php?menus=Video" class="waves-effect waves-cyan"><i class="mdi-av-videocam"></i> Video Perawatan</a></li> -->
          <li class="bold"><a href="index.php?menus=About" class="waves-effect waves-cyan"><i class="mdi-action-account-box"></i> About</a></li>
          <?php 
            error_reporting(0);
            if ($hak_akses == "Administrator") { 
          ?>
          <li class='bold'>
            <a href='../admin' class='waves-effect waves-block waves-light'>
              <i class='mdi-action-lock-outline'></i> 
              Administrator
            </a>
          </li>
          <li><a href="index.php?menus=Logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a></li>
          <?php }else{ echo $login; } ?>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
      </aside>
      <!-- END LEFT SIDEBAR NAV-->
      
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      
      <!-- START CONTENT -->
      <section id="content">
      
        <!--start container-->
        <div class="container">
          <div id="basic-form" class="section">
          
            <div class="col s12 m12 20">
              <div class="row">
                
                <?php include "openfile.php";?>
                
              </div>
            </div>
          
          </div>
        
        </div>
        <!--end container-->
      
      </section>
      <!-- END CONTENT -->
    
    </div>
    <!-- END WRAPPER -->
  
  </div>
  <!-- END MAIN -->
  
  
  
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  
  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>System Copyright &copy; 2019 <a class="grey-text text-lighten-4" href="#">Mubarik Achmad | 1406075</a>. All rights reserved.</span>
        <!--<span class="right"> Design Template Materialize by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>-->
      </div>
    </div>
  </footer>
  <!-- END FOOTER -->
  
  
  
  <!-- ================================================
  Scripts
  ================================================ -->
  
  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- data-tables -->
  <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
  <!-- chartist -->
  <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>    
</body>

</html>
<?php
  session_start();
  
  $dataUser = isset($_POST['Txt_User']) ? $_POST['Txt_User'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="msapplication-tap-highlight" content="no"/>
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. "/>
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,"/>
  <title>Login Administrator</title>

  <!-- Favicons-->
  <link rel="icon" href="home/images/favicon-32x32.png" sizes="32x32"/>
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="home/images/favicon/apple-touch-icon-152x152.png"/>
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4"/>
  <meta name="msapplication-TileImage" content="home/images/favicon/mstile-144x144.png"/>
  <!-- For Windows Phone -->

  <!-- CORE CSS-->
  <link href="home/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="home/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="home/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="home/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="home/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <div id="login-page" class="row">
    <div class="col s12 z-depth-2 card-panel">
      
      <form class="login-form" method="post" action="login.php">
        <div class="row">
          <div class="input-field col s12 center">
            <a href="index.php"><img src="home/images/sp-logo.png" alt="" class="circle responsive-img valign profile-image-login"/></a>
            <p class="center login-form-text">Login Administrator</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="Txt_User" id="username" type="text" value="<?php echo $dataUser;?>"/>
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="Txt_Pass" id="password" type="password"/>
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button name="Tb_Validasi" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="index.php"><i class="mdi-action-launch"></i> Sistem Pakar</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#">Lupa Password</a></p>
          </div>          
        </div>
        
        <?php include "libs/validasi.php" ?>
        
      </form>
      
    </div>
  </div>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="home/js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="home/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="home/js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="home/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="home/js/plugins.js"></script>

</body>

</html>
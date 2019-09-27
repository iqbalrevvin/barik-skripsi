<?php

  unset($_SESSION['kode']);
  unset($_SESSION['hak_akses']);
  
  session_unset();
  session_destroy();
  
  echo "<meta http-equiv='refresh' content='0; url=../login.php'>";

/**
 * @author IqbalRevvin
 * @copyright 2016
 */

?>
<?php

$my['host'] = "localhost";
$my['user'] = "root";
$my['pass'] = "";
$my["data"] = "sp_hf";

$koneksi    = mysql_connect($my['host'],$my['user'],$my['pass']);

if(!$koneksi){
    echo "GAGAL KONEKSI DATA SERVER...!!! HARAP HUBUNGI ADMINISTRATOR...!!! ";
    mysql_error();
}

mysql_select_db($my['data']) or die("Tidak Ada Database...!!! ".mysql_error());

/**
 * @author IqbalRevvin
 * @copyright 2016
 */

?>
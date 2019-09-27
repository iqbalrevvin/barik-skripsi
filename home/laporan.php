<?php

include "../libs/koneksi.php";

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Hasil Analisa'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10, 'Tahoma'); // Membuat file mpdf baru

//Memulai proses untuk menyimpan variabel php dan html
ob_start();

$NoIP = $_SERVER['REMOTE_ADDR'];

$sql = mysql_query("select ah.*,skt.* from analisa_hasil ah,tbl_penyakit skt where ah.kode_penyakit = skt.kode_penyakit and ah.noip = '$NoIP' order by ah.id desc limit 1") or die("GAGAL EKSEKUSI DATA. ERROR : ".mysql_error());
$data = mysql_fetch_array($sql);

?>
 
<html>

<head>
  <title>Laporan Hasil Analisa</title>
</head>
<body>
  <table>
    <tr>
      <td align="justify">
        
        <table>
          <tr>
            <td><img src="images/sp-detail.png" style="width: 50px;"/></td>
            <td align="center"><h1>Sistem Pakar Diagnosa Kerusakan AC</h1></td>
          </tr>
        </table>
        
        <hr/>
        <br />
        
        <!-- <table border="1" cellpadding="2" cellspacing="2" style="width: 700px; border-collapse: collapse; text-align: justify;"> -->
        <table cellpadding="2" cellspacing="2">
          <tr>
            <td colspan="2" align="center"><h3><ins>Laporan Hasil Analisa Diagnosa Kerusakan AC</ins></h3></td>
          </tr>
          <tr>
            <td colspan="2">Berdasarkan diagnosa yang dikumpulkan bahwa sistem menyimpulkan :</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td width="100">Nama Pendiagnosa</td>
            <td>: <?php echo $data['nama_pasien'];?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>: <?php echo $data['kelamin'];?></td>
          </tr>
          <tr>
            <td>Alamat Pendiagnosa</td>
            <td>: <?php echo $data['alamat'];?></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <h5>Nama Kerusakan : </h5>
              <h1 style="color: red;"><?php echo $data['nama_penyakit'];?></h1>
              <!--<h5> <i><?php echo $data['nama_latin'];?></i> </h5>-->
            </td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Keterangan Kerusakan :</strong></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <h3>Deskripsi Kerusakan :</h3>
              <p><?php echo $data['deskripsi'];?></p>
            </td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <h3>Gejala Kerusakan :</h3>
              <?php
                $sql_gejala = mysql_query("select gjl.* from tbl_gejala gjl, tbl_penyebab sb where sb.kode_gejala = gjl.kode_gejala and sb.kode_penyakit = '$data[kode_penyakit]'");
                $i = 0;
                while($hasil = mysql_fetch_array($sql_gejala)){
                  $i++;
                  echo $i.". ".$hasil['nama_gejala']."<br/>";
                }
              ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <h3>Solusi</h3>
              <p><?php echo $data['solusi'];?></p>
            </td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <!-- <table border="1" cellpadding="2" cellspacing="2" style="border-collapse: collapse; text-align: justify;"> -->
              <table cellpadding="2" cellspacing="2">
                <tr>
                  <td width="500">&nbsp;</td>
                  <td style="text-align: center; float: right;"><p>Approved By</p></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="text-align: center; float: right;">
                    <p class="header">Arief Rachman, S.T</p>
                    <hr />
                    <p>Pakar AC</p>
                  </td>
                </tr>
                
              </table>
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>  
</body>

</html>
 
<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
 
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;

/**
 * @author Phantom
 * @copyright 2016
 */

?>
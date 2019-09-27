<?php
  session_start();
  include "../libs/koneksi.php";
  include "../libs/library.php";
  
  if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
      echo '<script language="javascript">alert("Anda belum login");</script>';
      echo "<meta http-equiv='refresh' content='0; url=index.php'>";
      exit;
  }else if($_SESSION['hak_akses']!="Administrator"){
      echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  }

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Data Penyakit'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10, 'Tahoma'); // Membuat file mpdf baru

//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>

  <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse;">
    <tr>
      <td>
      
        <table>
          <tr>
            <td><img src="../home/images/sp-detail.png" style="width: 50px;"/></td>
            <td align="center"><h1>SISTEM PAKAR DIAGNOSA KERUSAKAN AC</h1></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr>
      <td>
        <hr/>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">
        <h3><ins>Laporan Data Kerusakan</ins></h3>
      </td>
    </tr>
    <tr>
      <td align="center">
      
        <table border="1" cellpadding="2" cellspacing="2" style="text-align: justify; width: 700px; border-collapse: collapse;">
          <thead>
            <tr>
              <th style="width: 30px;">No.</th>
              <th style="width: 70px; text-align: center;">Kode Kerusakan</th>
              <th style="text-align: center;">Nama Kerusakan</th>
              <!--<th style="text-align: center;">Nama Latin Penyakit</th>-->
            </tr>
          </thead>
          <tbody>
              <?php
                  $no = 1;
                  $mqry = mysql_query("select * from tbl_penyakit order by kode_penyakit");
                  while($data = mysql_fetch_array($mqry)){
              ?>
                  <tr>
                      <td><?php echo $no++;?>.</td>
                      <td style="padding-left: 5px;"><?php echo $data['kode_penyakit'];?></td>
                      <td style="padding-left: 5px;"><?php echo $data['nama_penyakit'];?></td>
                      <!--<td style="padding-left: 5px;"><i><?php echo $data['nama_latin'];?></i></td>-->
                  </tr>
              <?php
                  }
              ?>
          </tbody>
        </table>

      </td>
    </tr>
  </table>
 
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
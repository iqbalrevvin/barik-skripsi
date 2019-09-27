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
$nama_dokumen='Laporan Data Gejala'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10, 'Tahoma'); // Membuat file mpdf baru

//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>
 
  <h1 style="text-align: center;">SISTEM PAKAR DIAGNOSA KERUSAKAN AC</h1>
  <hr/>
  <br />
  <h3 style="text-align: center;"><ins>Laporan Data Gejala</ins></h3>
  <table border="0" cellpadding="2" cellspacing="2" style="width: 700px; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width: 30px;">No.</th>
        <th style="width: 70px; text-align: center;">Kode Gejala</th>
        <th style="text-align: center;">Nama Gejala</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $mqry = mysql_query("select * from tbl_gejala order by kode_gejala");
            while($data = mysql_fetch_array($mqry)){
        ?>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td style="padding-left: 5px;"><?php echo $data['kode_gejala'];?></td>
                <td style="padding-left: 5px;"><?php echo $data['nama_gejala'];?></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
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
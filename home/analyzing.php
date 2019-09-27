<?php
error_reporting(0);

$Rad_Pilih      = $_REQUEST['Rd_Pilih'];
$TxtKode_Gejala = $_REQUEST['TxtKode_Gejala'];

$pesanError = array();

if(empty($Rad_Pilih)){
    $pesanError[] = "<b>Jawaban</b> Belum Dipilih.";
    
    if (count($pesanError)>=1 ){
      $Rad_Pilih = $_REQUEST['Rd_Pilih'];
			
      include "analist.php";
		?>
                  <div class="col s12 m12">
                    <ul id="projects-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-action-report-problem circle red accent-4"></i>
                            <h5><span class="collection-header">ERROR</span></h5>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s12">
                                  <p class="collections-content">
                        
                        <?php
                			$noPesan=0;
                      foreach ($pesanError as $indeks=>$pesan_tampil) { 
                			$noPesan++;
                				echo "$noPesan. $pesan_tampil<br>";	
                			}
                        ?>
                                  </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                        <?php
        }
}else{
    $NoIP = $_SERVER['REMOTE_ADDR'];
    
    function AddTmpAnalisa($kdgejala,$ip){
        $sql_sakit = mysql_query("select sb.* from tbl_penyebab sb,tmp_penyakit tsk where sb.kode_penyakit = tsk.kode_penyakit and tsk.noip = '$ip' order by sb.kode_penyakit,sb.kode_gejala");
        while($datasakit = mysql_fetch_array($sql_sakit)){
            $sql_tmp = mysql_query("INSERT INTO tmp_analisa(noip,kode_penyakit,kode_gejala)VALUES('$ip','$datasakit[kode_penyakit]','$datasakit[kode_gejala]')");
        }
    }
    
    function AddTmpGejala($kdgejala,$ip){
        $sql_gejala = mysql_query("INSERT INTO tmp_gejala(noip,kode_gejala)VALUES('$ip','$kdgejala')");
    }
    
    function DelTmpSakit($ip){
        $sql_del = mysql_query("delete from tmp_penyakit where noip = '$ip'");
    }
    
    function DelTmpAnalisa($ip){
        $sql_del = mysql_query("delete from tmp_analisa where noip = '$ip'");
    }
    
    if($Rad_Pilih == "Y"){
        $sql_analisa = mysql_query("select * from tmp_analisa");
        $sql_cek = mysql_num_rows($sql_analisa);
        
        if($sql_cek >= 1){
            DelTmpSakit($NoIP);
            $sql_tmp = mysql_query("select * from tmp_analisa where kode_gejala = '$TxtKode_Gejala' and noip = '$NoIP'");
            while($data_tmp = mysql_fetch_array($sql_tmp)){
                $sql_sbsakit = mysql_query("select * from tbl_penyebab where kode_penyakit = '$data_tmp[kode_penyakit]' group by kode_penyakit");
                while($data_sbsakit = mysql_fetch_array($sql_sbsakit)){
                    $sql_simpan = mysql_query("INSERT INTO tmp_penyakit(noip,kode_penyakit)VALUES('$NoIP','$data_sbsakit[kode_penyakit]')");
                }
            }
            DelTmpAnalisa($NoIP);
            AddTmpAnalisa($TxtKode_Gejala,$NoIP);
            AddTmpGejala($TxtKode_Gejala,$NoIP);
        }else{
            $sql_sbgejala = mysql_query("select * from tbl_penyebab where kode_gejala = '$TxtKode_Gejala'");
            while($data_sbgejala = mysql_fetch_array($sql_sbgejala)){
                $sql_sbsakit = mysql_query("select * from tbl_penyebab where kode_penyakit = '$data_sbgejala[kode_penyakit]' group by kode_penyakit");
                while($data_sbsakit = mysql_fetch_array($sql_sbsakit)){
                    $sql_simpan = mysql_query("INSERT INTO tmp_penyakit(noip,kode_penyakit)VALUES('$NoIP','$data_sbsakit[kode_penyakit]')");
                }
            }
            AddTmpAnalisa($TxtKode_Gejala,$NoIP);
            AddTmpGejala($TxtKode_Gejala,$NoIP);
        }
        echo "<meta http-equiv = 'refresh' content = '0; url = index.php?menus=Analisa'>";
    }
    
    if($Rad_Pilih == "T"){
        $sql_analisa = mysql_query("select * from tmp_analisa");
        $sql_cek = mysql_num_rows($sql_analisa);
        
        if($sql_cek >= 1){
            $sql_tmp = mysql_query("select * from tmp_analisa where kode_gejala = '$TxtKode_Gejala'");
            while($hasil_tmp = mysql_fetch_array($sql_tmp)){
                $sql_deltmp = mysql_query("delete from tmp_analisa where kode_penyakit = '$hasil_tmp[kode_penyakit]' and noip = '$NoIP'");
                $sql_deltmp2 = mysql_query("delete from tmp_penyakit where kode_penyakit = '$hasil_tmp[kode_penyakit]' and noip = '$NoIP'");
            }
        }else{
            $sql_sb = mysql_query("select * from tbl_penyebab order by kode_penyakit,kode_gejala");
            while($hasil_sb = mysql_fetch_array($sql_sb)){
                $sql_intmp= mysql_query("INSERT INTO tmp_analisa(noip,kode_penyakit,kode_gejala)VALUES('$NoIP','$hasil_sb[kode_penyakit]','$hasil_sb[kode_gejala]')");
                $sql_intmp2 = mysql_query("INSERT INTO tmp_penyakit(noip,kode_penyakit)VALUES('$NoIP','$hasil_sb[kode_penyakit]')");
            }
            $sql_sb2 = mysql_query("select * from tbl_penyebab where kode_gejala = '$TxtKode_Gejala'");
            while($hasil_sb2 = mysql_fetch_array($sql_sb2)){
                $sql_deltmp = mysql_query("delete from tmp_analisa where kode_penyakit = '$hasil_sb2[kode_penyakit]' and noip = '$NoIP'");
                $sql_deltmp2 = mysql_query("delete from tmp_penyakit where kode_penyakit = '$hasil_sb2[kode_penyakit]' and noip = '$NoIP'");
            }
        }
        echo "<meta http-equiv = 'refresh' content = '0; url = index.php?menus=Analisa'>";
    }
}

/**
 * @author IqbalRevvin
 * @copyright 2018
 */

?>
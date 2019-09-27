<?php

$NoIP = $_SERVER['REMOTE_ADDR'];

function DelTmpSakit($ip){
  $sql_del = mysql_query("delete from tmp_penyakit where noip = '$ip'");
}

function DelTmpAnalisa($ip){
  $sql_del = mysql_query("delete from tmp_analisa where noip = '$ip'");
}

function DelTmpPasien($ip){
  $sql_del = mysql_query("delete from tmp_pasien where noip = '$ip'");
}

function DelTmpGejala($ip){
  $sql_del = mysql_query("delete from tmp_gejala where noip = '$ip'");
}

$sql_cek = mysql_query("select * from tmp_penyakit where noip = '$NoIP' group by kode_penyakit") or die("GAGAL EKSEKUSI DATA. ERROR : ".mysql_error());
$hasil_cek = mysql_num_rows($sql_cek);
if($hasil_cek == 1){
    $hasil_data = mysql_fetch_array($sql_cek);
    $sql_pasien = mysql_query("select * from tmp_pasien where noip = '$NoIP'") or die("GAGAL EKSEKUSI DATA. ERROR : ".mysql_error());
    $hasil_pasien = mysql_fetch_array($sql_pasien);
    
    $sql_sim_analisa = mysql_query("INSERT INTO analisa_hasil (nama_pasien,usia,kelamin,alamat,apa_yang_dirasakan,kode_penyakit,noip,tanggal)values('$hasil_pasien[nama_pasien]','$hasil_pasien[usia]','$hasil_pasien[jenkel]','$hasil_pasien[alamat]','$hasil_pasien[apa_yang_dirasakan]','$hasil_data[kode_penyakit]','$hasil_pasien[noip]','$hasil_pasien[tanggal]')") or die("GAGAL EKSEKUSI DATA. ERROR : ".mysql_error());
    DelTmpAnalisa($NoIP);
    DelTmpGejala($NoIP);
    DelTmpPasien($NoIP);
    DelTmpSakit($NoIP);

    echo "<meta http-equiv='refresh' content='0; url=index.php?menus=Hasil_Analisa'>";
} 

$sqlcek = mysql_query("select * from tmp_analisa where noip = '$NoIP'");
$datacek = mysql_num_rows($sql_cek);
if($datacek >=1){
    $sqlG = mysql_query("select tbl_gejala.* from tbl_gejala,tmp_analisa where tbl_gejala.kode_gejala = tmp_analisa.kode_gejala and tmp_analisa.noip = '$NoIP' and not tmp_analisa.kode_gejala in (select kode_gejala from tmp_gejala where noip = '$NoIP') order by tbl_gejala.kode_gejala limit 1");
    $dataG = mysql_fetch_array($sqlG);
    
    $kode_gejala = $dataG['kode_gejala'];
    $gejala      = $dataG['nama_gejala']; 
}else{
    $sqlG = mysql_query("select * from tbl_gejala order by kode_gejala limit 1");
    $dataG = mysql_fetch_array($sqlG);
    
    $kode_gejala = $dataG['kode_gejala'];
    $gejala      = $dataG['nama_gejala'];
}

/**
 * @author Phantom
 * @copyright 2016
 */

?>

                <div class="col s12 m12 20">
                  <div class="card-panel">
                    <h4>Pertanyaan Analisa</h4>
                    <div class="row">
                      <form class="col s12" method="post" action="index.php?menus=Cek_Analisa">
                        <div class="row">
                          <div class="input-field col s12">
                            <span>
                              Apakah Anda Mengalami <?php echo $gejala;?> ( <?php echo $kode_gejala;?> )?
                              <input type="hidden" name="TxtKode_Gejala" value="<?php echo $kode_gejala;?>"/>
                            </span>
                          </div>
                          <div class="input-field col s2">
                            <p>
                              <input class="with-gap" name="Rd_Pilih" type="radio" id="Y" value="Y"/>
                              <label for="Y">Ya</label>
                            </p>
                          </div>
                          <div class="input-field col s2">
                            <p>
                              <input class="with-gap" name="Rd_Pilih" type="radio" id="T" value="T"/>
                              <label for="T">Tidak</label>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s6">
                            <button class="btn cyan waves-effect waves-light right" type="submit">Lanjut<i class="mdi-content-send right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
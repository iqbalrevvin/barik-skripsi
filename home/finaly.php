<?php

$NoIP = $_SERVER['REMOTE_ADDR'];

$sql = mysql_query("select ah.*,skt.* from analisa_hasil ah,tbl_penyakit skt where ah.kode_penyakit = skt.kode_penyakit and ah.noip = '$NoIP' order by ah.id desc limit 1") or die("GAGAL EKSEKUSI DATA. ERROR : ".mysql_error());
$data = mysql_fetch_array($sql);

/**
 * @author Phantom
 * @copyright 2016
 */

?>
              <div class="col s12 m12 20">
                <nav class="red">
                  <div class="nav-wrapper">
                    <div class="left col s12 m5 l5">
                      <ul>
                        <li><a href="#!" class="email-menu"><i class="mdi-navigation-menu"></i></a></li>
                        <li><a href="#!" class="email-type">Hasil Analisa</a></li>
                      </ul>
                    </div>
                    <div class="col s12 m7 l7 hide-on-med-and-down">
                      <ul class="right">
                        <li><a href="laporan.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Print"><i class="mdi-file-file-download"></i></a></li>
                      </ul>
                    </div>

                  </div>
                </nav>
              </div>
              
              <div class="col s12 m12 20">
                <div id="email-details" class="col s12 m12 20 card-panel">
                  <p class="email-subject truncate">Berdasarkan diagnosa yang dikumpulkan bahwa sistem menyimpulkan :</p>
                  <hr class="grey-text text-lighten-2"/>
                  <div class="email-content-wrap">
                    <div class="row">
                      <div class="col s10 m10 l10">
                        <ul class="collection">
                          <li class="collection-item avatar">
                            <img src="images/Unknown.png" alt="" class="circle"/>
                            <span class="email-title"><?php echo $data['nama_pasien'];?></span>
                            <p class="truncate grey-text ultra-small"><?php echo $data['kelamin'];?></p>
                            <p class="grey-text ultra-small"><?php echo $data['alamat'];?></p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="email-content">
                      <div class="row">
                          <div class="col s12 m12 center-align">
                              <h5>(<?= $data['kode_penyakit'] ?>)</h5>
                              <h5>Nama Kerusakan</h5>
                              <h5><b><?php echo $data['nama_penyakit'];?></b></h5>
                              
                              <!--<h5> <i><?php echo $data['nama_latin'];?></i> </h5>-->
                          </div>
                      </div>
                      <div class="divider"></div>
                      <!--Sections and Dividers-->
                      <h4 class="header">Keterangan Kerusakan :</h4>
                      <div class="section">
                          <h5>Gejala Kerusakan</h5>
                            <?php 
                                $sql_gejala = mysql_query("select gjl.* from tbl_gejala gjl, tbl_penyebab sb where sb.kode_gejala = gjl.kode_gejala and sb.kode_penyakit = '$data[kode_penyakit]'");
                                $i = 0;
                                while($hasil = mysql_fetch_array($sql_gejala)){
                                    $i++;
                                    echo $i.". ".$hasil['nama_gejala']."<br/>";
                                }
                            ?>
                      <div class="section">
                          <h5>Solusi</h5>
                          <p><?php echo $data['solusi'];?></p>
                      </div>
                      </div>
                          <h5>Deskripsi Kerusakan</h5>
                          <p><?php echo $data['deskripsi'];?></p>
                      </div>
                      <br />
                      <div class="invoice-footer">
                        <div class="row">
                          <div class="col s12 m6 l6 center-align right">
                            <p>Approved By</p>

                            <p class="header">Arief Rachman, S.T</p>
                            <div class="divider"></div>
                            <p>Pakar AC</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
<?php

$id = $_GET['id'];

$sql = mysql_query("select * from tbl_penyakit where tbl_penyakit.kode_penyakit = '".$id."'") or die("GAGAL EKSEKUSI DATA. ERROR : ".mysql_error());
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
                        <li><a href="#!" class="email-type">Detail Kerusakan</a></li>
                      </ul>
                    </div>
                    <div class="col s12 m7 l7 hide-on-med-and-down">
                      <ul class="right">
                        <li><a href="#" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Print"><i class="mdi-file-file-download"></i></a></li>
                      </ul>
                    </div>

                  </div>
                </nav>
              </div>
              
              <div class="col s12 m12 20">
                <div id="email-details" class="col s12 m12 20 card-panel">
                  <div class="email-content-wrap">
                    <div class="email-content">
                      <div class="row">
                          <div class="col s12 m12 center-align">
                              <h5>Nama Kerusakan</h5>
                              <h3 style="color: red;"><strong><?php echo $data['nama_penyakit'];?></strong></h3>
                              <h5> <i><?php echo $data['nama_latin'];?></i> </h5>
                          </div>
                      </div>
                      <div class="divider"></div>
                                            
                      <!--Sections and Dividers-->
                      <h4 class="header">Keterangan Kerusakan :</h4>
                      <div class="section">
                          <h5>Deskripsi Kerusakan</h5>
                          <p><?php echo $data['deskripsi'];?></p>
                      </div>
                      <div class="section">
                          <h5>Solusi</h5>
                          <p><?php echo $data['solusi'];?></p>
                      </div>
                      <br />
                      <div class="invoice-footer">
                        <div class="row">
                          <div class="col s12 m6 l6 center-align right">
                            <p>Approved By</p>
                            <img src="images/signature-scan.png" alt="signature"/>
                            <p class="header">Rian Nurjaman</p>
                            <div class="divider"></div>
                            <p>System Analyst and Development <br />1406102</p>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <div class="col-md-6">
                          <button class="btn btn-flat btn-default" onclick="history.back();"><i class="fa fa-reply"></i> Kembali</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
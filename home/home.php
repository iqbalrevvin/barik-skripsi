                <div class="col s12 m12 20">
                  <div class="card-panel">
                    <div class="card-image waves-effect waves-block waves-light">
                      <p>
                        <img src="images/homeopathy.png" widht="200" height="200" style="float:left;" />
                          <div class="card-content"><br><br><hr>
                            <h5 class="card-title activator grey-text text-darken-4">
                              <?php
                                $sql = mysql_query("select * from tbl_deskripsi");
                                $data = mysql_fetch_array($sql);
                                echo $data['judul'];
                              ?>
                            </h5>
                            <hr>
                            <p><?php echo $data['des_utama'];?></p>
                          </div>
                        </p>
                    </div>

                    <!--<div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" style="float:left;" src="images/ai.png"/>
                    </div>
                    <div class="card-content">
                      <h5 class="card-title activator grey-text text-darken-4">
                        <?php
                          $sql = mysql_query("select * from tbl_deskripsi");
                          $data = mysql_fetch_array($sql);
                          echo $data['judul'];
                        ?>
                      </h5>
                      <p><?php echo $data['des_utama'];?></p>
                    </div>-->
                  
                  </div>
                </div>
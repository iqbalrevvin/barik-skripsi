                <div class="col s12 m12 20">
                  <div class="card-panel">
                    <div class="card-content">
                    
                      <div id="table-datatables">
                        <h4 class="header">Tabel Data Kerusakan</h4>
                        <div class="row">
                          <div class="col s12 m12 20">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                <tr>
                                  <th style="text-align: center;">No.</th>
                                  <th style="text-align: center;">Kode Kerusakan</th>
                                  <th style="text-align: center;">Nama Kerusakan</th>
                                  <th style="text-align: center;">Nama Lain</th>
                                  <th style="text-align: center;">Detail</th>
                                </tr>
                              </thead>
                              
                              <tfoot>
                                <tr>
                                  <th style="text-align: center;">No.</th>
                                  <th style="text-align: center;">Kode Kerusakan</th>
                                  <th style="text-align: center;">Nama Kerusakan</th>
                                  <th style="text-align: center;">Nama Lain</th>
                                  <th style="text-align: center;">Detail</th>
                                </tr>
                              </tfoot>
                              
                              <tbody>
                                <?php
                                  include "../libs/koneksi.php";
                                  $sql = mysql_query("select * from tbl_penyakit order by kode_penyakit");
                                  $i=1;
                                  while($data = mysql_fetch_array($sql)){
                                ?>
                                  
                                  <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $data['kode_penyakit']?></td>
                                    <td><?php echo $data['nama_penyakit']?></td>
                                    <td><i><?php echo $data['nama_latin']?></i></td>
                                    <td>
                                      <a href="index.php?menus=Detail_Penyakit&id=<?php echo $data['kode_penyakit']?>" class="btn cyan waves-effect waves-light right"><i class="mdi-action-assignment"></i> Detail</a>
                                    </td>
                                  </tr>
                                  
                                <?php
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
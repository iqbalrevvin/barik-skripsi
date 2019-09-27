                <?php                  
                    $TxtNama    = $_REQUEST['Txt_Nama'];
                    $TxtUsia    = $_REQUEST['Txt_Usia'];
                    $CmbJenkel  = $_REQUEST['Cmb_Jenkel'];
                    $TxtAlamat  = $_REQUEST['Txt_Alamat'];
                    $TxtRasakan  = $_REQUEST['Txt_Rasakan'];
                    
                    $pesanError = array();
                    
                    if (trim($TxtNama)=="") {
                      $pesanError[] = "<b>Nama Pasien</b> Masih Kosong !";			
                    }
                    if(trim($TxtUsia)==""){
                      $pesanError[] = "<b>Usia</b> Masih Kosong !";  
                    }
                    if (trim($TxtAlamat)=="") {
                      $pesanError[] = "<b>Alamat</b> Masih Kosong !";
                    }
                    if(trim($CmbJenkel)=="#"){
                      $pesanError[] = "<b>Jenis Kelamin</b> Belum Dipilih";
                    }
                    
                    if (count($pesanError)>=1 ){
                      $TxtNama   = $_REQUEST['Txt_Nama'];
                      $TxtUsia   = $_REQUEST['Txt_Usia'];
                      $CmbJenkel = $_REQUEST['Cmb_Jenkel'];
                      $TxtAlamat = $_REQUEST['Txt_Alamat'];
                			
                      include "diagnosis.php";
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
                    else{
                        $NoIP = $_SERVER['REMOTE_ADDR'];
                        
                        $sqlDel = mysql_query("delete from tmp_pasien where noip = '$NoIP'")or die ("GAGAL EKSEKUSI DATA TMP_PASIEN. ERROR : ".mysql_error());
                        
                        $sqlSim =  mysql_query("INSERT INTO tmp_pasien(id,nama_pasien,usia,jenkel,alamat,apa_yang_dirasakan,noip,tanggal)VALUES('','$TxtNama','$TxtUsia','$CmbJenkel','$TxtAlamat','$TxtRasakan','$NoIP',NOW())")or die ("GAGAL EKSEKUSI DATA PASIEN. ERROR : ".mysql_error());
                        
                        $sqlHTP = mysql_query("delete from tmp_penyakit where noip = '$NoIP'")or die ("GAGAL EKSEKUSI DATA HAPUS PENYAKIT. ERROR : ".mysql_error());
                        $sqlHTA = mysql_query("delete from tmp_analisa where noip = '$NoIP'")or die ("GAGAL EKSEKUSI DATA HAPUS ANALISA. ERROR : ".mysql_error());
                        $sqlHTG = mysql_query("delete from tmp_gejala where noip = '$NoIP'")or die ("GAGAL EKSEKUSI DATA HAPUS GEJALA. ERROR : ".mysql_error());
                        
                        echo "<meta http-equiv = 'refresh' content = '0; url = index.php?menus=Analisa'>";
                    }
                  
                  
                  
                /**
                 * @author Phantom
                 * @copyright 2016
                 */
                
                ?>
<?php
    if(empty($_SESSION['kode']) && empty($_SESSION['hak_akses'])){
        echo '<script language="javascript">alert("Anda belum login");</script>';
        echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
        exit;
    }else if($_SESSION['hak_akses']!="Administrator"){
        echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
    }
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Sistem Pakar Diagnosa Kerusakan AC
                    <br />
                    <small>Versi Skripsi Sistem Pakar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Basis Pengetahuan</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basis Pengetahuan</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-10 col-md-offset-1">
                            <?php
                                $sql = mysql_query("SELECT DISTINCT sb.kode_penyakit, py.nama_penyakit FROM tbl_penyebab sb, tbl_penyakit py where sb.kode_penyakit = py.kode_penyakit ORDER BY sb.kode_penyakit");
                                $total = mysql_num_rows($sql)+2;
                                while ($row = mysql_fetch_array($sql)) {
                                    $pnyk[] = $row[0];
                                    $nama[] = $row[1];
                                }
                                
                                // Table headings
                                
                                $kosong = array_fill_keys($pnyk,'');
                                $sql = mysql_query("SELECT kode_penyakit,kode_gejala FROM tbl_penyebab ORDER BY kode_gejala");
                                
                                $heads = "<table class='table table-bordered'>";
                                $heads .= "<tr bgcolor='yellow'><th colspan='".$total."' style='text-align: center;'>Kerusakan/Penyebab</th></tr>";
                                $heads .= "<tr class='bg-black color-palette'><th colspan='2'></th><th class='bg-aqua color-palette'>".join("</th><th class='bg-aqua color-palette'>",$pnyk)."</th></tr>";
                                
                                // Main data
                                
                                $curname='';
                                $tdata = '';
                                
                                $jumlah = mysql_num_rows($sql);
                                $tdata = "<tr bgcolor='orange'><th rowspan='".$jumlah."' style=''>Nama Gejala</th></tr>";
                                while (list($centang, $sn) = mysql_fetch_array($sql)) {
                                    if ($curname != $sn) {
                                        if ($curname) {
                                            $tdata .= "<tr><th class='bg-teal color-palette'>$curname</th><td>".join("</td><td style='text-align: center;'>",$rowdata)."</td></tr>";
                                        }
                                        $rowdata = $kosong;
                                        $curname = $sn;
                                    }
                                    $rowdata[$centang] = "&#8730;";
                                }
                                $tdata .= "<tr><th class='bg-teal color-palette'>$curname</th><td>".join("</td><td style='text-align: center;'>",$rowdata)."</td></tr>";
                                $tdata .= "</table>";

                                echo $heads;
                                echo $tdata;
                            ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
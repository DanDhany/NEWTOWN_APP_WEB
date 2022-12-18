<?php
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Pembelian</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
			<img width="50px" src="newtown.png">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">New Town App</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_COOKIE['user']; ?>
						</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="hapus.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="m_barang.php">Master Barang</a>
                                </li>
                                <li>
                                    <a href="m_pengguna.php">Master Pengguna</a>
                                </li>
								<li>
                                    <a href="m_supplier.php">Master Supplier</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="t_penjualan.php">Transaksi Penjualan</a>
                                </li>
                                <li>
                                    <a href="t_pembelian.php">Transaksi Pembelian</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="l_stok.php">Laporan Stok</a>
                                </li>
								<li>
                                    <a href="l_penjualan.php">Laporan Penjualan</a>
                                </li>
                                <li>
                                    <a href="l_pembelian.php">Laporan  Pembelian</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Pembelian</h1>
                </div >
            <!-- /.row -->
            <div class="col-lg-14">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Pembelian
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<form action="" method="POST">
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" class="form-control" name="tanggalm">
                            </div>
							<div class="form-group">
								<label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggals">
                            </div>
							<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
							<br><br>
						</form>
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal Transaksi</th>
										<th>Nama Supplier</th>
										<th>Alamat</th>
										<th>Telpon</th>
										<th>Diskon</th>
										<th>Total</th>
										<th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
								
                                    <?php 
									if(isset($_POST['kirim'])){
									$mulai = $_POST['tanggalm'];
									$selesai = $_POST['tanggals'];
									$_SESSION['tanggalm'] = $mulai;
									$_SESSION['tanggals'] = $selesai;
									$tgl = mysqli_query($conn, "select tanggal from tblmaster where tanggal between '$mulai' and '$selesai'");
									$cari = mysqli_query($conn, "select * from tblmaster where tanggal between '$mulai' and '$selesai'");
									if(mysqli_num_rows($tgl)>=1){
									while ($row = mysqli_fetch_array($cari)){
										$kode = $row['kodetr'];
										$nama = $row['tanggal'];
										$sup = $row['supplier'];
										$alamat = $row['alamat'];
										$tlp = $row['telpon'];
										$total = $row['total'];
										$diskon = $row['diskon'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										$_SESSION['sup'] = $sup;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['tlp'] = $tlp;
										$_SESSION['total'] = $total;
										$_SESSION['diskon'] = $diskon;
										echo "<tr> <form method=\"post\" action=\"cetak_detail_beli.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo $_SESSION['nama'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['sup'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['alamat'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['tlp'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['diskon']." %";
										echo "</td>";
										echo "<td>";
										echo "Rp. ".$_SESSION['total']." ,-";
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"detail\" value=\"Detail Transaksi\">";
										echo "</td></form></tr>";
										
									}
									?>
									<tfoot>
										<?php
										$results = mysqli_query($conn, "SELECT  SUM(total) AS total FROM tblmaster where tanggal between '$mulai' and '$selesai'");
										while ($row = mysqli_fetch_array($results)) {
										?>
									  <tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>Total</th>
										<th colspan="3">Rp. <?php echo $row['total']; ?> ,-</th>
									  </tr>

									<?php } ?>
									</tfoot>
									<?php
									}
									else{
									$cari1 = mysqli_query($conn, "select * from tblmaster ");
									while ($row = mysqli_fetch_array($cari1)){
										$kode = $row['kodetr'];
										$nama = $row['tanggal'];
										$sup = $row['supplier'];
										$alamat = $row['alamat'];
										$tlp = $row['telpon'];
										$total = $row['total'];
										$diskon = $row['diskon'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										$_SESSION['sup'] = $sup;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['tlp'] = $tlp;
										$_SESSION['total'] = $total;
										$_SESSION['diskon'] = $diskon;
										echo "<tr> <form method=\"post\" action=\"cetak_detail_beli.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo $_SESSION['nama'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['sup'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['alamat'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['tlp'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['diskon']." %";
										echo "</td>";
										echo "<td>";
										echo "Rp. ".$_SESSION['total']." ,-";
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"detail\" value=\"Detail Transaksi\">";
										echo "</td></form></tr>";
									}
									?>
									<tfoot>
										<?php
										$results = mysqli_query($conn, "SELECT  SUM(total) AS total FROM tblmaster ");
										while ($row = mysqli_fetch_array($results)) {
										?>
									  <tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>Total</th>
										<th colspan="3">Rp. <?php echo $row['total']; ?> ,-</th>
									  </tr>

									<?php } ?>
									</tfoot>
									<?php
									}
									}else {
									$cari = mysqli_query($conn, "select * from tblmaster ");
									while ($row = mysqli_fetch_array($cari)){
										$kode = $row['kodetr'];
										$nama = $row['tanggal'];
										$sup = $row['supplier'];
										$alamat = $row['alamat'];
										$tlp = $row['telpon'];
										$total = $row['total'];
										$diskon = $row['diskon'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										$_SESSION['sup'] = $sup;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['tlp'] = $tlp;
										$_SESSION['total'] = $total;
										$_SESSION['diskon'] = $diskon;
										echo "<tr> <form method=\"post\" action=\"cetak_detail_beli.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo $_SESSION['nama'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['sup'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['alamat'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['tlp'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['diskon']." %";
										echo "</td>";
										echo "<td>";
										echo "Rp. ".$_SESSION['total']." ,-";
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"detail\" value=\"Detail Transaksi\">";
										echo "</td></form></tr>";
										
									}?>
									<tfoot>
										<?php
										$results = mysqli_query($conn, "SELECT  SUM(total) AS total FROM tblmaster");
										while ($row = mysqli_fetch_array($results)) {
										?>
									  <tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>Total</th>
										<th colspan="3">Rp. <?php echo $row['total']; ?> ,-</th>
									  </tr>

									<?php } ?>
									</tfoot>
									
									<?php } 
									
									?>
									 
                                </tbody>
                            </table>
							<div class="col-lg-2">
							<a href="cetak_pembelian.php" class="btn btn-lg btn-warning btn-block">Print</a>
							</div>
							
                        
                        </div>
						
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
	
	<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>

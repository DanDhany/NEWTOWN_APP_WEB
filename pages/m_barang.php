<!DOCTYPE html>
<?php
session_start();
if($_SESSION['akses']=="A"){
	
}else{
	echo "<script>alert(\"Anda Tidak Memiliki Hak Akses!\")</script>";
	header('Location: index.php');	
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Master Barang</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <h1 class="page-header">Master Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<?php
										include 'config.php';

										$sqlc = "select count(*)as jum from tbbarang";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;

										if(isset($_POST['submit'])){
											$a = $_POST['kode'];
											$b = $_POST['nama'];
											$c = $_POST['satuan'];
											$d = $_POST['jumlah'];
											$e = $_POST['hbeli'];
											$f = $_POST['hjual'];

										$sql = "INSERT INTO tbbarang
										VALUES ('$a', '$b', '$c', $d, $e, $f)";
										$result = mysqli_query($conn, $sql);
										$sqlc = "select count(*)as jum from tbbarang";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;
										}

										if(isset($_POST['delete'])){
											$a = $_POST['kode'];
											
										$sql1 = "Delete from tbbarang where kode='$a'";
										mysqli_query($conn, $sql1);
										$sqlc = "select count(*)as jum from tbbarang";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;
										}

										if(isset($_POST['submitupdate'])){
											$a = $_POST['kode'];
											$b = $_POST['nama'];
											$c = $_POST['satuan'];
											$d = $_POST['jumlah'];
											$e = $_POST['hbeli'];
											$f = $_POST['hjual'];

										$sql2 = "update tbbarang
										set nama='$b', satuan='$c', jumlah=$d, hbeli=$e, hjual=$f where kode='$a'";
										mysqli_query($conn, $sql2);
										$sqlc = "select count(*)as jum from tbbarang";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;
										}


										if(isset($_POST['update'])){
											$a1 = $_POST['kode'];
											$b1 = $_POST['nama'];
											$c1 = $_POST['satuan'];
											$d1 = $_POST['jumlah'];
											$e1 = $_POST['hbeli'];
											$f1 = $_POST['hjual'];
										?>	
									<form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input class="form-control" name="kode" value="<?php echo $a1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nama" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Satuan Barang</label>
                                            <input class="form-control" name="satuan" value="<?php echo $c1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Jumlah Barang</label>
                                            <input class="form-control" name="jumlah" value="<?php echo $d1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga Beli</label>
                                            <input class="form-control" name="hbeli" value="<?php echo $e1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga Jual</label>
                                            <input class="form-control" name="hjual" value="<?php echo $f1; ?>" required>
                                        </div>
                                        
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input class="form-control" name="kode" placeholder="Masukkan Kode Barang" >
                                        </div>
										<div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nama" placeholder="Masukkan Nama Barang" required>
                                        </div>
										<div class="form-group">
                                            <label>Satuan Barang</label>
                                            <input class="form-control" name="satuan" placeholder="Masukkan Satuan Barang" required>
                                        </div>
										<div class="form-group">
                                            <label>Jumlah Barang</label>
                                            <input class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga Beli</label>
                                            <input class="form-control" name="hbeli" placeholder="Masukkan Harga Beli" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga Jual</label>
                                            <input class="form-control" name="hjual" placeholder="Masukkan Harga Jual" required>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>
									<?php
}
?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div >
                                    <?php


										$sql1 = "SELECT * from tbbarang";
										$result1 = mysqli_query($conn, $sql1);

												echo "<div class=\"table-responsive\"><table class=\"table table-striped\">";
												echo "<tr><td>";
												echo "Kode </td><td>";
												echo "Nama Barang </td><td>";
												echo "Satuan </td><td>";
												echo "Jumlah </td><td>";
												echo "Harga Beli </td><td>";
												echo "Harga Jual </td>";
												echo "</tr>";
										if (mysqli_num_rows($result1) > 0) {
											while($row = mysqli_fetch_assoc($result1)) {
												echo "<tr><form action=\"\" method=\"POST\"> <td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
												echo $row["kode"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"nama\" value=\"";
												echo $row["nama"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"satuan\" value=\"";
												echo $row["satuan"];echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"jumlah\" value=\"";
												echo $row["jumlah"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"hbeli\" value=\"";
												echo $row["hbeli"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"hjual\" value=\"";
												echo $row["hjual"]; echo "\">";
												echo "</td>";
												echo "<td><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Update\"></td>";
												echo "<td><input class=\"btn btn-danger\"type=\"submit\" name=\"delete\" value=\"Delete\"></td>";
												echo "</form></tr>";
											}
										} else {
											echo "0 results";
										}
										echo "</table></div>";
										mysqli_close($conn);

										?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if($_SESSION['akses']=="A" || $_SESSION['akses']=="M"){
	
}else{
	echo "<script>alert(\"Anda Tidak Memiliki Hak Akses!\")</script>";
	header('Location: index.php');	
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Master Supplier</title>

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
                    <h1 class="page-header">Master Supplier</h1>
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

if(isset($_POST['submit'])){
	$a = $_POST['nama'];
	$b = $_POST['no_telp'];
	$c = $_POST['alamat'];

$sql = "INSERT INTO tbsupplier
VALUES ('$a', '$b', '$c')";
$result = mysqli_query($conn, $sql);
}

if(isset($_POST['delete'])){
	$a = $_POST['datnama'];
	
$sql1 = "Delete from tbsupplier where nama='$a'";
mysqli_query($conn, $sql1);
}

if(isset($_POST['submitupdate'])){
	$a = $_POST['nama'];
	$b = $_POST['no_telp'];
	$c = $_POST['alamat'];
	
$sql2 = "update tbsupplier
set nama='$a', no_telp='$b', alamat='$c' where nama='$a'";
mysqli_query($conn, $sql2);
}


if(isset($_POST['update'])){
	$a1 = $_POST['datnama'];
	$b1 = $_POST['datno_telp'];
	$c1 = $_POST['datalamat'];
	
?>	
									<form role="form" action="" method="POST">

										<div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input class="form-control" name="nama" value="<?php echo $a1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>No. Telp</label>
                                            <input class="form-control" name="no_telp" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" required><?php echo $c1; ?> </textarea>
                                        </div>
									
                                        
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input class="form-control" name="nama" placeholder="Masukkan Nama Supplier" required>
                                        </div>
										<div class="form-group">
                                            <label>No. Telp</label>
                                            <input class="form-control" name="no_telp" placeholder="Masukkan Telp. Supplier" required>
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Supplier" required> </textarea>
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
                            Tabel Supplier
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div >
								<?php


								$sql1 = "SELECT * from tbsupplier";
								$result1 = mysqli_query($conn, $sql1);

										echo "<div class=\"table-responsive\"><table class=\"table table-striped\">";
										echo "<tr><td>";
										echo "Nama </td><td>";
										echo "No Telp </td><td>";
										echo "Alamat</td><td>";
										echo "</tr>";
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"datnama\" value=\"";
										echo $row["nama"]; echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"datno_telp\" value=\"";
										echo $row["no_telp"];echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"datalamat\" value=\"";
										echo $row["alamat"]; echo "\">";
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

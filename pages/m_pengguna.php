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

    <title>Master Pengguna</title>

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
                    <h1 class="page-header">Master Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Pengguna
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<?php
								include 'config.php';
								$sqlc = "select count(*)as jum from tbuser";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= "KAR".($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;

								if(isset($_POST['submit'])){
									$a = $_POST['nik'];
									$b = $_POST['nama'];
									$c = $_POST['alamat'];
									$d = $_POST['telp'];
									$e = $_POST['jkel'];
									$f = $_POST['pass'];
									$g = $_POST['lahir'];
									$h = $_POST['akses'];

								$sql = "INSERT INTO tbuser
								VALUES ('$a', '$b', '$c', $d, '$e', '$f', '$g', '$h')";
								$result = mysqli_query($conn, $sql);
								$sqlc = "select count(*)as jum from tbuser";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= "KAR".($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;
								}

								if(isset($_POST['delete'])){
									$a = $_POST['nik'];
									
								$sql1 = "Delete from data where nik='$a'";
								mysqli_query($conn, $sql1);
								$sqlc = "select count(*)as jum from tbuser";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= "KAR".($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;
								}

								if(isset($_POST['submitupdate'])){
									$a = $_POST['nik'];
									$b = $_POST['nama'];
									$c = $_POST['alamat'];
									$d = $_POST['telp'];
									$e = $_POST['jkel'];
									$f = $_POST['pass'];
									$g = $_POST['lahir'];
									$h = $_POST['akses'];

								$sql2 = "update tbuser
								set Nama='$b', Alamat='$c', Telp=$d, Sex='$e', Pass='$f', Tgl_lahir='$g', Akses='$h' where NIK='$a'";
								mysqli_query($conn, $sql2);
								$sqlc = "select count(*)as jum from tbuser";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= "KAR".($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;
								}


								if(isset($_POST['update'])){
									$a1 = $_POST['nik'];
									$b1 = $_POST['nama'];
									$c1 = $_POST['alamat'];
									$d1 = $_POST['telp'];
									$e1 = $_POST['jkel'];
									$f1 = $_POST['pass'];
									$g1 = $_POST['lahir'];
									$h1 = $_POST['akses'];
								?>
										<form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input class="form-control" name="nik" value="<?php echo $a1; ?>" readonly >
                                        </div>
										<div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input class="form-control" name="nama" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label><br>
                                            <textarea name="alamat" class="form-control" required><?php echo $c1; ?> </textarea>
                                        </div>
										<div class="form-group">
                                            <label>Telp</label>
                                            <input class="form-control" name="telp" value="<?php echo $d1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
											<input type="radio" name="jkel" value="Laki-Laki" <?php if($e1=="Laki-Laki"){echo "checked";}?>> Laki-Laki <input type="radio" name="jkel" value="Perempuan" <?php if($e1=="Perempuan"){echo "checked";}?>> Perempuan
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="pass" value="<?php echo $f1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="lahir" value="<?php echo $g1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Bagian </label>
											<input type="radio" name="akses" value="G" <?php if($h1=="G"){echo "checked";}?>> Gudang <input type="radio" name="akses" value="M" <?php if($h1=="M"){echo "checked";}?>> Manajer <input type="radio" name="akses" value="A" <?php if($h1=="A"){echo "checked";}?>> Admin
                                        </div>
                                        
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input class="form-control" name="nik" placeholder="Masukkan NIK" value="<?php echo $jumlahrecord; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input class="form-control" name="nama" placeholder="Masukkan Nama Pengguna" required>
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label><br>
                                            <textarea class="form-control" name="alamat" required> </textarea>
                                        </div>
										<div class="form-group">
                                            <label>Telp</label>
                                            <input class="form-control" name="telp" placeholder="Masukkan No. Telp" required>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
											<input  type="radio" name="jkel" value="Laki-Laki"> Laki-Laki <input type="radio" name="jkel" value="Perempuan"> Perempuan
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="pass" required>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="lahir" required>
                                        </div>
										<div class="form-group">
                                            <label>Bagian</label>
											<input  type="radio" name="akses" value="G"> Gudang <input type="radio" name="akses" value="M"> Manajer <input type="radio" name="akses" value="A"> Admin 
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
                            Tabel Pengguna
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div >
                                    <?php


									$sql1 = "SELECT * from tbuser";
									$result1 = mysqli_query($conn, $sql1);

											echo "<div class=\"table-responsive\"><table class=\"table table-striped\">";
											echo "<tr><td>";
											echo "NIK </td><td>";
											echo "Nama </td><td>";
											echo "Alamat </td><td>";
											echo "NO Telp </td><td>";
											echo "Sex </td><td>";
											echo "Password </td><td>";
											echo "Tanggal Lahir </td><td>";
											echo "Bagian </td>";
											echo "</tr>";
									if (mysqli_num_rows($result1) > 0) {
										while($row = mysqli_fetch_assoc($result1)) {
											echo "<tr><form action=\"\" method=\"POST\"> <td> <input type=\"text\" class=\"form-control\" name=\"nik\" value=\"";
											echo $row["NIK"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"nama\" value=\"";
											echo $row["Nama"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"alamat\" value=\"";
											echo $row["Alamat"];echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"telp\" value=\"";
											echo $row["Telp"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"jkel\" value=\"";
											echo $row["Sex"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"pass\" value=\"";
											echo $row["Pass"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"lahir\" value=\"";
											echo $row["Tgl_lahir"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"akses\" value=\"";
											echo $row["Akses"]; echo "\">";
											echo "</td>";
											echo "<td><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Update\"></td>";
											echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"delete\" value=\"Delete\"></td>";
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

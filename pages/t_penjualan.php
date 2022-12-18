
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

    <title>Transaksi Penjualan</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    
	<div id="wrapper">
	
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
                    <h1 class="page-header">Transaksi Penjualan</h1>
                    
			<?php
include 'config.php';

if(isset($_POST['kirim'])){
  $_SESSION["datatr"]=$_POST["kodetr"];
  $_SESSION["datatgl"]=$_POST["tanggal"];
  $_SESSION["datapel"]=$_POST["pel"];
  $_SESSION["dataalmt"]=$_POST["alamat"];
  $_SESSION["datatlp"]=$_POST["no_telp"];

$x=$_POST["kode"];
$_SESSION["data"][$x]["kode"]=$_POST["kode"];
$_SESSION["data"][$x]["nama"]=$_POST["nama"];
$_SESSION["data"][$x]["satuan"]=$_POST["satuan"];
$_SESSION["data"][$x]["jumlah"]=$_POST["jumlah"];
$_SESSION["data"][$x]["harga"]=$_POST["harga"];

}

if(isset($_POST["delete"])){
  $xx=$_POST["kod"];
  unset($_SESSION["data"][$xx]);
  $_POST["delete"]="0";
}
if(isset($_POST["clear"])){

  unset($_SESSION["data"]);
  unset($_SESSION["datatr"]);
  unset($_SESSION["datatgl"]);
  unset($_SESSION["datapel"]);
  unset($_SESSION["dataalmt"]);
  unset($_SESSION["datatlp"]);
  unset($_SESSION["diskon"]);
  unset($_SESSION["total"]);
  $_POST["clear"]="0";

}
if(isset($_POST["diskonkirim"]))
{
$_SESSION["diskon"]=$_POST["diskonisi"];
$_POST["diskonkirim"]="0";

}
if(isset($_POST["kirimsave"])&& isset($_SESSION["data"]))
{
$_POST["kirimsave"]="0";
$datatr=$_SESSION["datatr"];
$datatgl=$_SESSION["datatgl"];
$datapel=$_SESSION["datapel"];
$dataalmt=$_SESSION["dataalmt"];
$datatlp=$_SESSION["datatlp"];
$totalakhir=$_SESSION["total"];
$diskonakhir=$_SESSION["diskon"];
$sqlk = "INSERT INTO tblmaster_jual(kodetr, tanggal, pelanggan, alamat, telpon, total,
diskon) VALUES('$datatr','$datatgl','$datapel','$dataalmt','$datatlp',$totalakhir,$diskonakhir) " ;
mysqli_query($conn, $sqlk);


foreach($_SESSION["data"] as $yy => $yy_value)
{
$kode=$_SESSION["data"][$yy]["kode"];
$nama=$_SESSION["data"][$yy]["nama"];
$satuan=$_SESSION["data"][$yy]["satuan"];
$jumlah=$_SESSION["data"][$yy]["jumlah"];
$harga=$_SESSION["data"][$yy]["harga"];
$sqld = "INSERT INTO tbldetail_jual(kodetr, kode, nama, satuan, jumlah, harga)
VALUES('$datatr','$kode','$nama','$satuan',$jumlah,$harga)" ;
mysqli_query($conn, $sqld);




}

unset($_SESSION["data"]);
unset($_SESSION["datatr"]);
unset($_SESSION["datatgl"]);
unset($_SESSION["datapel"]);
unset($_SESSION["dataalmt"]);
unset($_SESSION["datatlp"]);
unset($_SESSION["diskon"]);
unset($_SESSION["total"]);


}
$sqlc = "select count(*)as jum from tblmaster_jual";
$result1= mysqli_query($conn, $sqlc);
$row = mysqli_fetch_assoc($result1);
$jumlahrecord= "TR".($row["jum"]+1);
$_SESSION["datatr"]=$jumlahrecord;


$sqld = "select count(*)as jum from tbbarang";
$hasil= mysqli_query($conn, $sqld);
$rows = mysqli_fetch_assoc($hasil);
$jumlahrecord1 = "BRG".($rows["jum"]+1);
$_SESSION["databrg"]=$jumlahrecord1;

?>
		<form action="" method="POST" >
<table align="center">
<tr><td width="200px"><label>Kode Transaksi</label></td><td><input class="form-control" type="text" name="kodetr" value="<?php echo $jumlahrecord; ?>" readonly ></td></tr>
<br />
<tr><td><label>Tanggal Transaksi</label></td><td><input class="form-control" type="date" name="tanggal" value="<?php if(isset(
$_SESSION['datatgl'])){ echo $_SESSION['datatgl'];} ?>" required></td></tr>
<br />
<tr><td><label>Pelanggan</label></td><td><input class="form-control" type="text" name="pel" id="pel" value="<?php if(isset(
$_SESSION['datapel'])){ echo $_SESSION['datapel'];} ?>">
</td></tr><br>
<tr><td><label>No Telp</label></td>
<td> <input class="form-control" type="text" name="no_telp" id="no_telp" value="<?php if(isset(
$_SESSION['datatlp'])){ echo $_SESSION['datatlp'];} ?>"></td></tr><br>
<tr><td><label>Alamat</label></td>
<td> <input class="form-control" type="text" name="alamat" id="alamat" value="<?php if(isset(
$_SESSION['dataalmt'])){ echo $_SESSION['dataalmt'];} ?>"></td></tr><br>


</table>
<br />
<br />
<table align="center">
<tr align="center"><td><label>Kode Barang</label></td>
<td><label>Nama Barang</label></td>
<td><label>Satuan Barang</label></td>
<td><label>Harga Satuan</label></td>
<td><label>Jumlah</label></td>
<tr><td ><input class="form-control" type="text" name="kode" id="kode" placeholder="Kode Barang" required></td>
<td><select class="form-control" name="nama" id="nama" onchange="changeValue(this.value)" >
<option value="" selected>Masukkan Nama Barang</option>
<?php
$query1 = "select * from tbbarang";
$hasil = mysqli_query($conn, $query1);
$nama = "var detail = new Array();\n";
while($data = mysqli_fetch_array($hasil))
{
echo "<option value='".$data['nama']."'>".$data['nama']."</option>";
$nama.= "detail['" . $data['nama'] . "'] = {kode:'" . addslashes($data['kode']) . "',harga:'".addslashes($data['hjual']). "' ,satuan:'".addslashes($data['satuan']). "'};\n";
}
?>
</select></td>

<td><input class="form-control" type="text" name="satuan" id="satuan" placeholder="Satuan" required></td>
<td><input class="form-control" type="number" name="harga" id="harga" placeholder="Harga Satuan" required></td>
<td ><input class="form-control" type="number" name="jumlah" id="jumlah" placeholder="Jumlah" required></td>
<td><input class="btn btn-warning" type="submit" value="Kirim" name="kirim" ></td>
<script type="text/javascript">    
    <?php echo $nama; ?>  
    function changeValue(nama){  
    document.getElementById('kode').value = detail[nama].kode;
	document.getElementById('harga').value = detail[nama].harga;
    document.getElementById('satuan').value = detail[nama].satuan;
	};  
</script> 
</tr>
</table>

</form>
<br />
<br />
		
		<?php
if(isset($_SESSION["data"])){
echo "<Table class=\"table table-striped\">";
echo
"<tr><td>Kode Barang</td><td>Nama Barang</td><td>Satuan</td><td>Jumlah</td><td>Harga Jual</td><td>Total</td></tr>";
$total=0;
foreach($_SESSION["data"] as $y => $y_value)
{
echo "<tr><form action=\"\" method=\"POST\"><input type=\"text\"
name=\"kod\" value=\"$y\" hidden>";
echo "<td>";
echo $_SESSION["data"][$y]["kode"];
echo "</td>";
echo "<td>";
echo $_SESSION["data"][$y]["nama"];
echo "</td>";
echo "<td>";
echo $_SESSION["data"][$y]["satuan"];
echo "</td>";
echo "<td>";
echo $_SESSION["data"][$y]["jumlah"];
echo "</td>";
echo "<td>";
echo "Rp. ".number_format($_SESSION["data"][$y]["harga"],2,",",".");
echo "</td>";
echo "<td>";
echo "Rp ".number_format($_SESSION["data"][$y]["jumlah"]*$_SESSION["data"][$y]["harga"],2,",",".");

$total=$total+$_SESSION["data"][$y]["jumlah"]*$_SESSION["data"][$y]["harga"
];
echo "</td>";
echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"delete\" value=\"X\" ></td>";
echo "</form>";
}

$_SESSION["total"]=$total;
setlocale(LC_ALL, 'en_IN');
echo "<tr><td></td><td></td><td></td><td></td>";
echo "<td>Total :</td><td>Rp ";
echo number_format($_SESSION["total"],2,",",".");
echo "</td></tr>";

echo "<tr><form action=\"\" method=\"POST\">";
echo "<td></td><td></td><td></td><td></td><td>Diskon</td><td><input class=\"form-control\"
type=\"text\" name=\"diskonisi\" value=\"";
if(isset($_SESSION["diskon"]))
{echo $_SESSION["diskon"];}
else
{echo "0";$_SESSION["diskon"]=0;}
echo " \"></td>";
echo "<td><input class=\"btn btn-primary\" type=\"submit\" name=\"diskonkirim\" value=\"%\" ></td>";
echo "</form></tr>";
echo "<tr><td></td><td></td><td></td><td></td><td>";
echo "Grand Total :</td><td>Rp ";
$potongan=(1-($_SESSION["diskon"])/100)*$_SESSION["total"];
echo number_format($potongan,2,",",".");
echo "</td></tr>";
echo "</table>";

}
?>
<form action="" method="POST" align="center">
<table align="center">
<tr ><td width="60px"><input class="btn btn-success" type="submit" value="Save" name="kirimsave">
</td><td><input class="btn btn-danger" type="submit" value="Clear" name="clear" ></td></tr>
</table>
</form>
                    
                </div>
            </div>
         
        </div>

    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
<?php

session_start();
if($_SESSION['akses']=="A" || $_SESSION['akses']=="M"){
	
}else{
	echo "<script>alert(\"Anda Tidak Memiliki Hak Akses!\")</script>";
	header('Location: index.php');	
}
?>
<style>
.active {
    background-color: grey;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: grey;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #111;
}
</style>

<html>
<head>
<title>Transaksi Penjualan</title>
</head>
<body>

<ul>
  <li><a href="index.php">Kembali</a></li>
</ul>
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
<form action="" method="POST" align="center">
<table align="center">
<tr><td colspan="2"><h1>Transaksi Penjualan</h1></td></tr>
<tr><td>Kode TR</td><td><input type="text" name="kodetr" value="<?php echo $jumlahrecord; ?>" readonly ></td></tr>
<br />
<tr><td>Tanggal</td><td><input type="date" name="tanggal" value="<?php if(isset(
$_SESSION['datatgl'])){ echo $_SESSION['datatgl'];} ?>" required></td></tr>
<br />
<tr><td>Pelanggan</td><td><input type="text" name="pel" id="pel" value="<?php if(isset(
$_SESSION['datapel'])){ echo $_SESSION['datapel'];} ?>">
</td></tr><br>
<tr><td>No Telp</td>
<td> <input type="text" name="no_telp" id="no_telp" value="<?php if(isset(
$_SESSION['datatlp'])){ echo $_SESSION['datatlp'];} ?>"></td></tr><br>
<tr><td>Alamat</td>
<td> <input type="text" name="alamat" id="alamat" value="<?php if(isset(
$_SESSION['dataalmt'])){ echo $_SESSION['dataalmt'];} ?>"></td></tr><br>
<br />
<br />
</table>
<table align="center">
<tr><td><input type="text" name="kode" id="kode" placeholder="Kode Barang" required></td>
<td><select name="nama" id="nama" onchange="changeValue(this.value)" >
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

<td><input type="text" name="satuan" id="satuan" placeholder="Satuan" required></td>
<td><input type="number" name="harga" id="harga" placeholder="Harga Satuan" required></td>
<td><input type="number" name="jumlah" id="jumlah" placeholder="Jumlah" required></td>
<td><input type="submit" value="Kirim" name="kirim" ></td>
<script type="text/javascript">    
    <?php echo $nama; ?>  
    function changeValue(nama){  
    document.getElementById('kode').value = detail[nama].kode;
	document.getElementById('harga').value = detail[nama].harga;
    document.getElementById('satuan').value = detail[nama].satuan;
	};  
</script> 
</tr><br>
</table>
</form>
<?php
if(isset($_SESSION["data"])){
echo "<Table border=\"1\" align=\"center\">";
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
echo "<td><input type=\"submit\" name=\"delete\" value=\"X\" ></td>";
echo "</form>";
}

$_SESSION["total"]=$total;
setlocale(LC_ALL, 'en_IN');
echo "<tr><td></td><td></td><td></td><td></td>";
echo "<td>Total :</td><td>Rp ";
echo number_format($_SESSION["total"],2,",",".");
echo "</td></tr>";

echo "<tr><form action=\"\" method=\"POST\">";
echo "<td></td><td></td><td></td><td></td><td>Diskon</td><td><input
type=\"text\" name=\"diskonisi\" value=\"";
if(isset($_SESSION["diskon"]))
{echo $_SESSION["diskon"];}
else
{echo "0";$_SESSION["diskon"]=0;}
echo " \"></td>";
echo "<td><input type=\"submit\" name=\"diskonkirim\" value=\"%\" ></td>";
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
<tr><td><input type="submit" value="Save" name="kirimsave" >
</td><td><input type="submit" value="Clear" name="clear" ></td></tr>
</table>
</form>
</body>
</html>

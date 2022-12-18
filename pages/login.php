<?php
								session_start();
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

    <title>Login</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center">
						<img width="150px"  src="newtown.png">
						<h1 class="page-header">New Town App</h1><br/>
                        <h3 class="panel-title">Silahkan Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Masukkan NIK Karyawan" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Masukkan Password" name="password" type="password" value="">
                                </div>
								<!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" class="btn btn-lg btn-success btn-block" value="Login">
                                
                                
                            </fieldset>
                        </form>
						`		<?php
								
								if(isset($_POST['login'])){
								$username = $_POST['username'];
								$password = $_POST['password'];
								setcookie("user", $username, time() + 3600, "/"); 
								setcookie("pass", $password, time() + 3600, "/");
								$query = "select * from tbuser where NIK='$username' and Pass='$password'";
								$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result)==1){
										while($row = mysqli_fetch_array($result)){
										$_SESSION['username']=$username;
										$_SESSION['akses']=$row["Akses"];
										}
										echo "<script>alert(\"Selamat anda berhasil login\")</script>";
										header('Location: index.php');
									}else{
										echo "<script>alert(\"User name atau password anda salah!\")</script>";
										header('Location: login.php');
									}
								}
								
								?>
                    </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

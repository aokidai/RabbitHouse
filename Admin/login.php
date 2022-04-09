<?php
	session_start();
	if(isset($_SESSION["username"])){
      unset($_SESSION["username"]);
      unset($_SESSION["pages"]);
      unset($_SESSION["ThoiGian"]);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản trị Rabbit House</title>
    <link rel="icon" type="image/png" sizes="32x16" href="../img/rabbithouse.png">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<script>
	function checkLogin(){
		if(document.frmLogin.txtUsername.value==""){
			alert("Nhap username!");
			document.frmLogin.txtUsername.focus();
			return;
		}
		if(document.frmLogin.txtPassword.value==""){
			alert("Nhap password!");
			document.frmLogin.txtPassword.focus();
			return;
		}
		document.form.submit();
	}
</script>	
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Rabbit House</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </nav>
        <div style="margin-top: 100px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center;">ĐĂNG NHẬP TRANG QUẢN TRỊ RABBIT HOUSE</h1>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php 
	 if(isset($_POST["txtusername"])){
		 include "../include/connect.inc";
		 $username	=	$_POST["txtusername"];
		 $password	=	$_POST["txtpassword"];
		 $sql		=	"select username, password from tblusers where username='$username' and password='$password'";
		 $rs		=	mysqli_query($conn, $sql);
		 if(mysqli_num_rows($rs)>0){
			$_SESSION["username"]	= $username ;
			$_SESSION["idKhachhang"] = $row["idKhachhang"];
			if($password == "Demo@123")
				echo"<script>window.location.href='change_password.php'</script>";
			else echo"<script>window.location.href='blank.php'</script>";
		 }
		 else
			 echo "<script>alert('Tài khoản hoặc mật khẩu không tồn tại')</script>";
		 
	 }
	?>
                <form method="post">
                    <table class="table table-striped table-bordered table-hover" style="width:50%" align="center">
                        <tbody>
                            <tr>
                                <td>Tên tài khoản<span style="color: red">(*)</span>:</td>
                                <td><input type="text" class="form-control" name="txtusername" placeholder="Tên đăng nhập"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu<span style="color: red">(*)</span>:</td>
                                <td><input type="password" class="form-control" name="txtpassword" placeholder="Mật khẩu"></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><button type="submit" name="button" class="btn btn-primary">Đăng nhập</button></td>
                            </tr>

                    </table>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/raphael.min.js"></script>
    <script src="../js/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/startmin.js"></script>

</body>

</html>
<?php
	session_start();
	if(isset($_SESSION["username"])){
      unset($_SESSION["username"]);}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
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
			 echo"<script>window.location.href='blank.php'</script>";
		 }
		 else
			 echo "<script>alert('Tài khoản hoặc mật khẩu không tồn tại')</script>";
		 
	 }
	?>
<center>
<form id="form1" name="frmLogin" method="post" action="login.php">
  <table width="401" border="1" style="margin-top: 20px" >
    <tbody>
      <tr>
        <td colspan="2" align="center">Đăng nhập Admin</td>
      </tr>
      <tr align="center">
        <td width="136">Tài khoản:</td>
        <td width="249"><input type="text" name="txtusername" id="textfield"></td>
      </tr>
      <tr align="center">
        <td>Mật khẩu:</td>
        <td><input type="password" name="txtpassword" id="textfield2"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Đăng nhập" onClick="checkLogin()">
        <input type="reset" name="reset" id="reset" value="Làm lại"></td>
      </tr>
    </tbody>
  </table>
	</center>
</form>
	
</body>
</html>
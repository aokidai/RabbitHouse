<?php 
	session_start();
	if(isset($_SESSION["username"]))
		$username	=	$_SESSION["username"];
	else
		header("location:login.php");
	include("../../include/connect.inc"); 
	$id		=	$_GET["id"];
	$sql	=	"delete from tblhoadon where iHhoadon=$id";
	$rs		=	mysqli_query($conn, $sql);


	if($rs)
		header("location:./giohang.php");

?>
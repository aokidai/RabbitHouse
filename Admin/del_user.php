<?php 
	session_start();
	if(isset($_SESSION["username"]))
		$username	=	$_SESSION["username"];
	else
		header("location:login.php");
	include("../include/connect.inc"); 
	$id		=	$_GET["id"];
	$sql	=	"delete from tblusers where id_user=$id";
	$rs		=	mysqli_query($conn, $sql);
	$sql	=	"delete from tblusers where id_user=$id";
	$rs		=	mysqli_query($conn, $sql);


	if($rs)
		header("location:list_user.php");
		header("location:list_user.php");

?>
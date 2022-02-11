<?php
	$currency = '$';
	$servername	=	"localhost";
	$username	=	"root";
	$pass		=	"";
	$dbname		=	"rabbithouse";
	$conn		=	@mysqli_connect($servername, $username, $pass, $dbname);
	mysqli_set_charset($conn, 'UTF8');
	if(!$conn)
		echo "Kết nối thất bại".mysqli_connect_error();
?>
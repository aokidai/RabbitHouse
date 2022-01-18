<?php
	include "connect.inc";
	$sql	=	"select * from tblloai ";
	$rs 	=	mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs)){
		echo "<li><i><a href=\"show_loai.php?idLoai=".$row['idLoai']."\">".$row["tenLoai"]."</a></i>";	
	}
?>

                
              
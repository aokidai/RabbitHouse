<?php 
	include("connect.inc"); 
	$sql		=	"select * from tblloai";
	$rs 		=	mysqli_query($conn, $sql);
	echo "<p><b>Loại món</b></p>
              <ul type=\"square\">";
	while($row=mysqli_fetch_array($rs)){
		echo "<li><i><a href=\"list_mon.php?idLoai=".$row["idLoai"]."\">".$row["tenLoai"]."</a></i>";
	}
	echo"</ul>";
?>
                
                
              
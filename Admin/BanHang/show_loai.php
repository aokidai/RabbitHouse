<?php 
session_start();
if(isset($_SESSION["username"])){
	$username	=	$_SESSION["username"];
	$idKhachhang = $_SESSION["idKhachhang"];}
else
	header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rabbit House</title>
	<link rel="icon" type="image/png" sizes="32x16" href="../../img/rabbithouse.png">
	<link rel="stylesheet" type="text/css" href="../../css/style.css?" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
#mon{
    width:240px;
    height:320px;
    margin:3px;
    text-align:center;
    float:left;
}
#tenMon{
    margin-top:5px;
    vertical-align:top;
    height: 40px;
	font-size: 25px;
}
#tenMon a{
    text-decoration: none;
    color:#000;
    font-size:25px;
}
#tenMon a:hover{
    color: #000;
}
#hinhAnh {
    width: 150px;
    height: 200px;
}
#hinhAnh:hover{
    transfrom: scale(1.1);
}
#dongia {
    margin-top:10px;
    font-size:30px;
}
#donGia span{
    color:#000;
    font-size: 30px;
    font-weight:bold;
}
#nutchonmua {
  height:30px;
}
	#ttLoai{
		display: block;
		margin-left: auto;
		margin-right: auto;
		font-family: 'Times New Roman', Times, serif;
		font-size: 40px;
		font-weight: bold;"
		margin-left: 50%;
	}
#info1{
    padding: 50px;
}
#info1 span{
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    font-family: 'Times New Roman', Times, serif;
    font-size: 40px;
    font-weight: bold;
}
#info1 ul{
    display: block;
    margin-left: auto;
    margin-right: auto; 
    list-style-type: none;
    overflow: hidden;
    text-align: center;
    margin-top: 30%;
}
#info1 ul li{
    display: list-item;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    list-style-position:unset;
    display: inline-block;
    list-style-type:none;
    line-height: 40px;
    margin-left: -2px;
    width: 120px;
    height: 40px;
}
#info1 ul li a img{
    width: 70px;
    height: 70px;
}
</style>
<body>
  <header>
    <div>
    <div id="logo"><a href="./BanHang.php"><img src="../../img/logo.png"></a></div>
    <div id="menu">
      <ul>
		<li><span>Ch??o: <?=$username?></span></li>
		<li><a href="./giohang.php">Gi??? h??ng</a></li>
		<li><a href="../blank.php">V??? qu???n tr???</a></li>
      </ul>
		</div>
  </div>
	  <div> <br/><br/><br/><br/><br/><br/><div align="center">
	  <form action="BanHang.php" method="GET">
			<input id="searchbar" name="txtsearchMon" type="text" placeholder="B???n ??ang t??m g???">
			<input type="submit" name="timKiem" value="????" title="T??m ki???m">
		</form>	</div>
		<script type="text/javascript">
		  $(function() {
			 $( "#searchbar" ).autocomplete({
			   source: 'ajax-mon-search.php',
			 });
		  });
		</script>	
		<br/>
		<?php
			include "../../include/connect.inc";
			if(isset($_GET["txtsearchMon"])){
				$searchMon = $_GET["txtsearchMon"];
				$sql = "select idMon, tenMon from tblmon where tenMon like '%$searchMon%' and conHang = 'O'";
				$rs = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($rs)){
					//echo "<div id='link' onClick='addText(\"".$row['tenMon']."\");'>" . $row['tenMon'] . "</div>"; 
					echo "<script>window.location.href='search.php?id=".$row["idMon"]."'</script>";
					
				}
				$tmp = $_GET["txtsearchMon"];
				if($tmp == $searchMon){
					echo("<span style=\"text-align:center; color:red; font-size: 30px\"><center>Kh??ng c?? s???n ph???m ????!</center></span>");
				}
			}
			
		?>

		</div>
  </header>
  <article>
	  </br> </br> </br>
	 <aside>
	  <div id="menu" align="center">
		  <span id="ttLoai">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lo???i m??n </span>
			<ul style="margin-right: 20%; margin-left:40%">
				<?php
					include "../../include/left.php";	
				?>
			</ul>
		</div>
	</aside>
	<section id="info" align="center" style="margin-left: 7%;">
		<span>M??n theo lo???i</span>
			<?php
				include "../../include/connect.inc";
				$idLoai	=	$_GET["idLoai"];
				$sql		=	"select * from tblmon where idLoai=$idLoai and conHang = 'O'";
				$rs 		=	mysqli_query($conn, $sql);	
				$count		=	mysqli_num_rows($rs);
				if($count>0)
					while($row=mysqli_fetch_array($rs)){	
			?>
			<div id="mon">
				<p id="tenMon"><a href="#" values="<?=$row["tenMon"]?>"><?=$row["tenMon"]?></a></p>
				<img id="hinhAnh" src="../../uploads/<?=$row["hinhAnh"]?>">
				<p id="donGia">????n gi??: <span><?=$row["gia"]?>VND</span></p>
				<a href='./hauGioHang.php?id=<?=$row["idMon"]?>'><img id="nutmuahang" src="../../img/Chonmua.png"></a>
			</div>
		<?php }
			else
				echo "<center><span style='margin-top:30px; font-size:30px; color:red'>Hi???n t???i kh??ng c?? m??n n??o!</span></center>"; 
		?>
	   </br></br>		
	  </section>  
	  </br></br>
        </article>
        <footer style="margin-top: 25%">
            <p style="text-align: center;">????????????????????????????????????????????????(??????????????????????????????????????????????????????)?????????????????????????????????<br/>???? 2021 Power by Dragon Inc</p>
        </footer>
        
</body>
</html>

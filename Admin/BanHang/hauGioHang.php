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
	margin-top: 100px;
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
    <div id="logo"><a href="./index2.php"><img src="../../img/logo.png"></a></div>
    <div id="menu">
      <ul>
		<li><span>Chào: <?=$username?></span></li>
		<li><a href="./giohang.php">Giỏ hàng</a></li>
		<li><a href="../blank.php">Về quản trị</a></li>
      </ul>
		</div>
  </div>
  </header>
	<br/><br/><br/>
  <article>
  <section id="info" align="center" style="margin-left: 10%">
		<span>Đưa SP vào Giỏ Hàng</span><br/><br/>
		<?php
		  include"../../include/connect.inc";
		  if(isset($_POST["txtSoLuong"])){
		   date_default_timezone_set('Asia/Ho_Chi_Minh');
		   $time_act = date('Y-m-d');
		   $idMon			=	$_POST["txtIdMon"];
		   $soLuong = $_POST["txtSoLuong"];
		   $sql3 = "select * from tblmon where idMon = ".$_GET["id"];
		   $rs3= mysqli_query($conn, $sql3);
		   $row3= mysqli_fetch_array($rs3);
		   if($rs3)
		   {
			   $gia			=	$row3["gia"];
			   $thanhTien		=  $soLuong*$gia;
			   $sql		=	"insert into tblhoadon(idKhachhang, idMon, soLuong, ngayThang, ThanhTien) values ('$idKhachhang', '$idMon', '$soLuong', '$time_act', '$thanhTien')"; 
			   $rs 				=	mysqli_query($conn, $sql);
			   if($rs){
					 echo"<script>window.location.href='./giohang.php'</script>";
			   }
				else
					echo"<script>alert('Thêm món không thành công')</script>";
		   }
		   
		 }else{
			$sql			=	"select * from tblmon where idMon= ".$_GET["id"];					
			$rs				=	mysqli_query($conn, $sql);
			$row			=	mysqli_fetch_array($rs);
			$tenMon			= 	$row["tenMon"];
			$gia 			=	$row["gia"];
		  }
		?>
		<form method="post" enctype="multipart/form-data">
		 <table class="table table-striped table-bordered table-hover" style="width:90%" align="center">
					<tbody>
						<tr>
						   <input type="text" hidden="true" name="txtIdMon" value='<?=$_GET["id"]?>'>
						</tr>
						<tr>

							<td>Tên món:</td>
							<td><input readonly class="form-control" name="txtTenMon" 
									   value="<?=$tenMon?>"></td>
						</tr>
						<tr>
						  <td>Giá:</td>
						  <td><input readonly class="form-control" name="txtGia" 
									 value="<?=$gia?>"></td>
						</tr>
						<tr>
						  <td>Số lượng</td>
						  <td><input type="number" class="form-control" name="txtSoLuong"></td>
						</tr>
						<tr>
						  <td>&nbsp;</td>
						  <td><button type="submit" class="btn btn-primary">Thêm</button><button type="reset" class="btn btn-warning" style="margin-left: 10px">Hũy</button></td>
						</tr>
				</table>
			</form>
	  </section>  
        </article>
        <footer>
            <p style="text-align: center;">掲載されているすべてのコンテンツ(記事、画像、音声データ、映像データ等)の無断転載を禁じます。<br/>🄫 2021 Power by Dragon Inc</p>
        </footer>
        
</body>
</html>

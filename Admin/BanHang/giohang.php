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
    <div id="logo"><a href="./BanHang.php"><img src="../../img/logo.png"></a></div>
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
  <section id="info" align="center">
	  <span>Giỏ Hàng</span><br/><br/>
	 <form method="post" action="giohang.php">
		 <div class="table-responsive table-bordered">
				<table class="table" align="center">
					<thead>
						<tr>
							<th><input type="checkbox" name="checkbox" class="chk_box"></th>
							<th>STT</th>
							<th>Tên món</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
							<th>Xóa </th>
						</tr>
					</thead>
					<script>
					 function del_confirm(strlink){
						 ok	=	confirm("Bạn có muốn xóa không?");
						 if(ok!=0)
							 window.location.href=strlink;
					 }
					</script>
					<tbody>
						<?php 
							$tinhtien=0;
							include("../../include/connect.inc"); 
							$sql		=	"select * from tblhoadon where idKhachhang = '$idKhachhang'";
							$rs 		=	mysqli_query($conn, $sql);
							$i			=	1;							
						  while($row=mysqli_fetch_array($rs)){	
							  $sql2	= 	"select * from tblmon where idMon = ".$row["idMon"]."";
									$rs2 		=	mysqli_query($conn, $sql2);
									$row2=mysqli_fetch_array($rs2);
							echo" <tr>
								<td><input type='checkbox' class='chk_box1' name='check_list[]' value='".$row["iHhoadon"]."'></td>
								<td>$i</td>
								<td>".$row2["tenMon"]."</td>
								<td>".$row["soLuong"]."</td>
								<td>".$tinhtien=$row["soLuong"]*$row2["gia"]."</td>
								<td><a href='javascript:del_confirm(\"del_giohang.php?id=".$row["iHhoadon"]."\")'>Xóa</a></td>
								</tr>";	
						   $i++;
						  }
						?>
						   <tr align="center">
								<?php
									if(isset($_POST["muahang"]))
									{
										$tongSL1 = $thanhTien1 = 0;
										date_default_timezone_set('Asia/Ho_Chi_Minh');
		   								$time_act = date('Y-m-d H:i:s');
										$sql3 = "select * from tblhoadon where idKhachhang = '$idKhachhang'";
										$rs3 = mysqli_query($conn, $sql3);
										while($row3 = mysqli_fetch_array($rs3)){
										   $idKhachhang2 = $row3["idKhachhang"];
										   $tongSL = $row3["soLuong"];
										   $tongSL1 = $tongSL1 +$tongSL;
										   $thanhTien = $row3["ThanhTien"];
										   $thanhTien1 = $thanhTien1 + $thanhTien;
										}
										$sql5 = "insert into tblchitiethd(idKhachhang, tongSL, tongTien, ngayThang) values ('$idKhachhang2', '$tongSL1', '$thanhTien1', '$time_act')";
										   $rs5 = mysqli_query($conn, $sql5);
										   if($rs5){
											   $sql6 = "delete from tblhoadon where idKhachhang = '$idKhachhang'";
											   $rs6 = mysqli_query($conn, $sql6);
											   echo"<script>window.location.href='./BanHang.php'</script>";
											}
											else echo "<script>alert('Mua hàng không thành công!')</script>";
									}
									else if(isset($_POST["xoahang"])){
										foreach($_POST['check_list'] as $check) {
												$sql9 = "delete from tblhoadon where iHhoadon = '$check'";
												$rs = mysqli_query($conn, $sql9);
										}
										 echo"<script>window.location.href='giohang.php'</script>";
									}
								?>
								<th colspan="6" align="center">
									<input type="submit" class="btn btn-success" style="background-color: red" name="muahang" value="Mua hàng">
									<input type="submit" class="btn btn-success" name="xoahang" value="Xóa hàng">
								</th>
					</tr>
					</tbody>
				</table>
			</div>
			</form>
	  		<script type="text/javascript">
				$(function() {
					$('.chk_box').click(function() {
						$('.chk_box1').prop('checked', this.checked);
					});
				});
			</script> 
	  </section>  
        </article>
        <footer>
            <p style="text-align: center;">掲載されているすべてのコンテンツ(記事、画像、音声データ、映像データ等)の無断転載を禁じます。<br/>🄫 2021 Power by Dragon Inc</p>
        </footer>
        
</body>
</html>

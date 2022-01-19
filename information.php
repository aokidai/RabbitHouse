<?php 
session_start();
if(isset($_SESSION["username"])){
	$username	=	$_SESSION["username"];
	$idKhachhang = $_SESSION["idKhachhang"];
}
else
	header("location:login.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rabbit House</title>
	<link rel="icon" type="image/png" sizes="32x16" href="./img/rabbithouse.png">
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
	<link rel="stylesheet" type="text/css" href="./css/style.css?" />
	<!-- jQuery -->
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
</style>
<script>
	function checkLogin(){
		if(document.frmLogin.txtName.value==""){
			alert("Nhập họ tên!");
			document.form.txtName.focus();
			return;
		}
		if(document.frmLogin.txtSDT.value==""){
			alert("Nhap số điện thoại!");
			document.form.txtSDT.focus();
			return;
		}
		if(document.frmLogin.txtDiaChi.value==""){
			alert("Nhap số địa chỉ!");
			document.form.txtDiaChi.focus();
			return;
		}
		if(document.frmLogin.txtusername.value==""){
			alert("Nhap username!");
			document.form.txtusername.focus();
			return;
		}
		if(document.frmLogin.txtpassword.value==""){
			alert("Nhap password!");
			document.form.txtpassword.focus();
			return;
		}
		if(document.frmLogin.txtrepassword.value==""){
			alert("Nhap password!");
			document.form.txtrepassword.focus();
			return;
		}
		document.frmLogin.submit();
	}
</script>	

<body>
	<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "784897768537480");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
	<header>
    <div>
    <div id="logo"><a href="./index2.php"><img src="./img/logo.png"></a></div>
    <div id="menu">
      <ul>
		<li><span>Chào: <?=$username?></span></li>
		<li><a href="./giohang.php">Giỏ hàng</a></li>
		<li><a href="./index.php">Đăng xuất</a></li>
      </ul>
		</div>
		<div id="menu" style="margin-left: 50%">
			<ul>
        <li><a href="./produce.php">Sản phẩm</a></li>
        <li><a href="./information.php">Thông tin</a></li>
	</ul>
    </div>
		<div> <br/><br/><br/><br/><br/><br/><div align="center">
	  <form action="information.php" method="GET">
			<input id="searchbar" name="txtsearchMon" type="text" placeholder="Bạn đang tìm gì?">
			<input type="submit" name="timKiem" value="🔍">
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
			include "./include/connect.inc";
			if(isset($_GET["timKiem"])){
				$searchMon = $_GET["txtsearchMon"];
				$sql = "select idMon, tenMon from tblmon where tenMon like '%$searchMon%'and conHang = 'Còn'";
				$rs = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($rs)){
					//echo "<div id='link' onClick='addText(\"".$row['tenMon']."\");'>" . $row['tenMon'] . "</div>"; 
					echo "<script>window.location.href='search.php?id=".$row["idMon"]."'</script>";
				}
				$tmp = $_GET["txtsearchMon"];
				if($tmp == $searchMon){
					echo("<span style=\"text-align:center; color:red; font-size: 30px\"><center>Không có sản phẩm đó!</center></span>");
				}
			}
			
		?>

		</div>
  </div>
  </header>
  <div id="body">
   <br/> 
	  <?php 
	include "./include/connect.inc";
	 if(isset($_POST["txtusername"])){
		 $tenKH	= $_POST["txtName"];
		 $soDT = $_POST["txtSDT"];
		 $diaChi= $_POST["txtDiaChi"];
		 $username	=	$_POST["txtusername"];
		 $sql			=	"update tblkhachhang set  tenKH= '$tenKH', SDT='$soDT', username='$username', diachi='$diaChi' where idKhachhang='$idKhachhang'";
		$rs 			=	mysqli_query($conn, $sql);
		if($rs)
			 echo "<script>alert('Lưu thành công!')</script>";
			 echo"<script>window.location.href='information.php'</script>";
		 }
		else{
			$sql		=	"select * from tblkhachhang where idKhachhang='$idKhachhang'";						
			$rs 		=	mysqli_query($conn, $sql);
			$row		=	mysqli_fetch_array($rs);
			$tenKH	=	$row["tenKH"];
			$soDT = $row["SDT"];
			$username=$row["username"];
			$diaChi=$row["diachi"];
		}
	?>
<center>
<form id="form" name="frmLogin" method="post" action="information.php">
  <table width="401" border="1" style="margin-top: 20px" >
    <tbody>
      <tr>
        <td colspan="2" align="center">Thông tin tài khoản</td>
      </tr>
	  <tr align="center">
        <td width="136">Họ tên<span style="color: red">(*)</span>:</td>
        <td width="249"><input type="text" name="txtName" id="textfield4" value="<?=$tenKH?>"></td>
      </tr>
      <tr align="center">
        <td>Số ĐT<span style="color: red">(*)</span>:</td>
        <td><input type="number" name="txtSDT" id="textfield5" value="<?=$soDT?>"></td>
      </tr>
		<tr align="center">
        <td>Địa chỉ<span style="color: red">(*)</span>:</td>
        <td><input type="text" name="txtDiaChi" id="textfield5" value="<?=$diaChi?>"></td>
      </tr>
      <tr align="center">
        <td width="136">Tài khoản<span style="color: red">(*)</span>:</td>
        <td width="249"><input type="text" name="txtusername" id="textfield" value="<?=$username?>"></td>
      </tr>
      <tr align="center">
        <td colspan="2"><input type="button" name="button" id="button" value="Lưu" onClick="checkLogin()">
        </td>
      </tr>
		 <tr>
			 <td colspan="2"><a href="./forgot.php"><span style="float: right; color: red"><i>Đổi mật khẩu?</i></span></a></td>
      </tr>
    </tbody>
  </table>
	<a href="./lichsumuahang.php">Lịch sử mua hàng</a>
	</center>
</form>
	  <br/><br/><br/>
	 <footer>
            <p style="text-align: center;">掲載されているすべてのコンテンツ(記事、画像、音声データ、映像データ等)の無断転載を禁じます。<br/>🄫 2021 Power by Dragon Inc</p>
        </footer>
</body>
</html>
<?php
session_start();
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
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
	#mon {
		width: 240px;
		height: 320px;
		margin: 3px;
		text-align: center;
		float: left;
	}

	#tenMon {
		margin-top: 5px;
		vertical-align: top;
		height: 40px;
		font-size: 25px;
	}

	#tenMon a {
		text-decoration: none;
		color: #000;
		font-size: 25px;
	}

	#tenMon a:hover {
		color: #000;
	}

	#hinhAnh {
		width: 150px;
		height: 200px;
	}

	#hinhAnh:hover {
		transfrom: scale(1.1);
	}

	#dongia {
		margin-top: 10px;
		font-size: 30px;
	}

	#donGia span {
		color: #000;
		font-size: 30px;
		font-weight: bold;
	}

	#nutchonmua {
		height: 30px;
	}

	* {
		box-sizing: border-box
	}

	body {
		font-family: Verdana, sans-serif;
		margin: 0
	}

	.mySlides {
		display: none
	}

	img {
		vertical-align: middle;
	}

	/* Slideshow container */
	.slideshow-container {
		max-width: 1000px;
		position: relative;
		margin: auto;
	}

	/* Next & previous buttons */
	.prev,
	.next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -22px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
	}

	/* Position the "next button" to the right */
	.next {
		right: 0;
		border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
		background-color: rgba(0, 0, 0, 0.8);
	}

	/* Caption text */
	.text {
		color: #f2f2f2;
		font-size: 15px;
		padding: 8px 12px;
		position: absolute;
		bottom: 8px;
		width: 100%;
		text-align: center;
	}

	/* Number text (1/3 etc) */
	.numbertext {
		color: #f2f2f2;
		font-size: 12px;
		padding: 8px 12px;
		position: absolute;
		top: 0;
	}

	/* The dots/bullets/indicators */
	.dot {
		cursor: pointer;
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.6s ease;
	}

	.active,
	.dot:hover {
		background-color: #717171;
	}

	/* Fading animation */
	.fade {
		-webkit-animation-name: fade;
		-webkit-animation-duration: 1.5s;
		animation-name: fade;
		animation-duration: 1.5s;
	}

	@-webkit-keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}

	@keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}

	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {

		.prev,
		.next,
		.text {
			font-size: 11px
		}
	}
</style>
<script>
	function checkLogin() {
		if (document.frmLogin.txtName.value == "") {
			alert("Nhập họ tên!");
			document.form.txtName.focus();
			return;
		}
		if (document.frmLogin.txtSDT.value == "" || document.frmLogin.txtSDT.value.length > 10 || document.frmLogin.txtSDT.value.length < 9) {
			alert("Nhap số điện thoại!");
			document.form.txtSDT.focus();
			return;
		}
		if (document.frmLogin.txtDiaChi.value == "") {
			alert("Nhap số địa chỉ!");
			document.form.txtDiaChi.focus();
			return;
		}
		if (document.frmLogin.txtusername.value == "") {
			alert("Nhap username!");
			document.form.txtusername.focus();
			return;
		}
		if (document.frmLogin.txtpassword.value == "") {
			alert("Nhap password!");
			document.form.txtpassword.focus();
			return;
		}
		if (document.frmLogin.txtrepassword.value == "") {
			alert("Nhap password!");
			document.form.txtrepassword.focus();
			return;
		}
		document.frmLogin.submit();
	}
</script>

<body>
	<header>
		<div>
			<div id="logo"><a href="./index.php" title="Trang chủ"><img src="./img/logo.png"></a></div>
		</div>
	</header>
	<div id="body">
		<div id="photo" style="padding-top: 5%">
			<div class="slideshow-container">

				<div class="mySlides fade">
					<img src="./img/bg-photo-1.jpg" style="width:100%">
				</div>

				<div class="mySlides fade">
					<img src="./img/bg-photo-2.jpg" style="width:100%">
				</div>

				<div class="mySlides fade">
					<img src="./img/bg-photo-3.jpg" style="width:100%">
				</div>

				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
			<br>

			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
			</div>

			<script>
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";
					}
					slideIndex++;
					if (slideIndex > slides.length) {
						slideIndex = 1
					}
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex - 1].style.display = "block";
					dots[slideIndex - 1].className += " active";
					setTimeout(showSlides, 5000);
				}
			</script>
			<?php
			if (isset($_POST["txtusername"])) {
				include "./include/connect.inc";
				$tenKH	= $_POST["txtName"];
				$soDT = $_POST["txtSDT"];
				$diaChi = $_POST["txtDiaChi"];
				$username	=	$_POST["txtusername"];
				$password	=	$_POST["txtpassword"];
				$repassword =	$_POST["txtrepassword"];
				if ($password == $repassword) {
					$sql		=	"insert into tblkhachhang(tenKH, SDT, username, password, diachi) values('$tenKH', '$soDT', '$username', '$password', '$diaChi')";
					$rs		=	mysqli_query($conn, $sql);
					if ($rs) {
						echo "<script>window.location.href='login.php'</script>";
					} else
						echo "<script>alert('Sai thông tin')</script>";
				} else
					echo "<script>alert('Mật khẩu không trùng nhau!')</script>";
			}
			?>
			<center>
				<form id="form" name="frmLogin" method="post" action="create.php">
					<table class="table table-striped table-bordered table-hover" style="width:50%; margin-top: 20px">
						<tbody>
							<tr>
								<td colspan="2" align="center"><span style="font-weight: bold; font-size:20px; font-family: 'Times New Roman', Times, serif;">Đăng kí tài khoản</span></td>
							</tr>
							<tr align="center">
								<td>Họ tên<span style="color: red">(*)</span>:</td>
								<td><input type="text" class="form-control" name="txtName" placeholder="Họ tên" id="textfield4"></td>
							</tr>
							<tr align="center">
								<td>Số ĐT<span style="color: red">(*)</span>:</td>
								<td><input type="number" class="form-control" name="txtSDT" id="textfield5" placeholder="090xxxxxxx"></td>
							</tr>
							<tr align="center">
								<td>Địa chỉ<span style="color: red">(*)</span>:</td>
								<td><input type="text" class="form-control" name="txtDiaChi" id="textfield5" placeholder="Địa chỉ"></td>
							</tr>
							<tr align="center">
								<td>Tài khoản<span style="color: red">(*)</span>:</td>
								<td><input type="text" class="form-control" name="txtusername" id="textfield" placeholder="Tên tài khoản"></td>
							</tr>
							<tr align="center">
								<td>Mật khẩu<span style="color: red">(*)</span>:</td>
								<td><input type="password" class="form-control" name="txtpassword" id="textfield2" placeholder="Mật khẩu"></td>
							</tr>
							<tr align="center">
								<td>Nhập lại mật khẩu<span style="color: red">(*)</span>:</td>
								<td><input type="password" class="form-control" name="txtrepassword" id="textfield2" placeholder="Nhập lại mật khẩu"></td>
							</tr>
							<tr align="center">
								<td colspan="2"><input type="button" class="btn btn-primary" name="button" id="button" value="Tạo tài khoản" onClick="checkLogin()" title="Tạo tài khoản và đăng nhập"></td>
							</tr>
							<tr>
								<td colspan="2"><a href="./forgot.php"><span style="float: right; color: red" title="Bạn có tài khoản nhưng quên mật khẩu?"><i>Quên mật khẩu?</i></span></a></td>
							</tr>
							<tr align="center">
								<td colspan="2"><a href="./login.php"><span style="text-align: center; color: blue" title="Bạn đã có tài khoản và cần đăng nhập?"><i>Bạn có tài khoản?</i></span></a></td>
							</tr>
						</tbody>
					</table>
			</center>
			</form>
			<footer>
				<div style="text-align: center;">
        <p>Liên hệ: Cafe Rabbit House X Dragon Inc<br />
          〒542-0081 3-1 Minamisenba, Chuo-ku, Osaka-shi, Osaka<br />
          Tel/Fax: 03-6472-xxxx<br />
          Mobile: 090-3176-4xxx<br />
          E-mail: info@dragoninc.co.jp</p>
        <p>🄫 2021 Power by Dragon Inc</p>
      </div>
			</footer>
</body>

</html>
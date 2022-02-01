<?php
session_start();
if (isset($_SESSION["username"])) {
	$username	=	$_SESSION["username"];
	$idKhachhang = $_SESSION["idKhachhang"];
} else
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Rabbit House</title>
	<link rel="icon" type="image/png" sizes="32x16" href="./img/rabbithouse.png">
	<link rel="stylesheet" type="text/css" href="./css/style2.css?" />
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
	#mon {
		width: 240px;
		height: 320px;
		margin: 3px;
		margin-top: 100px;
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

	#info1 {
		padding: 50px;
	}

	#info1 span {
		text-align: center;
		display: block;
		margin-left: auto;
		margin-right: auto;
		font-family: 'Times New Roman', Times, serif;
		font-size: 40px;
		font-weight: bold;
	}

	#info1 ul {
		display: block;
		margin-left: auto;
		margin-right: auto;
		list-style-type: none;
		overflow: hidden;
		text-align: center;
		margin-top: 30%;
	}

	#info1 ul li {
		display: list-item;
		text-rendering: optimizeLegibility;
		-webkit-font-smoothing: antialiased;
		list-style-position: unset;
		display: inline-block;
		list-style-type: none;
		line-height: 40px;
		margin-left: -2px;
		width: 120px;
		height: 40px;
	}

	#info1 ul li a img {
		width: 70px;
		height: 70px;
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

<body>
	<?php $user = $username ?>
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
				xfbml: true,
				version: 'v11.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<header>
		<div>
			<div id="logo"><a href="./index2.php" title="Trang chủ"><img src="./img/logo.png"></a></div>
			<div id="menu">
			<ul>
					<li><a href="./giohang.php" title="Giỏ hàng những món đã chọn">Giỏ hàng</a></li>
					<li><a href="./produce.php" title="Xem các sản phẩm theo loại">Sản phẩm</a></li>
					<li><a href="./information.php" title="Thông tin tài khoản">Thông tin</a></li>
					<li style="width: 200px;"><a href="./index.php" title="Đăng xuất">Chào:
							<?php include "./include/connect.inc";
							$sql090 = "select tenKH from tblkhachhang where idKhachhang = '$idKhachhang'";
							$rs090 = mysqli_query($conn, $sql090);
							$row090 = mysqli_fetch_array($rs090);
							$hoTen = $row090["tenKH"];
							echo $hoTen;
							?>
						</a>
					</li>
				</ul>
			</div>
			<div> <br /><br /><br />
				<div align="center">
					<form action="index2.php" method="GET">
						<input id="searchbar" name="txtsearchMon" type="text" placeholder="Bạn đang tìm gì?">
						<input type="submit" name="timKiem" value="🔍" title="Tìm kiếm">
					</form>
				</div>
				<script type="text/javascript">
					$(function() {
						$("#searchbar").autocomplete({
							source: 'ajax-mon-search.php',
						});
					});
				</script>
				<br />
				<?php
				include "./include/connect.inc";
				if (isset($_GET["txtsearchMon"])) {
					$searchMon = $_GET["txtsearchMon"];
					$sql = "select idMon, tenMon from tblmon where tenMon like '%$searchMon%' and conHang = 'Còn'";
					$rs = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($rs)) {
						//echo "<div id='link' onClick='addText(\"".$row['tenMon']."\");'>" . $row['tenMon'] . "</div>"; 
						echo "<script>window.location.href='search.php?id=" . $row["idMon"] . "'</script>";
					}
					$tmp = $_GET["txtsearchMon"];
					if ($tmp == $searchMon) {
						echo ("<span style=\"text-align:center; color:red; font-size: 30px\"><center>Không có sản phẩm đó!</center></span>");
					}
				}

				?>

			</div>
	</header>
	<div id="body">
		<div id="photo">
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
		</div>
		<article>
			<section id="info" align="center">
				<?php
				$sql3 = "select id, value1 from sensordata order by id DESC limit 1";
				$rs3 = mysqli_query($conn, $sql3);
				while ($row3 = mysqli_fetch_array($rs3)) {
					$nhietDo = $row3["value1"];
				}
				?>
				<span>Gợi ý món <span style="font: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif', normal; font-size: 20px">(Nhiệt độ: <?= $nhietDo ?> độ)</span></span>
				<div style="margin-left: 10%">
					<?php
					include "include/connect.inc";
					$sql2 = "select id, value1 from sensordata order by id DESC limit 1";
					$rs2 = mysqli_query($conn, $sql2);
					$nhietDo = 0;
					while ($row2 = mysqli_fetch_array($rs2)) {
						$nhietDo = $row2["value1"];
						if ($nhietDo == 0) {
							$sql		=	"select * from tblmon where goiY = 0 and conHang = 'Còn'  limit 0, 12";
							$rs 		=	mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($rs)) {
					?>
								<div id="mon">
									<p id="tenMon"><a href="#" values="<?= $row["tenMon"] ?>"><?= $row["tenMon"] ?></a></p>
									<img id="hinhAnh" src="uploads/<?= $row["hinhAnh"] ?>">
									<p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
									<a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Thêm vào giỏ hàng"><img id="nutmuahang" src="./img/Chonmua.png"></a>
								</div>
							<?php }
						} else if ($nhietDo < 29) {
							$sql		=	"select * from tblmon where goiY < 29 and conHang = 'Còn' limit 0, 12";
							$rs 		=	mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($rs)) {
							?>
								<div id="mon">
									<p id="tenMon"><a href="#" values="<?= $row["tenMon"] ?>"><?= $row["tenMon"] ?></a></p>
									<img id="hinhAnh" src="uploads/<?= $row["hinhAnh"] ?>">
									<p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
									<a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Thêm vào giỏ hàng"><img id="nutmuahang" src="./img/Chonmua.png"></a>
								</div>
							<?php }
						} else if ($nhietDo > 28) {
							$sql		=	"select * from tblmon where goiY > 28 and conHang = 'Còn' limit 0, 12";
							$rs 		=	mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($rs)) {
							?>
								<div id="mon">
									<p id="tenMon"><a href="#" values="<?= $row["tenMon"] ?>"><?= $row["tenMon"] ?></a></p>
									<img id="hinhAnh" src="uploads/<?= $row["hinhAnh"] ?>">
									<p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
									<a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Thêm vào giỏ hàng"><img id="nutmuahang" src="./img/Chonmua.png"></a>
								</div>
					<?php
							}
						}
					} ?>
				</div>
			</section>
			</br></br>
			<section id="info" align="center" style="padding-top: 35%;">
				<span>Món mới</span>
				<div style="padding-left: 10%;">
					<?php
					$sql		=	"select * from tblmon where conHang = 'Còn' limit 0, 12";
					$rs 		=	mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($rs)) {
					?>
						<div id="mon">
							<p id="tenMon"><a href="#" values="<?= $row["tenMon"] ?>"><?= $row["tenMon"] ?></a></p>
							<img id="hinhAnh" src="uploads/<?= $row["hinhAnh"] ?>">
							<p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
							<a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Thêm vào giỏ hàng"><img id="nutmuahang" src="./img/Chonmua.png"></a>
						</div>
					<?php } ?>
				</div>
			</section>
			</br></br>
			<div id="info1" style="padding-top: 45%">
				</br></br>
				<span style="margin-top: 200px">Twitter</span>
				<div id="cont-footer-twitter" style="padding: 30px; float:left; margin-left:17%">
					<div class="twitter-widget" style="text-align: center;">
						<a class="twitter-timeline" style="text-align: center" ; data-height="300" data-width="800" data-theme="white" data-link-color="#ef3488" data-border-color="#ef3488" data-chrome="noheader nofooter noborders transparent" href="https://twitter.com/aokidaisuke91">ツイートの青木大介</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
				<ul>
					<li><a href="https://twitter.com/intent/tweet?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82%0D%0A&%E3%81%BF%E3%82%93%E3%81%AA%E3%81%95%E3%82%93%E3%82%88%E3%82%8D%E3%81%97%E3%81%8F%EF%BD%9E&hashtags=&related=" title="Twitter"><img src="./img/twitter.png"></a></li>
					<li><a href="https://social-plugins.line.me/lineit/share?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82" title="Line"><img src="./img/line.png"></a></li>
					<li><a href="#" title="Facebook"><img src="./img/facebook.png"></a></li>
				</ul>
			</div>
		</article>
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
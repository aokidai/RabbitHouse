<?php
session_start();
if (isset($_SESSION["username"])) {
	$username	=	$_SESSION["username"];
	$idKhachhang = $_SESSION["idKhachhang"];
} else
	header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Rabbit House</title>
	<link rel="icon" type="image/png" sizes="32x16" href="../img/rabbithouse.png">
	<link rel="stylesheet" type="text/css" href="../css/style2.css?" />
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
</style>

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
		<?php include "./header.php"; ?>
		<div> <br /><br /><br />
			<div align="center">
				<form action="giohang.php" method="GET">
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
			include "../include/connect.inc";
			if (isset($_GET["timKiem"])) {
				$searchMon = $_GET["txtsearchMon"];
				$sql = "select idMon, tenMon from tblmon where tenMon like '%$searchMon%' and conHang = 'O'";
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
		</div>
	</header>
	<div id="body">
		<article>
			<section id="info" align="center">
				<span>Giỏ Hàng</span>
				<?php
				$sql000 = "select * from tblkhuyenmai";
				$rs000 = mysqli_query($conn, $sql000);
				while ($row000 = mysqli_fetch_array($rs000)) {
					$TGBDtmp1 = $row000["thoiGianBD"];
					$TGKTtmp1 = $row000["thoiGianKT"];
					$khuyenMai1 = $row000["khuyenMai"];
					$tenKM = $row000["tenKM"];
					date_default_timezone_set('Asia/Ho_Chi_Minh');
					$time_act1 = date('Y-m-d H:i:s');
					if ($TGBDtmp1 <= $time_act1 && $time_act1 <= $TGKTtmp1) {
						echo "<label style='color: red; font-weight: bold'>Rabbit House đang có chương trình $tenKM</label>";
					}
				}
				?>
				<form method="post" action="giohang.php">
					<div style="float: left; margin-bottom: 10px; margin-left: 35px;">
						<input type="submit" class="btn btn-success" name="xoahang" value="Xóa hàng" title="Chọn vào những món muốn xóa và nhấn Xóa hàng">
					</div>
					<div class="table-responsive table-bordered">
						<table class="table" style="width:97%" align="center">
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
								function del_confirm(strlink) {
									ok = confirm("Bạn có muốn xóa không?");
									if (ok != 0)
										window.location.href = strlink;
								}
							</script>
							<tbody>
								<?php
								$tinhtien = 0;
								include("../include/connect.inc");
								$sql		=	"select * from tblhoadon where idKhachhang = '$idKhachhang'";
								$rs 		=	mysqli_query($conn, $sql);
								$i			=	1;
								while ($row = mysqli_fetch_array($rs)) {
									$soluong = $row["soLuong"];
									$sql2	= 	"select * from tblmon where idMon = " . $row["idMon"] . "";
									$rs2 		=	mysqli_query($conn, $sql2);
									$row2 = mysqli_fetch_array($rs2);
									$tinhtien = $soluong * $row2["gia"];
									echo " <tr>
									<td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["iHhoadon"] . "'></td>
									<td>$i</td>
									<td>" . $row2["tenMon"] . "</td>
									<td>$soluong</td>
									<td>$tinhtien</td>
									<td><a href='javascript:del_confirm(\"del_giohang.php?id=" . $row["iHhoadon"] . "\")'>Xóa</a></td>
									</tr>";
									$i++;
								}
								?>
								<tr align="right">
									<td colspan="6" style="text-align: centerright; font-weight: bold">Thành tiền:
										<?php
										error_reporting(E_ERROR | E_PARSE);
										$thanhTien111 = $thanhTien11 = 0;
										$sql11 = "select * from tblhoadon where idKhachhang = '$idKhachhang'";
										$rs11 = mysqli_query($conn, $sql11);
										while ($row11 = mysqli_fetch_array($rs11)) {
											$thanhTien111 = $row11["ThanhTien"];
											$sql00 = "select * from tblkhuyenmai";
											$rs00 = mysqli_query($conn, $sql00);
											$row00 = mysqli_fetch_array($rs00);
											$TGBDtmp = $row00["thoiGianBD"];
											$TGKTtmp = $row00["thoiGianKT"];
											$khuyenMai = $row00["khuyenMai"];
											date_default_timezone_set('Asia/Ho_Chi_Minh');
											$time_act = date('Y-m-d H:i:s');
											if ($TGBDtmp <= $time_act && $time_act <= $TGKTtmp) {
												$thanhTien11 = $thanhTien11 + $thanhTien111 - ($khuyenMai * 100);
											} else $thanhTien11 = $thanhTien11 + $thanhTien111;
										}
										echo $thanhTien11;
										?>
									</td>
								</tr>
								<tr align="center">
									<?php
									if (isset($_POST["muahang"])) {
										if ($thanhTien11 == 0 || $thanhTien11 == null) {
											echo "<script>alert('Không có hàng trong giỏ hàng!')</script>";
											echo "<script>window.location.href='index.php'</script>";
										}
										$tongSL1 = $thanhTien1 = 0;
										date_default_timezone_set('Asia/Ho_Chi_Minh');
										$time_act = date('Y-m-d H:i:s');
										$sql3 = "select * from tblhoadon where idKhachhang = '$idKhachhang'";
										$rs3 = mysqli_query($conn, $sql3);
										while ($row3 = mysqli_fetch_array($rs3)) {
											$idKhachhang2 = $row3["idKhachhang"];
											$tongSL = $row3["soLuong"];
											$tongSL1 = $tongSL1 + $tongSL;
											$thanhTien = $row3["ThanhTien"];
											$thanhTien1 = $thanhTien1 + $thanhTien;
											$idMon1 = $row3["idMon"];
											$sql10 = "select * from tblkhachhang where idKhachhang = '$idKhachhang'";
											$rs10 = mysqli_query($conn, $sql10);
											while ($row10 = mysqli_fetch_array($rs10)) {
												$diaChi = $row10["diachi"];
											}
											$giaoHang = "X";
											$idStafftmp = 0;
											$sql5 = "insert into tblchitiethd(idKhachhang, tongSL, tongTien, ngayThang, diaChiGH, daGH, idMon, idStaff, khuyenmai) values ('$idKhachhang2', '$tongSL', '$thanhTien', '$time_act', '$diaChi', '$giaoHang', '$idMon1', '$idStafftmp', '$khuyenMai')";
											$rs5 = mysqli_query($conn, $sql5);
											if ($rs5) {
												$sql44 = "select max(idChiTiet) as idCTHD from tblchitiethd";
												$rs44 = mysqli_query($conn, $sql44);
												$row44 = mysqli_fetch_array($rs44);
												$idCTHD = $row44["idCTHD"];
												$sql20 = "select * from tblhoadon where idKhachhang = '$idKhachhang'";
												$rs20 = mysqli_query($conn, $sql20);
												while ($row20 = mysqli_fetch_array($rs20)) {
													$thanhTien4 = $row20["ThanhTien"];
													$thanhTien4tmp = $row20["ThanhTien"];
													$sql00 = "select * from tblkhuyenmai";
													$rs00 = mysqli_query($conn, $sql00);
													$row00 = mysqli_fetch_array($rs00);
													$TGBDtmp = $row00["thoiGianBD"];
													$TGKTtmp = $row00["thoiGianKT"];
													$khuyenMai = $row00["khuyenMai"];
													date_default_timezone_set('Asia/Ho_Chi_Minh');
													$time_act = date('Y-m-d H:i:s');
													if ($TGBDtmp <= $time_act && $time_act <= $TGKTtmp) {
														$thanhTien4 = $thanhTien4tmp - ($khuyenMai * 100);
													} else $thanhTien4 = $thanhTien4tmp;
													$idMon4 = $row20["idMon"];
													$trangThaiGHtmp = "X";
													$sql8 = "insert into tbllichsu(idKhachhang, idMon, soluong, gia, thoigian, daGH, idChitiet) values ('$idKhachhang2', '$idMon4', '$tongSL', '$thanhTien4', '$time_act', '$trangThaiGHtmp', '$idCTHD')";
													$rs8 = mysqli_query($conn, $sql8);
													if ($rs8) {
														$sql6 = "delete from tblhoadon where idKhachhang = '$idKhachhang'";
														$rs6 = mysqli_query($conn, $sql6);
														echo "<script>alert(\"Quý khách thanh toán " . $thanhTien11 . " và nhân viên sẽ giao hàng tại địa chỉ " . $diaChi . ". Cảm ơn quý khách đã sử dụng dịch vụ. Chúc quý khách một ngày tốt lành.\");</script>";
														echo "<script>window.location.href='./index.php'</script>";
													}
												}
											} else echo "<script>alert('Mua hàng không thành công!')</script>";
										}
									} else if (isset($_POST["xoahang"])) {
										foreach ($_POST['check_list'] as $check) {
											$sql9 = "delete from tblhoadon where iHhoadon = '$check'";
											$rs9 = mysqli_query($conn, $sql9);
										}
										echo "<script>window.location.href='giohang.php'</script>";
									}

									?>
									<td colspan="6" align="center">
										<input type="submit" class="btn btn-success" id="muahang" style="background-color: red; height: 35px;" name="muahang" title="Mua hàng và thanh toán cho nhân viên giao hàng" value="Thanh toán khi nhận hàng">
										<div style="padding-top: 10px; width: 212px;">
											<?php
											$tiGiaHT = 22809;
											$thanhTienVND1 = ($thanhTien11 * 1) / $tiGiaHT;
											$thanhTienVND = round($thanhTienVND1, 2);
											?>
											<div id="smart-button-container">
												<div style="text-align: center;">
													<div id="paypal-button-container"></div>
												</div>
											</div>
											<script src="https://www.paypal.com/sdk/js?client-id=Acs-sQI19oaPGRrKfZdnaRtavv9DQa9aiavcQ7hKetDVc8ZLlsMObUIQNmY1ia2yUIfWswxU5vKTeKmN&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
											<script>
												function initPayPalButton() {
													paypal.Buttons({
														style: {
															shape: 'rect',
															color: 'gold',
															layout: 'vertical',
															label: 'paypal',

														},

														createOrder: function(data, actions) {
															return actions.order.create({
																purchase_units: [{
																	"amount": {
																		"currency_code": "USD",
																		"value": <?= $thanhTienVND ?>
																	}
																}]
															});
														},

														onApprove: function(data, actions) {
															return actions.order.capture().then(function(orderData) {

																// Full available details
																console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

																// Show a success message within this page, e.g.
																const element = document.getElementById('paypal-button-container');
																element.innerHTML = '';
																element.innerHTML = '<h3>Cảm ơn quý khách đã thanh toán!</h3>';

																// Or go to another URL:  actions.redirect('thank_you.html');
																document.getElementById("muahang").click();
															});
														},

														onError: function(err) {
															console.log(err);
														}
													}).render('#paypal-button-container');
												}
												initPayPalButton();
											</script>
										</div>
									</td>
								</tr>
								<tr align="center">
									<th colspan="6">
										<center><label style="background-color: #f2f2f2; width: 150px; border-radius: 10px;"><a href="./export_hoadon.php" target="_blank">📜 Xuất hóa đơn</a></label></center>
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
			<div id="info1">
				<span style="margin-top: 5px">Twitter</span>
				<div id="cont-footer-twitter" style="padding: 30px; float:left; margin-left:17%">
					<div class="twitter-widget" style="text-align: center;">
						<a class="twitter-timeline" style="text-align: center" ; data-height="300" data-width="800" data-theme="white" data-link-color="#ef3488" data-border-color="#ef3488" data-chrome="noheader nofooter noborders transparent" href="https://twitter.com/aokidaisuke91">ツイートの青木大介</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
				<ul>
					<li><a href="https://twitter.com/intent/tweet?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82%0D%0A&%E3%81%BF%E3%82%93%E3%81%AA%E3%81%95%E3%82%93%E3%82%88%E3%82%8D%E3%81%97%E3%81%8F%EF%BD%9E&hashtags=&related=" title="Twitter"><img src="../img/twitter.png"></a></li>
					<li><a href="https://social-plugins.line.me/lineit/share?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82" title="Line"><img src="../img/line.png"></a></li>
					<li><a href="#" title="Facebook"><img src="../img/facebook.png"></a></li>
				</ul>
			</div>
		</article>
		<footer>
			<div style="text-align: center;">
				<p>Liên hệ: Rabbit House Coffee<br />
					〒542-0081 3-1 Minamisenba, Chuo-ku, Osaka-shi, Osaka<br />
					Tel/Fax: 03-6472-xxxx<br />
					Mobile: 090-3176-4xxx<br />
					E-mail: info@dragoninc.co.jp</p>
				<p>🄫 2021 Power by Dragon Inc</p>
			</div>
		</footer>

</body>

</html>
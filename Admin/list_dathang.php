<?php
session_start();
if (isset($_SESSION["username"]))
	$username	=	$_SESSION["username"];
else
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Quản trị Rabbit House</title>
	<link rel="icon" type="image/png" sizes="32x16" href="../img/rabbithouse.png">
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

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<script type="text/javascript">
	const reloadtButton = document.querySelector("#reload");
	// Reload everything:
	function reload() {
		reload = location.reload();
	}
	// Event listeners for reload
	reloadButton.addEventListener("click", reload, false);
</script>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<a class="navbar-brand" href="blank.php">Rabbit House</a>
			</div>

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav navbar-right navbar-top-links">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="account.php">
						<?php
						$user00tmp = $username;
						include "../include/connect.inc";
						$sql0000 = "select hoTen from tblusers where username = '$user00tmp'";
						$rs0000 = mysqli_query($conn, $sql0000);
						$row0000 = mysqli_fetch_array($rs0000);
						$hoTenNVtmp = $row0000["hoTen"];
						?>
						<i class="fa fa-user fa-fw"></i><?= $hoTenNVtmp ?><b class="caret"></b>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="./backup/export_data.php"><i class="fa fa-user fa-fw"></i>Xuất dữ liệu</a></li>
						<li class="divider"></li>
						<li><a href="./backup/import_data.php"><i class="fa fa-user fa-fw"></i>Nhập dữ liệu</a></li>
						<li class="divider"></li>
						<li><a href="account.php"><i class="fa fa-user fa-fw"></i>Quản lí tài khoản</a></li>
						<li class="divider"></li>
						<li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
			<!-- /.navbar-top-links -->

			<?php
			include "./left_admin.php";
			?>
		</nav>
		<form action="list_dathang.php" method="post">
			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">DANH SÁCH ĐẶT HÀNG</h1>
						</div>
						<button type="submit" class="btn btn-success" name="giaohang" style="margin-bottom: 20px">Giao hàng</button>
						<button type="submit" class="btn btn-success" name="xoahang" style="margin-bottom: 20px; background-color: red">Xóa hàng</button>
						<button onClick="window.location.reload();" class="btn btn-success" style="margin-bottom: 20px; float: right; margin-right: 2%; background-color: aqua; color: black">Tải lại dữ liệu</button>
						<!-- /.col-lg-12 -->
					</div>
					<div><span style="font-size: 20px; color: red">Trạng thái gia hàng được biểu diển bởi kí tự X và O. X là chưa giao hàng còn O là đã giao hàng.</span></div>
					<div class="table-responsive table-bordered">

						<table class="table">
							<thead>
								<tr>
									<th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
									<th>STT</th>
									<th>Mã đặt hàng</th>
									<th>Món</th>
									<th>Số lượng</th>
									<th>Tên khách hàng</th>
									<th>Số điện thoại</th>
									<th>Địa chỉ</th>
									<th>Thời gian</th>
									<th>Tổng tiền</th>
									<th>Trạng thái GH</th>
								</tr>
							</thead>
							<tbody <?php
									include("../include/connect.inc");
									$sql		=	"select * from tblchitiethd";
									$rs 		=	mysqli_query($conn, $sql);
									$i			=	1;
									while ($row = mysqli_fetch_array($rs)) {
										$idChiTiet = $row["idChiTiet"];
										$idMon = $row["idMon"];
										$status = $row["daGH"];
										$thanhTien1 = $row["tongTien"];
										$khuyenMaiDC = $row["khuyenmai"];
										if ($khuyenMaiDC != null) {
											$thanhTien = $thanhTien1 - ($khuyenMaiDC * 100);
										} else
											$thanhTien = $thanhTien1;
										$soLuong = $row["tongSL"];
										if ($status == "O") {
											$check = "none";
										} else $check = "true";
										$idKH = $row["idKhachhang"];
										$idStaff = $row["idStaff"];
										if ($idKH != null && $idStaff == 0) {
											$sql1 = "select * from tblkhachhang where idKhachhang = $idKH";
											$rs1 = mysqli_query($conn, $sql1);
											while ($row1 = mysqli_fetch_array($rs1)) {
												$tenKH = $row1["tenKH"];
												$sdtKH = $row1["SDT"];
											}
										} else {
											$tenKH = "Nhân viên";
											$sdtKH = "";
										}
										$sql7 = "select * from tblmon where idMon = $idMon";
										$rs7 = mysqli_query($conn, $sql7);
										while ($row7 = mysqli_fetch_array($rs7)) {
											$mon = $row7["tenMon"];
										}
										echo " <tr>
												<td><input type='checkbox' class='chk_box1' style=\"display: $check\" name='check_list[]' value='" . $row["idChiTiet"] . "'></td>
												<td>$i</td>
												<td>" . $idChiTiet . "</td>
												<td>" . $mon . "</td>
												<td>" . $soLuong . "</td>
												<td>" . $tenKH . "</td>
												<td>" . $sdtKH . "</td>
												<td>" . $row["diaChiGH"] . "</td>
												<td>" . $row["ngayThang"] . "</td>
												<td>$thanhTien</td>
												<td>" . $status . "</td>
												</tr>";
										$i++;
									}
									if (isset($_POST["giaohang"])) {
										if (!empty($_POST['check_list'])) {
											foreach ($_POST['check_list'] as $check) {
												$sql9 = "update tblchitiethd set daGH = 'O' where idChiTiet = $check";
												$rs9 = mysqli_query($conn, $sql9);
												$sql10 = "update tbllichsu set daGH = 'O' where idChitiet = '$check'";
												$rs10 = mysqli_query($conn, $sql10);
												date_default_timezone_set('Asia/Ho_Chi_Minh');
												$time_act = date('Y-m-d');
												$sqlTientmp = "select * from tblchitiethd where idChiTiet = '$check'";
												$rsTientmp = mysqli_query($conn, $sqlTientmp);
												while($rowTientmp = mysqli_fetch_array($rsTientmp)){
													$TienTmp = $rowTientmp["tongTien"];
													$khuyenMaitmp = $rowTientmp["khuyenmai"];
													$ThanhTienImport = $TienTmp - ($khuyenMaitmp * 100);
													$tongSoLuong = $rowTientmp["tongSL"];
													$sql15 = "insert into tbldoanhthu (idChiTiet, ngay, thanhTien, tongSL) values ( '$check', '$time_act', '$thanhTien', '$soLuong')";
													$rs15 = mysqli_query($conn, $sql15);
												}
											}
											echo "<script>alert('Đã cập nhật')</script>";
											echo "<script>window.location.href='list_dathang.php'</script>";
										}
									} else if (isset($_POST["xoahang"])) {
										$sql20 = "delete from tblchitiethd where daGH = 'O'";
										$rs20 = mysqli_query($conn, $sql20);
										foreach ($_POST['check_list'] as $check) {
											$sql19 = "delete from tblchitiethd where idChiTiet = '$check'";
											$rs19 = mysqli_query($conn, $sql19);
										}
										echo "<script>window.location.href='list_dathang.php'</script>";
									}

									?> </tbody>
								<tr align="center">
									<td colspan="11">
										<button type="submit" class="btn btn-success" name="giaohang" style="margin-bottom: 20px">Giao hàng</button>
									</td>
								</tr>
						</table>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /#page-wrapper -->
		</form>
		<script language="JavaScript">
			function toggle(source) {
				checkboxes = document.getElementsByName('check_list[]');
				for (var i = 0, n = checkboxes.length; i < n; i++) {
					checkboxes[i].checked = source.checked;
				}
			}
		</script>
	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../js/metisMenu.min.js"></script>

	<!-- Morris Charts JavaScript -->
	<script src="../js/raphael.min.js"></script>
	<script src="../js/morris.min.js"></script>
	<script src="../js/morris-data.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../js/startmin.js"></script>

</body>

</html>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idStaff = $_SESSION["idStaff"];
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

    #ttLoai {
        display: block;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 40px;
        font-weight: bold;
        margin-left: 18%;
    }
</style>
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
    <?php
    $user = $username;
    include "../include/connect.inc";
    $sql0000 = "select idStaff from tblstaff where username = '$user'";
    $rs0000 = mysqli_query($conn, $sql0000);
    $row0000 = mysqli_fetch_array($rs0000);
    $idStaff = $row0000["idStaff"];
    ?>

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
            <div id="logo"><a href="./index.php"><img src="../img/logo.png"></a></div>
            <div id="menu">
                <ul>
                    <li><a href="./report.php" title="Gửi thông báo đến quản trị viên để giải quyết các vấn đề.">Thông báo</a></li>
                    <li><a href="./lichsu.php" title="Xem lịch sử bán hàng.">Lịch sử</a></li>
                    <li><a href="./xuatkho.php" title="Nếu nguyên liệu trong kho cần dùng hết nhanh hơn dự kiến của hệ thống, nhân viên cần phải báo xuất kho.">Xuất kho</a></li>
                    <li><a href="./information.php" title="Thông tin tài khoản.">Thông tin</a></li>
                    <li style="width: 157px;"><a href="../index.php" title="Đăng xuất.">Chào: <?php include "../include/connect.inc";
                                                                            $sql0 = "select * from tblstaff where username = '$user'";
                                                                            $rs0 = mysqli_query($conn, $sql0);
                                                                            $row0 = mysqli_fetch_array($rs0);
                                                                            $hoTen = $row0["hoTen"];
                                                                            echo $hoTen;
                                                                            ?></a></li>
                </ul>
            </div>
            <div> <br /><br /><br />
                <div align="center">
                    <form action="index.php" method="GET">
                        <input id="searchbar" name="txtsearchMon" type="text" placeholder="Bạn đang tìm gì?">
                        <input type="submit" name="timKiem" value="🔍">
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
    <section id="info" align="center">
        <form method="post" action="information.php">
            <span>Thông tin tài khoản của <?= $hoTen ?></span><br />
            <div id="body">
		<br />
		<?php
		if (isset($_POST["txtusername"])) {
			$tenNV	= $_POST["txtName"];
			$soDT = $_POST["txtSDT"];
			$username	=	$_POST["txtusername"];
			$sql			=	"update tblstaff set  tenNV= '$tenNV', SDT='$soDT', username='$username' where idStaff='$idStaff'";
			$rs 			=	mysqli_query($conn, $sql);
			if ($rs)
				echo "<script>alert('Lưu thành công!')</script>";
			echo "<script>window.location.href='information.php'</script>";
		} else {
			$sql		=	"select * from tblstaff where idStaff='$idStaff'";
			$rs 		=	mysqli_query($conn, $sql);
			$row		=	mysqli_fetch_array($rs);
			$tenNV	=	$row["hoTen"];
			$soDT = $row["soDT"];
			$username = $row["username"];
			$diaChi = $row["diachi"];
		}
		?>
		<center>
			<form id="form" name="frmLogin" method="post" action="information.php">
				<table width="401">
					<tbody>
						<tr align="center">
							<td width="136">Họ tên<label style="color: red">(*)</label>:</td>
							<td width="249"><input type="text" name="txtName" id="textfield4" value="<?= $tenNV ?>"></td>
						</tr>
						<tr align="center">
							<td>Số ĐT<label style="color: red">(*)</label>:</td>
							<td><input type="number" name="txtSDT" id="textfield5" value="<?= $soDT ?>"></td>
						</tr>
						<tr align="center">
							<td width="136">Tài khoản<label style="color: red">(*)</label>:</td>
							<td width="249"><input type="text" name="txtusername" id="textfield" value="<?= $username ?>"></td>
						</tr>
						<tr align="center">
							<td colspan="2"><input type="button" name="button" id="button" value="Lưu" onClick="checkLogin()">
							</td>
						</tr>
						<tr>
							<td colspan="2"><a href="./change-password.php"><label style="float: right; color: red"><i>Đổi mật khẩu?</i></label></a></td>
						</tr>
					</tbody>
				</table>
		</center>
		</form>
    </section>
    <div style="padding-top: 5%">
        <footer>
            <p style="text-align: center;">掲載されているすべてのコンテンツ(記事、画像、音声データ、映像データ等)の無断転載を禁じます。<br />🄫 2021 Power by Dragon Inc</p>
        </footer>
    </div>
</body>

</html>
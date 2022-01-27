<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idKhachhang = $_SESSION["idStaff"];
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
            <div id="logo"><a href="./index.php" title="Trang chủ"><img src="../img/logo.png"></a></div>
            <div id="menu">
                <ul>
                    <li><a href="./donhang.php" title="Đơn hàng">Đơn hàng</a></li>
                    <li><a href="./doanhthu.php" title="Doanh thu của nhân viên">Doanh thu</a></li>
                    <li><a href="./giohang.php" title="Giỏ hàng bán hàng cho nhân viên">Giỏ hàng</a></li>
                    <li><a href="./information.php" title="Thông tin nhân viên">Thông tin</a></li>
                    <li style="width: 200px;"><a href="../index.php" title="Đăng xuất">Chào: <?php include "../include/connect.inc";
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
        <form method="post" action="donhang.php">
            <span>Đơn Hàng</span><br />
            <button type="submit" class="btn btn-success" name="giaohang" style="margin-bottom: 20px; float: left; margin-left: 2%;">Giao hàng</button>
            <button type="submit" class="btn btn-success" name="xoahang" style="margin-bottom: 20px; background-color: red; float: left; margin-left: 10px">Xóa hàng</button>
            <button onClick="window.location.reload();" class="btn btn-success" style="margin-bottom: 20px; float: right; margin-right: 2%; background-color: aqua; color: black">Tải lại dữ liệu</button>
            <div class="table-responsive table-bordered">
                <table class="table" align="center">
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
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../include/connect.inc");
                        $sql        =    "select * from tblchitiethd";
                        $rs         =    mysqli_query($conn, $sql);
                        $i            =    1;
                        while ($row = mysqli_fetch_array($rs)) {
                            $idChiTiet = $row["idChiTiet"];
                            $idMon = $row["idMon"];
                            $status = $row["daGH"];
                            $thanhTien = $row["tongTien"];
                            $soLuong = $row["tongSL"];
                            if ($status == "O") {
                                $check = "none";
                            } else $check = "true";
                            $idKH = $row["idKhachhang"];
                            $idStaff = $row["idStaff"];
                            if ($idKH != null && $idStaff == null) {
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
                                        <td>" . $row["tongTien"] . "</td>
                                        <td>" . $status . "</td>
                                        <td><a href='chitietdonhang.php?id=" . $idChiTiet . "'>Xem</a></td>
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
                                    $sql15 = "insert into tbldoanhthu (idChiTiet, ngay, thanhTien, tongSL) values ( '$check', '$time_act', '$thanhTien', '$soLuong')";
                                    $rs15 = mysqli_query($conn, $sql15);
                                }
                                echo "<script>window.location.href='donhang.php'</script>";
                            }
                        } else if (isset($_POST["xoahang"])) {
                            $sql20 = "delete from tblchitiethd where daGH = 'O'";
                            $rs20 = mysqli_query($conn, $sql20);
                            foreach ($_POST['check_list'] as $check) {
                                $sql19 = "delete from tblchitiethd where idChiTiet = '$check'";
                                $rs19 = mysqli_query($conn, $sql19);
                            }
                            echo "<script>window.location.href='donhang.php'</script>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
        <script language="JavaScript">
            function toggle(source) {
                checkboxes = document.getElementsByName('check_list[]');
                for (var i = 0, n = checkboxes.length; i < n; i++) {
                    checkboxes[i].checked = source.checked;
                }
            }
        </script>
    </section>
    </section>
    <div style="padding-top: 15%;">
        <footer>
            <p style="text-align: center;">掲載されているすべてのコンテンツ(記事、画像、音声データ、映像データ等)の無断転載を禁じます。<br />🄫 2021 Power by Dragon Inc</p>
        </footer>
    </div>
</body>

</html>
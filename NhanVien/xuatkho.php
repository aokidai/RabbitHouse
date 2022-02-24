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
                    <li style="width: 200px;"><a href="./tmppage.php" title="Đăng xuất">Chào: <?php include "../include/connect.inc";
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
    </header>
    <section id="info" align="center">
        <form method="post" action="xuatkho.php">
            <span>Xuất Kho Hàng Hóa</span><br />
            <button type="submit" class="btn btn-success" name="xuatkho" style="margin-bottom: 20px; float: left; margin-left: 2%;" title="Nếu nguyên liệu dùng để làm món cho khách hàng bị hết, nhân viên hãy chọn vào nguyên liệu đó và nhấn Xuất kho trước ngay khi lấy hàng ra khổi kho">Xuất kho</button>
            <label style="margin-bottom: 20px; font-size: 15px; font-weight: bold; float: right; margin-right: 2%; color: red" title="Mỗi lần xuất kho là 1Kg. Số lượng ban đầu và số lượng còn lại cũng được tính theo đơn vị Kg. Khi nhân viên nhận thấy hết nguyên liệu, nhân viên phải vào đây để cập nhật khi lấy hàng mới.">(?)</label>
            <div class="table-responsive table-bordered">
                <table class="table" align="center">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
                            <th>STT</th>
                            <th>Tên hàng</th>
                            <th>S.Lượng ban đầu</th>
                            <th>S.Lượng còn lại</th>
                            <th>Thời gian nhập kho</th>
                            <th>T.Gian xuất kho <br />(mới nhất)</th>
                            <th>Quản lí</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../include/connect.inc");
                        $sql        =    "select * from tblkho";
                        $rs         =    mysqli_query($conn, $sql);
                        $i            =    1;
                        while ($row = mysqli_fetch_array($rs)) {
                            $idNV = $row["id_user"];
                            $tgXK = $row["thoiGianXK"];
                            $tgXKtmp = "";
                            if ($tgXK == "0000-00-00 00:00:00") {
                                $tgXKtmp = "";
                            } else $tgXKtmp = $row["thoiGianXK"];
                            $sql99 = "select hoTen from tblusers where id_user = $idNV";
                            $rs99 = mysqli_query($conn, $sql99);
                            $row99 = mysqli_fetch_array($rs99);
                            $hoTenNV = $row99["hoTen"];
                            $SLBD = $row["soLuongBD"];
                            $SLCL = $row["soLuongCL"];
                            echo " <tr>
                                    <td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idKho"] . "'></td>
                                    <td>$i</td>
                                    <td>" . $row["tenHang"] . "</td>
                                    <td>$SLBD</td>
                                    <td>$SLCL</td>
                                    <td>" . $row["thoiGianNK"] . "</td>
                                    <td>$tgXKtmp</td>
                                    <td>$hoTenNV</td>
                                    </tr>";
                            $i++;
                        }
                        if (isset($_POST["xuatkho"])) {
                            if (!empty($_POST['check_list'])) {
                                foreach ($_POST['check_list'] as $check) {
                                    $sql00 = "select soLuongCL, tenHang from tblKho where idKho = $check";
                                    $rs00 = mysqli_query($conn, $sql00);
                                    $row00 = mysqli_fetch_array($rs00);
                                    $SLCLtmp = $row00["soLuongCL"];
                                    $tenHangtmp = $row00["tenHang"];
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $tgXK = date('Y-m-d H:i:s');
                                    if($SLCLtmp > 0){
                                        $SLCLtmp--;
                                        $sql9 = "update tblkho set thoiGianXK = '$tgXK', soLuongCL = '$SLCLtmp' where idKho = $check";
                                        $rs9 = mysqli_query($conn, $sql9);
                                    }
                                    else {
                                        echo "<script>alert('Sản phẳm $tenHangtmp đã hết hàng trong kho, hãy dùng phần phản hòi để báo với quản lí!')</script>";
                                    }
                                }
                                echo "<script>window.location.href='xuatkho.php'</script>";
                            }
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
    <div style="padding-top: 1%;">
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
    </div>
</body>

</html>
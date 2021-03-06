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
    <?php 
    $user = $username;
    $id = $_GET["id"];
    include("../include/connect.inc");
    $sql9999 = "select daGH from tblchitiethd where idChitiet = $id";
    $rs9999 = mysqli_query($conn, $sql9999);
    $row9999 = mysqli_fetch_array($rs9999);
    $trangThaitmp = $row9999["daGH"];
    if($trangThaitmp == "O"){
        echo "<script>alert('M??n n??y ???? ???????c giao cho kh??ch h??ng!')</script>";
        echo "<script>window.location.href='donhang.php'</script>";
    }
    ?>
     
    <header>
       <?php include "./header.php"; ?>
            <div> <br /><br /><br />
                <div align="center">
                    <form action="chitietdonhang.php" method="GET">
                        <input id="searchbar" name="txtsearchMon" type="text" placeholder="B???n ??ang t??m g???">
                        <input type="submit" name="timKiem" value="????" title="T??m ki???m">
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
                        echo ("<span style=\"text-align:center; color:red; font-size: 30px\"><center>Kh??ng c?? s???n ph???m ????!</center></span>");
                    }
                }

                ?>

            </div>
    </header>
    <section id="info" align="center">
        <form method="post" action="chitietdonhang.php?id=<?=$id?>">
            <span>Chi ti???t ????n h??ng <?= $id ?></span><br /><br />
            <button type="submit" class="btn btn-success" name="back" style="margin-bottom: 20px; float: left; margin-left: 2%; background-color: aqua; color: black">
                <- </button>
                    <button class="btn btn-success" type="submit" name="giaohang" style="margin-bottom: 20px; float: right; margin-right: 2%;">Giao h??ng</button>
                    <div class="table-responsive table-bordered">
                        <table class="table" style="width:97%" align="center">
                            <?php
                            $sql        =    "select * from tblchitiethd where idChitiet = $id";
                            $rs         =    mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($rs)) {
                                $idMon = $row["idMon"];
                                $status = $row["daGH"];
                                $thanhTien1 = $row["tongTien"];
                                $khuyeMai = $row["khuyenmai"];
                                $thanhTien = $thanhTien1 - ($khuyeMai * 100);
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
                                    $tenKH = "Nh??n vi??n";
                                    $sdtKH = "";
                                }
                                $sql7 = "select * from tblmon where idMon = $idMon";
                                $rs7 = mysqli_query($conn, $sql7);
                                while ($row7 = mysqli_fetch_array($rs7)) {
                                    $mon = $row7["tenMon"];
                                    $congThuc = $row7["moTa"];
                                }
                                $diaChiGH = $row["diaChiGH"];
                                $ngayThang = $row["ngayThang"];
                                $tongTien = $row["tongTien"];
                            } 
                            if (isset($_POST["giaohang"])) {
                                $sql9 = "update tblchitiethd set daGH = 'O' where idChiTiet = $id";
                                $rs9 = mysqli_query($conn, $sql9);
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $time_act = date('Y-m-d');
                                $sql15 = "insert into tbldoanhthu (idChiTiet, ngay, thanhTien, tongSL) values ( '$id', '$time_act', '$thanhTien', '$soLuong')";
                                $rs15 = mysqli_query($conn, $sql15);
                                if ($rs15)
                                    echo "<script>window.location.href='donhang.php'</script>";
                                else echo "<script>alert('Error')</script>";
                            } else if (isset($_POST["back"])) {
                                echo "<script>window.location.href='donhang.php'</script>";
                            }
                            ?>
                            <tr>
                                <th>M??n</th>
                                <td><?= $mon ?></td>
                            </tr>
                            <tr>
                                <th>S??? l?????ng</th>
                                <td><?= $soLuong ?></td>
                            </tr>
                            <tr>
                                <th>T??n kh??ch h??ng</th>
                                <td><?= $tenKH ?></td>
                            </tr>
                            <tr>
                                <th>S??? ??i???n tho???i</th>
                                <td><?= $sdtKH ?></td>
                            </tr>
                            <tr>
                                <th>?????a ch???</th>
                                <td><?= $diaChiGH ?></td>
                            </tr>
                            <tr>
                                <th>Th???i gian</th>
                                <td><?= $ngayThang ?></td>
                            </tr>
                            <tr>
                                <th>T???ng ti???n</th>
                                <td><?= $tongTien ?><?php if($khuyeMai!=null) echo " C??n l???i $thanhTien" ?></td>
                            </tr>
                            <tr>
                                <th>Tr???ng th??i GH</th>
                                <td><?= $status ?></td>
                            </tr>
                            <tr>
                                <th>C??ng th???c</th>
                                <td><?= $congThuc ?></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2">
                                    <button class="btn btn-success" type="submit" name="giaohang" style="margin-bottom: 20px;">Giao h??ng</button>
                                </td>
                            </tr>
                        </table>
                    </div>
        </form>
    </section>

    <div style="padding-top: 70%;">
        <footer>
           <div style="text-align: center;">
        <p>Li??n h???: Rabbit House Coffee<br />
          ???542-0081 3-1 Minamisenba, Chuo-ku, Osaka-shi, Osaka<br />
          Tel/Fax: 03-6472-xxxx<br />
          Mobile: 090-3176-4xxx<br />
          E-mail: info@dragoninc.co.jp</p>
        <p>???? 2021 Power by Dragon Inc</p>
      </div>
        </footer>
    </div>
</body>

</html>
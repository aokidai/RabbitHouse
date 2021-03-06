<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idKhach1 = $_SESSION["idStaff"];
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
    <?php $user = $username;
    $idKhachhang = $idKhach1; ?>

    <header>
        <?php include "./header.php"; ?>
        <div> <br /><br /><br />
            <div align="center">
                <form action="giohang.php" method="GET">
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
        <span>Gi??? H??ng</span>
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
                echo "<label style='color: red; font-weight: bold'>Rabbit House ??ang c?? ch????ng tr??nh $tenKM</label>";
            }
        }
        ?>
        <br /><br />
        <form method="post" action="giohang.php">
            <div class="table-responsive table-bordered">
                <table class="table" style="width:97%" align="center">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkbox" class="chk_box"></th>
                            <th>STT</th>
                            <th>T??n m??n</th>
                            <th>S??? l?????ng</th>
                            <th>Th??nh ti???n</th>
                            <th>X??a </th>
                        </tr>
                    </thead>
                    <script>
                    function del_confirm(strlink) {
                        ok = confirm("B???n c?? mu???n x??a kh??ng?");
                        if (ok != 0)
                            window.location.href = strlink;
                    }
                    </script>
                    <tbody>
                        <?php
                        $tinhtien = 0;
                        include("../include/connect.inc");
                        $sql        =    "select * from tblhoadon where idStaff = '$idKhachhang'";
                        $rs         =    mysqli_query($conn, $sql);
                        $i            =    1;
                        while ($row = mysqli_fetch_array($rs)) {
                            $soluong = $row["soLuong"];
                            $sql2    =     "select * from tblmon where idMon = " . $row["idMon"] . "";
                            $rs2         =    mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_array($rs2);
                            $tinhtien = $soluong * $row2["gia"];
                            echo " <tr>
								<td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["iHhoadon"] . "'></td>
								<td>$i</td>
								<td>" . $row2["tenMon"] . "</td>
								<td>$soluong</td>
								<td>$tinhtien</td>
								<td><a href='javascript:del_confirm(\"del_giohang.php?id=" . $row["iHhoadon"] . "\")'>X??a</a></td>
								</tr>";
                            $i++;
                        }
                        ?>
                        <tr align="right">
                            <td colspan="6" style="text-align: centerright; font-weight: bold">Th??nh ti???n:
                                <?php
                                error_reporting(E_ERROR | E_PARSE);
                                $thanhTien111 = $thanhTien11 = 0;
                                $sql11 = "select * from tblhoadon where idStaff = '$idKhachhang'";
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
                                $tongSL1 = $thanhTien1 = 0;
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $time_act = date('Y-m-d H:i:s');
                                $sql3 = "select * from tblhoadon where idstaff = '$idKhachhang'";
                                $rs3 = mysqli_query($conn, $sql3);
                                while ($row3 = mysqli_fetch_array($rs3)) {
                                    $idKhachhang2 = $row3["idstaff"];
                                    $tongSL = $row3["soLuong"];
                                    $tongSL1 = $tongSL1 + $tongSL;
                                    $thanhTien = $row3["ThanhTien"];
                                    $thanhTien1 = $thanhTien1 + $thanhTien;
                                    $idMon1 = $row3["idMon"];
                                    $sql10 = "select * from tblStaff where idStaff = '$idKhachhang'";
                                    $rs10 = mysqli_query($conn, $sql10);
                                    while ($row10 = mysqli_fetch_array($rs10)) {
                                        $diaChi = $row10["diachi"];
                                    }
                                    $giaoHang = "X";
                                    $sql5 = "insert into tblchitiethd(idStaff, tongSL, tongTien, ngayThang, diaChiGH, daGH, idMon, khuyenmai) values ('$idKhachhang2', '$tongSL', '$thanhTien', '$time_act', '$diaChi', '$giaoHang', '$idMon1', '$khuyenMai')";
                                    $rs5 = mysqli_query($conn, $sql5);
                                    if ($rs5) {
                                        $sql44 = "select max(idChiTiet) as idCTHD from tblchitiethd";
                                        $rs44 = mysqli_query($conn, $sql44);
                                        $row44 = mysqli_fetch_array($rs44);
                                        $idCTHD = $row44["idCTHD"];
                                        $sql20 = "select * from tblhoadon where idStaff = '$idKhachhang'";
                                        $rs20 = mysqli_query($conn, $sql20);
                                        while ($row20 = mysqli_fetch_array($rs20)) {
                                            $thanhTien4 = $row20["ThanhTien"];
                                            $thanhTien4tmp = $row20["ThanhTien"];
                                            $soluongtmpnew = $row20["soLuong"];
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
                                            $sql8 = "insert into tbllichsu(idStaff, idMon, soluong, gia, thoigian, daGH, idChitiet) values ('$idKhachhang2', '$idMon4', '$soluongtmpnew', '$thanhTien4', '$time_act', '$trangThaiGHtmp', '$idCTHD')";
                                            $rs8 = mysqli_query($conn, $sql8);
                                            if ($rs8) {
                                                $sql6 = "delete from tblhoadon where idStaff = '$idKhachhang'";
                                                $rs6 = mysqli_query($conn, $sql6);
                                                echo "<script>alert(\"Kh??ch h??ng c???n thanh to??n " . $thanhTien11 . " cho nh??n vi??n t???i qu???y. C???m ??n qu?? kh??ch ???? s??? d???ng d???ch v???. Ch??c qu?? kh??ch m???t ng??y t???t l??nh.\");</script>";
                                                echo "<script>window.location.href='./donhang.php'</script>";
                                            }
                                        }
                                    } else echo "<script>alert('Mua h??ng kh??ng th??nh c??ng!')</script>";
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
                                <input type="submit" class="btn btn-success" style="background-color: red"
                                    name="muahang" title="Mua h??ng v?? thanh to??n" value="Mua h??ng">
                                <input type="submit" class="btn btn-success" name="xoahang" value="X??a h??ng"
                                    title="Ch???n v??o nh???ng m??n mu???n x??a v?? nh???n X??a h??ng">
                            </td>
                        </tr>
                        <tr align="center">
                            <th colspan="6">
                                <center><label style="background-color: #f2f2f2; width: 150px; border-radius: 10px;"><a
                                            href="./export_hoadon.php" target="_blank">???? Xu???t h??a ????n</a></label>
                                </center>
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
    </section>
    <div style="padding-top: 15%;">
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
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idKhach1 = $_SESSION["idStaff"];
} else
    header("location:../login.php");
?>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 21cm;
        overflow: hidden;
        min-height: 297mm;
        padding: 2.5cm;
        margin-left: auto;
        margin-right: auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }

    @page {
        size: A4;
        margin: 0;
    }

    button {
        width: 100px;
        height: 24px;
    }

    .header {
        overflow: hidden;
    }

    .logo {
        background-color: #FFFFFF;
        text-align: left;
        float: left;
    }

    .company {
        padding-top: 24px;
        text-transform: uppercase;
        background-color: #FFFFFF;
        text-align: right;
        float: right;
        font-size: 16px;
    }

    .title {
        text-align: center;
        position: relative;
        color: #0000FF;
        font-size: 24px;
        top: 1px;
    }

    .footer-left {
        text-align: center;
        text-transform: uppercase;
        padding-top: 24px;
        position: relative;
        height: 150px;
        width: 50%;
        color: #000;
        float: left;
        font-size: 12px;
        bottom: 1px;
    }

    .footer-right {
        text-align: center;
        text-transform: uppercase;
        padding-top: 24px;
        position: relative;
        height: 150px;
        width: 50%;
        color: #000;
        font-size: 12px;
        float: right;
        bottom: 1px;
    }

    .TableData {
        background: #ffffff;
        font: 11px;
        width: 100%;
        border-collapse: collapse;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 12px;
        border: thin solid #d3d3d3;
    }

    .TableData TH {
        background: rgba(0, 0, 255, 0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 24px;
    }

    .TableData TR {
        height: 24px;
        border: thin solid #d3d3d3;
    }

    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border: thin solid #d3d3d3;
    }

    .TableData TR:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    .TableData .cotSTT {
        text-align: center;
        width: 10%;
    }

    .TableData .cotTenSanPham {
        text-align: left;
        width: 40%;
    }

    .TableData .cotHangSanXuat {
        text-align: left;
        width: 20%;
    }

    .TableData .cotGia {
        text-align: right;
        width: 120px;
    }

    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }

    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }

    .TableData .tong {
        text-align: right;
        font-weight: bold;
        text-transform: uppercase;
        padding-right: 4px;
    }

    .TableData .cotSoLuong input {
        text-align: center;
    }

    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>

<body onload="window.print();">
    <div id="page" class="page">
        <div class="header">
            <div class="logo"><img style="width: 200px; height: 60px;" src="../img/logo.png" /></div>
            <div class="company">Rabbit House</div>
        </div>
        <br />
        <div class="title">
            HÓA ĐƠN THANH TOÁN
            <br />
            -------oOo-------
        </div>
        <br />
        <div>Nhân viên bán hàng:
            <?php
            include "../include/connect.inc";
            $sqlnv = "select hoTen from tblstaff where idStaff = $idKhach1";
            $rsnv = mysqli_query($conn, $sqlnv);
            $rownv = mysqli_fetch_array($rsnv);
            $nv = $rownv["hoTen"];
            echo $nv;
            ?>
        </div>
        <br />
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Tên món</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $pos = 1;
            $sql1 = "select idMon, soLuong, ThanhTien from tblhoadon where idStaff = $idKhach1";
            $rs1 = mysqli_query($conn, $sql1);
            while ($row1 = mysqli_fetch_array($rs1)) {
                $idMon = $row1["idMon"];
                $soLuong = $row1["soLuong"];
                $ThanhTien = $row1["ThanhTien"];
                $sql2 = "select tenMon from tblmon where idMon = $idMon";
                $rs2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($rs2);
                $tenMon = $row2["tenMon"];
                echo "<tr>";
                echo "<td class=\"cotSTT\">" . $pos++ . "</td>";
                echo "<td class=\"cotTenSanPham\">" . $tenMon . "</td>";
                echo "<td class=\"cotSoLuong\" align='center'>" . $soLuong . "</td>";
                echo "<td class=\"cotGia\">$ThanhTien</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="3" class="tong">Tổng cộng</td>
                <td class="cotSo">
                    <?php
                    error_reporting(E_ERROR | E_PARSE);
                    $thanhTien111 = $thanhTien11 = 0;
                    $sql11 = "select * from tblhoadon where idStaff = '$idKhach1'";
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
        </table>
    </div>
</body>
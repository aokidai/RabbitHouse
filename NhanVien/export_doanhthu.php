<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idKhachhang = $_SESSION["idStaff"];
    $thoiGian = $_SESSION["ThoiGian"];
    $thoigian2 = $_SESSION["ThoiGian2"];
} else header("location:../login.php");

$user = $username;
include "../include/connect.inc";

$sql5 = "select hoTen from tblstaff where username = '$user'";
$rs5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_array($rs5);
$hoten = $row5["hoTen"];
$columnHeader = '';
$columnHeader = "Doanh Thu Report" . "\n" . "$user" . "\t" . "$thoiGian" . "\n" . "Date" . "\t" . "Quantily" . "\t" . "Turnover" . "\t";
$setData = '';

$sql = "select idChiTiet from tblchitiethd where idStaff = '$idKhachhang'";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rs)) {
    $idCT = $row["idChiTiet"];
    if ($thoigian2 == null) {
        $setSql = "SELECT `ngay`,`tongSL`,`thanhTien` FROM `tbldoanhthu` WHERE `ngay` = '$thoiGian' AND `idChiTiet` = $idCT";
        $setRec = mysqli_query($conn, $setSql);
        while ($rec = mysqli_fetch_row($setRec)) {
            $rowData = '';
            foreach ($rec as $value) {
                $value = '' . $value . '' . "\t";
                $rowData .= $value;
            }
            $setData .= trim($rowData) . "\n";
        }
    } else {
        $setSql = "SELECT `ngay`,`tongSL`,`thanhTien` FROM `tbldoanhthu` WHERE `ngay` between '$thoiGian' and '$thoigian2' AND `idChiTiet` = $idCT";
        $setRec = mysqli_query($conn, $setSql);
        while ($rec = mysqli_fetch_row($setRec)) {
            $rowData = '';
            foreach ($rec as $value) {
                $value = '' . $value . '' . "\t";
                $rowData .= $value;
            }
            $setData .= trim($rowData) . "\n";
        }
    }
}

header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename=RabbitHouse_Report_DoanhThu.xls");
header("Pragma: no-cache");
header("Expires: 0");
//echo "\xEF\xBB\xBF"; // UTF-8 BOM
echo ucwords($columnHeader) . "\n" . $setData . "\n";
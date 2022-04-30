<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $thoiGian = $_SESSION["ThoiGian"];
    $thoigian2 = $_SESSION["ThoiGian2"];
} else header("location:../login.php");

$user = $username;
include "../include/connect.inc";

$columnHeader = '';
$columnHeader = "Doanh Thu Report" . "\n" . "$user" . "\t" . "$thoiGian" . "\n" . "Date" . "\t" . "Quantily" . "\t" . "Turnover" . "\t";
$setData = '';

if ($thoigian2 == null) {
    $setSql = "SELECT `ngay`,`tongSL`,`thanhTien` FROM `tbldoanhthu` WHERE `ngay` = '$thoiGian'";
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
    $setSql = "SELECT `ngay`,`tongSL`,`thanhTien` FROM `tbldoanhthu` WHERE `ngay` between '$thoiGian' and '$thoigian2'";
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

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=RabbitHouse_Report_DoanhThu.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader) . "\n" . $setData . "\n";
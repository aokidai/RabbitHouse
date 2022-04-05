<?php
session_start();
if (isset($_SESSION["username"])) {
	$username	=	$_SESSION["username"];
	$idKhachhang = $_SESSION["idStaff"];
} else header("location:../login.php");
include "../include/connect.inc";
$sqlMax = "select max(idChamCong) as idChamCong from tblchamcong where idNhanVien = '$idKhachhang'";
$rsMax = mysqli_query($conn, $sqlMax);
$rowMax = mysqli_fetch_array($rsMax);
$idMax = $rowMax["idChamCong"];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time_act = date('Y-m-d H:i:s');
$sql2 = "select * from tblchamcong where idChamCong = '$idMax'";
$rs2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($rs2);
$TGVao = strtotime($row2["TGVao"]);
$TGRa = strtotime($time_act);
$tongTGtmp = ($TGRa - $TGVao)/60;
$sql3 = "select luongCB from tblluongnv";
$rs3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($rs3);
$LuongCB = $row3["luongCB"];
$tongLuong = $tongTGtmp * $LuongCB;
$sql = "update tblchamcong set TGRa = '$time_act', tongTG = '$tongTGtmp', TongLuong = '$tongLuong' where idChamCong = $idMax";
$rs = mysqli_query($conn, $sql);
if($rs) {
    $sql1 = "select TongLuong, tongTG from tblchamcong where idNhanVien = $idKhachhang";
    $rs1 = mysqli_query($conn, $sql1);
    $TongTGtmp = $TongLuongtmp = 0;
    while($row1 = mysqli_fetch_array($rs1)){
        $thoiGian = $row1["tongTG"];
        $luong = $row1["TongLuong"];
        $TongTGtmp += $thoiGian;
        $TongLuongtmp += $luong;
    }
    $sql9 = "update tblstaff set tongTG='$TongTGtmp', tongLuong = '$TongLuongtmp' where idStaff = '$idKhachhang'";
    $rs9 = mysqli_query($conn, $sql9);
    echo "<script>window.location.href='../index.php'</script>";
}
else echo "<script>alert('Error')</script>";
?>
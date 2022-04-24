<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    unset($_SESSION["pages"]);;
} else
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<style>
#myInput {
    width: 15%;
    font-size: 16px;
    margin-bottom: 12px;
    float: right;
    margin-right: 10px;
    display: block;
    border: none;
    border-bottom: 1px solid #ccc;
    margin-top: 8px;
}
</style>

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
        <form action="list_kho.php" method="post">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">DANH SÁCH HÀNG HÓA TRONG KHO</h1>
                            <ul class="abc"
                                style="background-color: #5cb85c; border-color: #4cae4c; width: 120px; height: 34px; list-style-type: none; text-align: center;float: left; margin-right: 5px; border-radius: 3px; padding-left: 0px; margin-bottom: 0px;">
                                <li class="dropdown"
                                    style="display: list-item; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; list-style-position: unset; display: inline-block; list-style-type: none;">
                                    <a class="dropdown-toggle"
                                        title="Có thể lựa chọn 1 trong 2 cách nhập hàng hóa vào kho. Trong trường hợp hàng hóa đó đã tồn tại, yêu cầu quản lý CHỈ sửa hàng hóa đó với dạng số lượng củ + số lượng mới và giá thành mới, KHÔNG được phép thêm hàng hóa trùng lập vào kho."
                                        data-toggle="dropdown"
                                        style="display: inline-block; color: white; text-align: center; text-decoration: none; padding-top: 7px; padding-right: 2px;">
                                        Thêm hàng hóa
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="./insert_kho.php"
                                                title="Nhập tay các hàng hóa, chỉ sử dụng để bổ sung ít hàng.">Thêm
                                                hàng</a></li>
                                        <li class="divider"></li>
                                        <li><a href="./import_kho.php"
                                                title="Nhập hàng hóa tự động bằng file text.">Thên hàng tự động</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <button type="submit" name="xoahang" class="btn btn-success"
                                style="margin-bottom: 20px; background-color: red;"
                                title="Xóa hàng hóa được chọn và các hàng hóa có số lượng là 0. Trong trường hợp chỉ xóa các hàng hóa có số lượng còn lại là 0 chỉ cần nhấn nút xóa để tự động xóa mà không cần chọn hàng hóa tương ứng.">Xóa
                                hàng</button>
                            <button type="button" onClick="javascript:window.location.href='list_kho.php?page=1'"
                                class="btn btn-success"
                                style="margin-bottom: 20px; float: right; background-color: aqua; color: black">Tải lại
                                dữ liệu</button>
                            <ul class="abc"
                                style="background-color: orange; border-color: #4cae4c; width: 120px; height: 34px; list-style-type: none; text-align: center; float: right; margin-right: 5px; border-radius: 3px; padding-left: 0px; margin-bottom: 0px;">
                                <li class="dropdown"
                                    style="display: list-item; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; list-style-position: unset; display: inline-block; list-style-type: none;">
                                    <a class="dropdown-toggle" title="Quản lý kho" data-toggle="dropdown"
                                        style="display: inline-block; color: black; text-align: center; text-decoration: none; padding-top: 7px; padding-right: 2px;">
                                        Quản lý kho
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="./kho_manage.php" title="Kiểm tra tồn kho theo tháng.">Quản lý tồn
                                                kho</a></li>
                                        <li class="divider"></li>
                                        <li><a href="./kho_lichsu.php"
                                                title="Kiểm tra lịch sử hàng hóa bị xóa khổi kho.">Lịch sử kho</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <input type="text" id="myInput" class="w3-input" onkeyup="myFunction()"
                                placeholder="Tìm tên hàng hóa..." title="Tìm kiếm hàng hóa trong kho">
                        </div>

                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="table-responsive table-bordered">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)">
                                    </th>
                                    <th>STT</th>
                                    <th>Tên hàng</th>
                                    <th title="Số lượng ban đầu">S.L ban đầu</th>
                                    <th title="Số lượng còn lại">S.L còn lại</th>
                                    <th title="Thời gian nhập kho">T.G nhập kho</th>
                                    <th title="Thòi gian xuất kho">T.G X.K (mới nhất)</th>
                                    <th title="Số tiền hàng hóa ban đầu">Số tiền BD</td>
                                    <th title="Số tiền hàng hóa đã xuất kho">S.T xuất kho</td>
                                    <th>Quản lí</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                                    error_reporting(E_ERROR | E_PARSE);
                                    include("../include/connect.inc");
                                    $_SESSION["pages"]       =    $_GET["page"];
                                    $sql        =    "select * from tblkho";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $count        =    mysqli_num_rows($rs);
                                    // Hiển thị
                                    $pageSize = 10;
                                    $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                                    $sql        =    "select * from tblkho limit $pos, $pageSize";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $i            =    1;
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $idNV = $row["id_user"];
                                        $tgXK = $row["thoiGianXK"];
                                        $tgXKtmp = "";
                                        $soTien = $row["soTien"];
                                        $TH = $row["tenHang"];
                                        $SLBD = $row["soLuongBD"];
                                        $SLCL = $row["soLuongCL"];
                                        $tgNK = $row["thoiGianNK"];
                                        if ($tgXK == "0000-00-00 00:00:00") {
                                            $tgXKtmp = "";
                                        } else $tgXKtmp = $row["thoiGianXK"];
                                        $sql99 = "select hoTen from tblusers where id_user = $idNV";
                                        $rs99 = mysqli_query($conn, $sql99);
                                        $row99 = mysqli_fetch_array($rs99);
                                        $hoTenNV = $row99["hoTen"];
                                        $soTientmpA1 = ($SLCL * $soTien) / $SLBD;
                                        $soTienDX = $soTien - $soTientmpA1;
                                        echo " <tr>
                                                <td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idKho"] . "'></td>
                                                <td>$i</td>
                                                <td>$TH</td>
                                                <td>$SLBD</td>
                                                <td>$SLCL</td>
                                                <td>$tgNK</td>
                                                <td>$tgXKtmp</td>
                                                <td>$soTien</td>
                                                <td>$soTienDX</td>
                                                <td>$hoTenNV</td>
                                                <td><a href='edit_kho.php?id=" . $row["idKho"] . "'>Sửa</a></td>
                                                </tr>";
                                        $i++;
                                    }
                                    ?> <?php
                                        if (isset($_POST['xoahang'])) {
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $thoiGianLuuTT = date('Y-m-d H:i:s');
                                            $sqlSaveA = "select * from tblkho where soLuongCL = 0";
                                            $rsSaveA = mysqli_query($conn, $sqlSaveA);
                                            while ($rowSaveA = mysqli_fetch_array($rsSaveA)) {
                                                $tenHang = $rowSaveA["tenHang"];
                                                $soLuongBD = $rowSaveA["soLuongBD"];
                                                $soLuongCL = $rowSaveA["soLuongCL"];
                                                $thoiGianNK = $rowSaveA["thoiGianNK"];
                                                $thoiGianXK = $rowSaveA["thoiGianXK"];
                                                $id_user = $rowSaveA["id_user"];
                                                $soTien = $rowSaveA["soTien"];
                                                $sqlSaveData1 = "insert into tbllichsukho (tenHang, soLuongBD, soLuongCL, thoiGianNK, thoiGianXK, id_user, soTien, thoiGianLuuTT) values ('$tenHang', '$soLuongBD', '$soLuongCL', '$thoiGianNK', '$thoiGianXK', '$id_user', '$soTien', '$thoiGianLuuTT')";
                                                $rsSaveData1 = mysqli_query($conn, $sqlSaveData1);
                                            }
                                            $sql1 = "delete from tblkho where soLuongCL = 0";
                                            $rs1 = mysqli_query($conn, $sql1);
                                            foreach ($_POST['check_list'] as $check) {
                                                $sqlSaveB = "select * from tblkho where idKho = '$check'";
                                                $rsSaveB = mysqli_query($conn, $sqlSaveB);
                                                while ($rowSaveB = mysqli_fetch_array($rsSaveB)) {
                                                    $tenHang1 = $rowSaveB["tenHang"];
                                                    $soLuongBD1 = $rowSaveB["soLuongBD"];
                                                    $soLuongCL1 = $rowSaveB["soLuongCL"];
                                                    $thoiGianNK1 = $rowSaveB["thoiGianNK"];
                                                    $thoiGianXK1 = $rowSaveB["thoiGianXK"];
                                                    $id_user1 = $rowSaveB["id_user"];
                                                    $soTien1 = $rowSaveB["soTien"];
                                                    $sqlSaveData2 = "insert into tbllichsukho (tenHang, soLuongBD, soLuongCL, thoiGianNK, thoiGianXK, id_user, soTien, thoiGianLuuTT) values ('$tenHang1', '$soLuongBD1', '$soLuongCL1', '$thoiGianNK1', '$thoiGianXK1', '$id_user1', '$soTien1', '$thoiGianLuuTT')";
                                                    $rsSaveData2 = mysqli_query($conn, $sqlSaveData2);
                                                }
                                                $sql9 = "delete from tblkho where idKho = '$check'";
                                                $rs1 = mysqli_query($conn, $sql9);
                                            }
                                            echo "<script>alert('Đã cập nhật')</script>";
                                            echo "<script>window.location.href='list_kho.php?page=1'</script>";
                                        }
                                        ?>
                                <tr>
                                    <th colspan="4">
                                        <?php
                                        for ($i = 1; $i <= ceil($count / $pageSize); $i++) {
                                            echo "<a href='list_kho.php?page=$i'>" . $i . "</a>&nbsp&nbsp";
                                        }
                                        ?>
                                    </th>
                                </tr>
                            </tbody>
                            <tr align="center">
                                <th colspan="9">
                                    <center><label
                                            style="background-color: #f2f2f2; width: 150px; border-radius: 10px;"><a
                                                href="./export_kho.php">🖨️ Xuất Excel</a></label></center>
                                </th>
                            </tr>
                        </table>
                        <script>
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[2];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                        </script>
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
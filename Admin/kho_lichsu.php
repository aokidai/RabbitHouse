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
        <form action="kho_lichsu.php" method="post">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">LỊCH SỬ XÓA HÀNG HÓA TRONG KHO</h1>
                            <button type="button" class="btn btn-success" style="margin-bottom: 20px" onClick="javascript:window.location.href='list_kho.php?page=1'" title="Trở về danh sách hàng hóa trong kho"><-</button>
                            <button type="button" onClick="javascript:window.location.href='kho_lichsu.php'" class="btn btn-success" style="margin-bottom: 20px; float: right; background-color: aqua; color: black">Tải lại dữ liệu</button>
                        </div>

                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
                                    <th>STT</th>
                                    <th>Tên hàng</th>
                                    <th title="Số lượng ban đầu">S.L ban đầu</th>
                                    <th title="Số lượng còn lại">S.L còn lại</th>
                                    <th title="Thời gian nhập kho">T.G nhập kho</th>
                                    <th title="Thòi gian xuất kho">T.G X.K (mới nhất)</th>
                                    <th title="Số tiền hàng hóa ban đầu">Số tiền BD</td>
                                    <th title="Số tiền hàng hóa đã xuất kho">S.T xuất kho</td>
                                    <th title="Thời gian xóa hàng hóa">T.G xóa</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                                    error_reporting(E_ERROR | E_PARSE);
                                    include("../include/connect.inc");
                                    $_SESSION["pages"]       =    $_GET["page"];
                                    $sql        =    "select * from tbllichsukho";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $count        =    mysqli_num_rows($rs);
                                    // Hiển thị
                                    $pageSize = 10;
                                    $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                                    $sql        =    "select * from tbllichsukho limit $pos, $pageSize";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $i            =    1;
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $idNV = $row["id_user"];
                                        $tgXK = $row["thoiGianXK"];
                                        $tgXKtmp = "";
                                        $soTien = $row["soTien"];
                                        $TGXoa = $row["thoiGianLuuTT"];
                                        $TH = $row["tenHang"];
                                        $SLBD = $row["soLuongBD"];
                                        $SLCL = $row["soLuongCL"];
                                        $tgNK = $row["thoiGianNK"];
                                        if ($tgXK == "0000-00-00 00:00:00") {
                                            $tgXKtmp = "";
                                        } else $tgXKtmp = $row["thoiGianXK"];
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
                                                <td>$TGXoa</td>
                                            </tr>";
                                        $i++;
                                    }
                                    ?> 
                                <tr>
                                    <th colspan="4">
                                        <?php
                                        for ($i = 1; $i <= ceil($count / $pageSize); $i++) {
                                            echo "<a href='kho_lichsu.php?page=$i'>" . $i . "</a>&nbsp&nbsp";
                                        }
                                        ?>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
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
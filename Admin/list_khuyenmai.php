<?php
session_start();
if (isset($_SESSION["username"]))
    $username    =    $_SESSION["username"];
else
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

<body>
    <?php
    $user00tmp = $username;
    include "../include/connect.inc";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time_act = date('Y-m-d H:i:s');
    $sql0 = "delete from tblkhuyenmai where thoiGianKT <= '$time_act'";
    $rs0 = mysqli_query($conn, $sql0);
    ?>
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
        <form action="list_khuyenmai.php" method="post">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">CHƯƠNG TRÌNH KHUYẾN MÃI CHO KHÁCH HÀNG</h1>
                            <button type="button" class="btn btn-success" style="margin-bottom: 20px" onClick="javascript:window.location.href='insert_khuyenmai.php'">Thêm khuyến mãi</button>
                            <button type="submit" class="btn btn-success" style="margin-bottom: 20px">Xóa khuyến mãi</button>
                        </div>

                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
                                    <th>STT</th>
                                    <th>Tên khuyến mãi</th>
                                    <th>Khuyến mãi</th>
                                    <th>Thời gian bắt đầu</th>
                                    <th>Thời gian kết thúc</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <script>
                                function del_confirm(strlink) {
                                    ok = confirm("Bạn có muốn xóa không?");
                                    if (ok != 0)
                                        window.location.href = strlink;
                                }
                            </script>
                            <tbody> <?php
                                    include("../include/connect.inc");
                                    $sql        =    "select * from tblkhuyenmai";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $count        =    mysqli_num_rows($rs);
                                    // Hiển thị
                                    $pageSize = 5;
                                    $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                                    $sql        =    "select * from tblkhuyenmai limit $pos, $pageSize";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $i            =    1;
                                    while ($row = mysqli_fetch_array($rs)) {
                                        echo " <tr>
                                                <td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idKM"] . "'></td>
                                                <td>$i</td>
                                                <td>" . $row["tenKM"] . "</td>
                                                <td>" . $row["khuyenMai"] . "</td>
                                                <td>" . $row["thoiGianBD"] . "</td>
                                                <td>" . $row["thoiGianKT"] . "</td>                                                        
                                                <td><a href='edit_khuyenmai.php?id=" . $row["idKM"] . "'>Sửa</a></td>
                                                </tr>";
                                        $i++;
                                    }
                                    ?> <?php
                                        if (!empty($_POST['check_list'])) {
                                            foreach ($_POST['check_list'] as $check) {
                                                date_default_timezone_set('Asia/Ho_Chi_Minh');
										        $time_act = date('Y-m-d H:i:s');
                                                $sql0 = "select thoiGianBD, thoiGianKT from tblkhuyenmai where idKM = '$check'";
                                                $rs0 = mysqli_query($conn, $sql0);
                                                $row0 = mysqli_fetch_array($rs0);
                                                $TGBDtmp = $row0["thoiGianBD"];
                                                $TGKTtmp = $row0["thoiGianKT"];
                                                if($TGBDtmp <= $time_act && $time_act <= $TGKTtmp){
                                                    echo "<script>alert('Không thể xóa vì đang trong thời gian khuyến mãi')</script>";
                                                    echo "<script>window.location.href='list_khuyenmai.php'</script>";}
                                                else{
                                                    $sql9 = "delete from tblkhuyenmai where idKM = '$check'";
                                                    $rs9 = mysqli_query($conn, $sql9);
                                                }
                                            }
                                            echo "<script>window.location.href='list_khuyenmai.php'</script>";
                                        }
                                        ?> 
                                <tr>
                                <th colspan="4">
                                    <?php

                                    for ($i = 1; $i <= ceil($count / $pageSize); $i++)
                                        echo "<a href='list_khuyenmai.php?page=$i'>" . $i . "</a>&nbsp&nbsp";
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
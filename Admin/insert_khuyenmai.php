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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">THÊM KHUYẾN MÃI</h1>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php
                if (isset($_POST["txtTenKM"])) {
                    include "../include/connect.inc";
                    $tenKM    =    $_POST["txtTenKM"];
                    $KhuyenMai = $_POST["txtKM"];
                    $TGBD = $_POST["txtTGBD"];
                    $TGKT = $_POST["txtTGKT"];
                    if ($tenKM != null && $KhuyenMai != null && $TGBD != null && $TGKT != null) {
                        $sql            =    "insert into tblkhuyenmai(tenKM, khuyenMai, thoiGianBD, thoiGianKT) 
                    values('$tenKM', '$KhuyenMai', '$TGBD', '$TGKT')";
                        $rs             =    mysqli_query($conn, $sql);
                        if ($rs)
                            echo "<script>window.location.href='list_khuyenmai.php'</script>";
                    } else
                        echo "<script>alert('Kiểm tra lại thông tin Tên khuyến mãi, Khuyến mãi, TG bắt đầu và TG kết thúc')</script>";
                }
                ?>
                <form method="post">
                    <table class="table table-striped table-bordered table-hover" style="width:70%" align="center">
                        <tbody>
                            <tr>
                                <td>Tên khuyến mãi<span style="color: red">(*)</span>:</td>
                                <td><input class="form-control" name="txtTenKM" placeholder="Tên khuyến mãi"></td>
                            </tr>
                            <tr>
                                <td>Khuyến mãi (%)<span style="color: red">(*)</span>:</td>
                                <td><input class="form-control" name="txtKM" type="number" value="10"></td>
                            </tr>
                            <tr>
                                <td>Thời gian bắt đầu<span style="color: red">(*)</span>:</td>
                                <td><input type="datetime-local" name="txtTGBD"></td>
                            </tr>
                            <tr>
                                <td>Thời gian kết thúc<span style="color: red">(*)</span>:</td>
                                <td><input type="datetime-local" name="txtTGKT"></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <button type="button"
                                        onClick="javascript:window.location.href='list_khuyenmai.php?page=1'"
                                        class="btn btn-warning">Hủy</button>
                                </td>
                            </tr>

                    </table>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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
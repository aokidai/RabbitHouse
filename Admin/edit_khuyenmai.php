<?php
session_start();
if (isset($_SESSION["username"])){
    $username    =    $_SESSION["username"];
    $pages = $_SESSION["pages"];
}
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
    $id = $_GET["id"];
    include "../include/connect.inc";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time_act = date('Y-m-d H:i:s');
    $sql0 = "select thoiGianBD, thoiGianKT from tblkhuyenmai where idKM = '$id'";
    $rs0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_array($rs0);
    $TGBDtmp = $row0["thoiGianBD"];
    $TGKTtmp = $row0["thoiGianKT"];
    if($TGBDtmp <= $time_act && $time_act <= $TGKTtmp || $TGKTtmp <= $time_act){
        echo "<script>alert('Không thể sửa vì đang hoặc đã qua thời gian khuyến mãi')</script>";
        echo "<script>window.location.href='list_khuyenmai.php?page=$pages'</script>";
    }
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">SỬA KHUYỄN MÃI</h1>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include "../include/connect.inc";
                if (isset($_POST["txtTenKM"])) {
                    $id                =    $_POST["txtid"];
                    $tenKM        =    $_POST["txtTenKM"];
                    $KhuyenMai = $_POST["txtKM"];
                    $TGBD = $_POST["txtTGBD"];
                    $TGKT = $_POST["txtTGKT"];
                    $sql            =    "update tblkhuyenmai set tenKM = '$tenKM', khuyenMai = '$KhuyenMai', thoiGianBD = '$TGBD', thoiGianKT = '$TGKT'  where idKM=$id";
                    $rs             =    mysqli_query($conn, $sql);
                    if ($rs)
                        echo "<script>window.location.href='list_khuyenmai.php'</script>";
                } else {
                    $id            =    $_GET["id"];
                    $sql        =    "select * from tblkhuyenmai where idKM=$id";
                    $rs         =    mysqli_query($conn, $sql);
                    $row        =    mysqli_fetch_array($rs);
                    $tenKM        =    $row["tenKM"];
                    $KhuyenMai = $row["khuyenMai"];
                    $TGBD = $row["thoiGianBD"];
                    $TGKT = $row["thoiGianKT"];
                }

                ?>
                <form method="post">
                    <table class="table table-striped table-bordered table-hover" style="width:50%" align="center">

                        <tbody>
                            <tr>
                                <td>Tên khuyến mãi<span style="color: red">(*)</span>:</td>
                                <td><input class="form-control" name="txtTenKM" value="<?= $tenKM ?>"></td>
                                <input type="hidden" class="form-control" name="txtid" value="<?= $id ?>">
                            </tr>
                            <tr>
                                <td>Khuyến mãi (%)<span style="color: red">(*)</span>:</td>
                                <td><input class="form-control" name="txtKM" value="<?= $KhuyenMai ?>"></td>
                            </tr>
                            <tr>
                                <td>Thời gian bắt đầu<span style="color: red">(*)</span>:</td>
                                <td><input type="datetime-local" name="txtTGBD"  value="<?php echo date('Y-m-d\TH:i:s', strtotime($TGBD)); ?>" REQUIRED></td>
                            </tr>
                            <tr>
                                <td>Thời gian kết thúc<span style="color: red">(*)</span>:</td>
                                <td><input type="datetime-local" name="txtTGKT"  value="<?php echo date('Y-m-d\TH:i:s', strtotime($TGKT)); ?>" REQUIRED></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <button type="button" onClick="javascript:window.location.href='list_khuyenmai.php?page=<?=$pages?>'" class="btn btn-warning">Hủy</button>
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
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
                    <div class="col-lg-12" style="padding-bottom: 10px;">
                        <h1 class="page-header">SỬA MỨC LƯƠNG CƠ BẢN CỦA NHÂN VIÊN</h1>
                        <span>Lương cơ bản là lương góc chưa / 1 giờ<br/>Để tính được lương góc của nhân viên = lương cơ bản + số giờ nhân viên làm việc<br/></span>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include "../include/connect.inc";
                if (isset($_POST["txtluong"])) {
                    $luongCB3        =    $_POST["txtluong"];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $time_act = date('Y-m-d H:i:s');
                    $sql        =    "select * from tblluongnv";
                    $rs         =    mysqli_query($conn, $sql);
                    $row        =    $row = mysqli_fetch_array($rs);
                    $luongCB    =    $row["luongCB"];
                    $id = $row["idLuong"];
                    
                    if ($luongCB == null && $id == null) {
                        $sql2            =    "insert into tblluongnv(luongCB, ngayLap) values ('$luongCB3', '$time_act')";
                        $rs2             =    mysqli_query($conn, $sql2);
                        if ($rs2)
                            echo "<script>window.location.href='insert_luong.php'</script>";
                    } else {
                        echo "<script>alert('$luongCB')</script>";
                        $sql2            =    "update tblluongnv set luongCB = '$luongCB3', ngayLap = '$time_act' where idLuong=$id";
                        $rs2             =    mysqli_query($conn, $sql2);
                        if ($rs2)
                            echo "<script>window.location.href='insert_luong.php'</script>";
                    }
                } else {
                    $sql        =    "select * from tblluongnv";
                    $rs         =    mysqli_query($conn, $sql);
                    $row        =    $row = mysqli_fetch_array($rs);
                    $luongCB1    =    $row["luongCB"];
                    $TG = $row["ngayLap"];
                }
                ?>
                <form method="post">
                    <table class="table table-striped table-bordered table-hover" style="width:50%" align="center">
                        <tbody>
                            <tr>
                                <td>Lương cơ bản/Giờ<span style="color: red">(*)</span>:</td>
                                <td><input class="form-control" type="number" name="txtluong" value="<?= $luongCB1 ?>"></td>
                            </tr>
                            <tr>
                                <td>Ngày lập lương:</td>
                                <td><input class="form-control" readonly name="txttg" value="<?= $TG ?>"></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><button type="submit" class="btn btn-primary">Cập nhật</button> </td>
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
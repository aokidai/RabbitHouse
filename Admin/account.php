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
                            <i class="fa fa-user fa-fw"></i><?=$hoTenNVtmp?><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Quản lí tài khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                        </li>
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
                        <h1 class="page-header">SỬA NHÂN VIÊN</h1>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $usertmp = $username;
                include "../include/connect.inc";
                if (isset($_POST["update"])) {
                    $user = $_POST["txtUser"];
                    $SoDT = $_POST["txtSoDT"];
                    $hoTen = $_POST["txtHoTen"];
                    $sql = "update tblusers set hoTen = '$hoTen', soDT = '$SoDT' where username='$usertmp'";
                    $rs = mysqli_query($conn, $sql);
                    if ($rs)
                        echo "<script>alert('Đã lưu thành công!')</script>";
                    echo "<script>window.location.href='account.php'</script>";
                }  else {
                    $sql = "select * from tblusers where username='$usertmp'";
                    $rs = mysqli_query($conn, $sql);
                    $row = $row = mysqli_fetch_array($rs);
                    $user = $row["username"];
                    $hoTen = $row["hoTen"];
                    $SoDT = $row["soDT"];
                }

                ?>
                <form method="post">
                    <table class="table table-striped table-bordered table-hover" style="width:50%" align="center">
                        <tbody>
                            <tr>
                                <td>Họ tên<span style="color: red">(*)</span>:</td>
                                <td><input type="text" class="form-control" name="txtHoTen" value="<?= $hoTen ?>"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại<span style="color: red">(*)</span>:</td>
                                <td><input type="number" class="form-control" name="txtSoDT" value="<?= $SoDT ?>"></td>
                            </tr>
                            <tr>
                                <td>Username<span style="color: red">(*)</span>:</td>
                                <td><input class="form-control" readonly name="txtUser" value="<?= $user ?>"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu:</td>
                                <td><a href="./change_password.php"><span style="color: red; float: right;"><i>Đổi mật khẩu?</i></span></a></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><button type="submit" name="update" class="btn btn-primary">Cập nhật</button><button type="reset" class="btn btn-warning" style="margin-left: 10px">Làm lại</button></td>
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
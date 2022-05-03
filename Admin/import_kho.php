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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                        $sql0000 = "select id_user, hoTen from tblusers where username = '$user00tmp'";
                        $rs0000 = mysqli_query($conn, $sql0000);
                        $row0000 = mysqli_fetch_array($rs0000);
                        $hoTenNVtmp = $row0000["hoTen"];
                        $idNV = $row0000["id_user"];
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
                        <h1 class="page-header">THÊM HÀNG</h1>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST["chon"])) {
                        $image            =    $_FILES["txtHinh"]["name"];
                        $name_tmp        =    $_FILES["txtHinh"]["tmp_name"];
                        $sql = "insert into tblkhotmp(tenFile) values('$image')";
                        $rs             =    mysqli_query($conn, $sql);
                        if ($rs) {
                            move_uploaded_file($name_tmp, "../filetmp/" . $image);
                            $sql3 = 'select max(idKhotmp) as idKhotmp from tblkhotmp';
                            $rs3 = mysqli_query($conn, $sql3);
                            $row3 = mysqli_fetch_array($rs3);
                            $maxID = $row3["idKhotmp"];
                            $sql3tmp = "select tenFile from tblkhotmp where idkhotmp = '$maxID'";
                            $rs3tmp = mysqli_query($conn, $sql3tmp);
                            $row3tmp = mysqli_fetch_array($rs3tmp);
                            $tenFile = $row3tmp["tenFile"];
                            $openFileNew = "../filetmp/" . $tenFile;
                            $txt_file = fopen($openFileNew, 'r');
                            $a = 1;
                            while ($line = fgets($txt_file)) {
                                $tenHang = "";
                                $soLuongBD = "";
                                $soTien = "";
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $tgNK = date('Y-m-d H:i:s');
                                $tgXK = "";
                                if ($a == 1) {
                                    $tenHang = $line;
                                    $sql5 = "insert into tblkho(tenHang, thoiGianNK, thoiGianXK, id_user) 
                                values('$tenHang', '$tgNK', '$tgXK', '$idNV')";
                                    $rs5 =  mysqli_query($conn, $sql5);
                                    if (!$rs5) echo "<script>alert('Error:403')</script>";
                                }
                                $getMaxSQL = "select max(idKho) as idKho from tblkho";
                                $getMaxRS = mysqli_query($conn, $getMaxSQL);
                                $getMaxRow = mysqli_fetch_array($getMaxRS);
                                $idKhoMax = $getMaxRow["idKho"];
                                if ($a == 2) {
                                    $soLuongBD = $line;
                                    $soLuongBD = (int) $soLuongBD;
                                    $sql6 = "update tblkho set soLuongBD = '$soLuongBD', soLuongCL = '$soLuongBD' where idKho = '$idKhoMax'";
                                    $rs6 = mysqli_query($conn, $sql6);
                                    if (!$rs6) echo "<script>alert('Error:B')</script>";
                                }
                                if ($a == 3) {
                                    $soTien = $line;
                                    $soTien = (int) $soTien;
                                    $sqlxy = "update tblkho set soTien = '$soTien' where idKho = '$idKhoMax'";
                                    $rsxy = mysqli_query($conn, $sqlxy);
                                    if (!$rs6) echo "<script>alert('Error:C')</script>";
                                }
                                $a++;
                                if ($a > 3) {
                                    $a = 1;
                                }
                            }
                            fclose($txt_file);
                            $status = unlink($openFileNew);
                            $sqlDelete = "delete from tblkhotmp";
                            $rsDelete = mysqli_query($conn, $sqlDelete);
                            if (!$status) {
                                echo "<script>alert('Error:Delete File')</script>";
                            }
                            $trangThai = $_POST['trangThai'];
                            if ($trangThai == "O") {
                                $sql1xx = "select idMon from tblmon where conHang = 'X'";
                                $rs1xx = mysqli_query($conn, $sql1xx);
                                $row1xx = mysqli_fetch_array($rs1xx);
                                $idMonTmpA1 = $row1xx["idMon"];
                                if ($idMonTmpA1 != null) {
                                    $sql1xx2 = "select idMon from tblmon where conHang = 'X'";
                                    $rs1xx2 = mysqli_query($conn, $sql1xx2);
                                    while ($row1xx2 = mysqli_fetch_array($rs1xx2)) {
                                        $idMonCheck = $row1xx2['idMon'];
                                        $sql2xx = "update tblmon set conHang='O' where idMon = '$idMonCheck'";
                                        $rs2xx = mysqli_query($conn, $sql2xx);
                                        if ($rs2xx) {
                                            echo "<script>alert('Đã lưu kho')</script>";
                                            echo "<script>window.location.href='list_kho.php?page=1'</script>";
                                        } else echo "<script>alert('Error!')</script>";
                                    }
                                } else {
                                    echo "<script>alert('Đã lưu kho')</script>";
                                    echo "<script>window.location.href='list_kho.php?page=1'</script>";
                                }
                            } else {
                                echo "<script>alert('Đã lưu kho')</script>";
                                echo "<script>window.location.href='list_kho.php?page=1'</script>";
                            }
                        } else echo "<script>alert('Error!')</script>";
                    }
                    ?>
                    <form method="post">
                        <table class="table table-striped table-bordered table-hover" style="width:50%" align="center">
                            <tbody>
                                <tr>
                                    <td>File hàng hóa<span style="color: red">(*)</span><label style="color:red"
                                            title="Chỉ upload file text có đuôi *.txt">(?)</label>:</td>
                                    <td><input type="file" class="form-control" name="txtHinh" id="fileField"></td>
                                </tr>
                                <tr>
                                    <td>Đổi trạng thái món?<span style="color: red">(*)</span><span style="color: red"
                                            title="Khi nhập hàng vào kho thì có chuyển toàn bộ món sang trạng thái còn hàng hay không? Trong trường hợp cần chuyển chọn Chuyển, ngược lại chọn Không chuyển">(?)</span>:
                                    </td>
                                    <td>
                                        <input type="radio" id="conHang" name="trangThai" value="O" checked><label
                                            style="padding-left: 5px;">Chuyển</label>
                                        <input type="radio" id="hetHang" name="trangThai" value="X"><label
                                            style="padding-left: 5px;">Không chuyển</label>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">
                                        <button type="submit" name="chon" class="btn btn-primary">Thêm</button>
                                        <button type="button"
                                            onClick="javascript:window.location.href='list_kho.php?page=1'"
                                            class="btn btn-warning">Hủy</button>
                                    </td>
                                </tr>
                                <tr align="right">
                                    <td colspan="2">
                                        <a href="./support_importfile.php"><label style="color: red;"><i>Bạn cần hổ
                                                    trợ?</i></label></a>
                                    </td>
                                </tr>
                        </table>
                    </form>
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
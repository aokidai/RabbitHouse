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
        <form action="list_user.php" method="post">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">DANH SÁCH NHÂN VIÊN</h1>
                            <button type="button" class="btn btn-success" style="margin-bottom: 20px" onClick="javascript:window.location.href='insert_user.php'">Thêm nhân viên</button>
                            <button type="submit" name="xoa" class="btn btn-success" style="margin-bottom: 20px">Xóa nhân viên</button>
                            <button type="button" onClick="javascript:window.location.href='insert_luong.php'" class="btn btn-success" style="margin-bottom: 20px; float: right; margin-right: 2%; background-color: aqua; color: black">Quản Lí Lương</button>
                            <button type="submit" name="reset" class="btn btn-success" style="margin-bottom: 20px; float: right; margin-right: 10px; background-color: red; color: white">Reset Lương</button>
                        </div>

                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Username</th>
                                    <th>Tổng thời gian</th>
                                    <th>Lương</th>
                                    <th>Sửa</th>
                                    <th>Xóa </th>
                                </tr>
                            </thead>
                            <script>
                                function del_confirm(strlink) {
                                    ok = confirm("Bạn có muốn xóa không?");
                                    if (ok != 0)
                                        window.location.href = strlink;
                                }
                            </script>
                            <tbody>
                                <?php
                                include("../include/connect.inc");
                                $sql        =    "select * from tblstaff";
                                $rs         =    mysqli_query($conn, $sql);
                                $count        =    mysqli_num_rows($rs);
                                // Hiển thị
                                $pageSize = 5;
                                $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                                $sql        =    "select * from tblstaff limit $pos, $pageSize";
                                $rs         =    mysqli_query($conn, $sql);
                                $i            =    1;
                                while ($row = mysqli_fetch_array($rs)) {
                                    echo " <tr>
                                            <td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idStaff"] . "'></td>
                                            <td>$i</td>
                                            <td>" . $row["hoTen"] . "</td>
                                            <td>" . $row["username"] . "</td>
                                            <td>" . $row["tongTG"] . "</td>
                                            <td>" . $row["tongLuong"] . "</td>
                                            <td><a href='edit_user.php?id=" . $row["idStaff"] . "'>Sửa</a></td>
                                            <td><a href='javascript:del_confirm(\"del_user.php?id=" . $row["idStaff"] . "\")'>Xóa</a></td>
                                            </tr>";
                                    $i++;
                                }
                                ?>
                                <?php
                                if(isset($_POST['xoa'])){
                                if (!empty($_POST['check_list'])) {
                                    foreach ($_POST['check_list'] as $check) {
                                        $sql9 = "delete from tblstaff where idStaff = '$check'";
                                        $rs9 = mysqli_query($conn, $sql9);
                                    }
                                    echo "<script>window.location.href='list_user.php'</script>";
                                }}
                                else if(isset($_POST['reset'])){
                                    $sql9 = "update tblstaff set tongTG='0', tongLuong = '0'";
                                    $rs9 = mysqli_query($conn, $sql9);
                                    $sql10 = "delete from tblchamcong";
                                    $rs10 = mysqli_query($conn, $sql10);
                                }
                                ?>
                            </tbody>
                            <tr>
                                <th colspan="4">
                                    <?php
                                    for ($i = 1; $i <= ceil($count / $pageSize); $i++)
                                        echo "<a href='list_user.php?page=$i'>" . $i . "</a>&nbsp&nbsp";
                                    ?>
                                </th>
                            </tr>
                            <tr align="center">
                                <th colspan="9">
                                    <center><label style="background-color: #f2f2f2; width: 150px; border-radius: 10px;"><a href="./export_nhanvien.php">🖨️ Xuất Excel</a></label></center>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </form>

    </div>
    <!-- /#wrapper -->
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('check_list[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
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
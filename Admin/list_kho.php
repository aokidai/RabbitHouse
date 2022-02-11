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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Quản lí tài khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                        </li>
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
                            <button type="button" class="btn btn-success" style="margin-bottom: 20px" onClick="javascript:window.location.href='insert_kho.php'">Thêm hàng</button>
                            <button type="submit" class="btn btn-success" style="margin-bottom: 20px">Xóa hàng</button>
                            <button onClick="window.location.reload();" class="btn btn-success" style="margin-bottom: 20px; float: right; margin-right: 2%; background-color: aqua; color: black">Tải lại dữ liệu</button>
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
                                    <th>S.Lượng ban đầu</th>
                                    <th>S.Lượng còn lại</th>
                                    <th>Thời gian nhập kho</th>
                                    <th>T.Gian xuất kho (mới nhất)</th>
                                    <th>Quản lí</th>
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
                                    $sql        =    "select * from tblkho";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $count        =    mysqli_num_rows($rs);
                                    // Hiển thị
                                    $pageSize = 5;
                                    $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                                    $sql        =    "select * from tblkho limit $pos, $pageSize";
                                    $rs         =    mysqli_query($conn, $sql);
                                    $i            =    1;
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $idNV = $row["id_user"];
                                        $tgXK = $row["thoiGianXK"];
                                        $tgXKtmp = "";
                                        if ($tgXK == "0000-00-00 00:00:00") {
                                            $tgXKtmp = "";
                                        } else $tgXKtmp = $row["thoiGianXK"];
                                        $sql99 = "select hoTen from tblusers where id_user = $idNV";
                                        $rs99 = mysqli_query($conn, $sql99);
                                        $row99 = mysqli_fetch_array($rs99);
                                        $hoTenNV = $row99["hoTen"];
                                        echo " <tr>
														<td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idKho"] . "'></td>
														<td>$i</td>
														<td>" . $row["tenHang"] . "</td>
                                                        <td>" . $row["soLuongBD"] . "</td>
                                                        <td>" . $row["soLuongCL"] . "</td>
                                                        <td>" . $row["thoiGianNK"] . "</td>
                                                        <td>$tgXKtmp</td>
                                                        <td>$hoTenNV</td>
														<td><a href='edit_kho.php?id=" . $row["idKho"] . "'>Sửa</a></td>
														</tr>";
                                        $i++;
                                    }
                                    ?> <?php
                                        if (!empty($_POST['check_list'])) {
                                            foreach ($_POST['check_list'] as $check) {
                                                $sql9 = "delete from tblkho where idKho = '$check'";
                                                $rs = mysqli_query($conn, $sql9);
                                            }
                                            echo "<script>window.location.href='list_kho.php'</script>";
                                        }
                                        ?>
                                <tr>
                                    <th colspan="4">
                                        <?php
                                        for ($i = 1; $i <= ceil($count / $pageSize); $i++)
                                            echo "<a href='list_kho.php?page=$i'>" . $i . "</a>&nbsp&nbsp";
                                        ?>
                                    </th>
                                </tr>
                            </tbody>
                            <tr align="center">
                                <th colspan="9">
                                    <center><label style="background-color: #f2f2f2; width: 150px; border-radius: 10px;"><a href="./export_kho.php">🖨️ Xuất Excel</a></label></center>
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
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $thoigian = $_SESSION["ThoiGian"];
    unset($_SESSION["ThoiGian2"]);
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

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">DANH SÁCH DOANH THU</h1>
                        <div style="float: left;">
                            <form action="list_doanhthu.php" method="post">
                                <label for="Manufacturer">Chọn thời gian: </label>
                                <select id="cmbThoiGian" name="ThoiGian">
                                    <?php
                                    include("../include/connect.inc");
                                    $sql        =    "select DISTINCT ngay from tbldoanhthu";
                                    $rs         =    mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $ngay = $row["ngay"];
                                        echo " 
											<option id='$ngay' value=" . $row["ngay"] . ">" . $row["ngay"] . "</option>
										";
                                    }
                                    ?>
                                </select>
                                <input type="submit" name="tmpppp" id="hide" value="Nhiều ngày" />
                                <?php
                                error_reporting(E_ERROR | E_PARSE);
                                if (isset($_POST['tmpppp'])) {
                                    echo "<select id='cmbThoiGian' name='ThoiGian2' style='margin-left: -85px; margin-right: 5px;'>";
                                    $tmpx = $_POST['ThoiGian'];
                                    $_SESSION["ThoiGian"] = $tmpx;
                                    include("../include/connect.inc");
                                    $sql        =    "select DISTINCT ngay from tbldoanhthu where ngay >= '$tmpx'";
                                    $rs         =    mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $ngay = $row["ngay"];
                                        echo " 
                                        <option id='option2' value=" . $row["ngay"] . ">" . $row["ngay"] . "</option>
                                    ";
                                    }
                                    echo "</select>";
                                    echo "<script>document.getElementById('hide').style.visibility = 'hidden'</script>";
                                    echo "<script>
                                            abc = document.getElementById('$tmpx');
                                            abc.setAttribute('selected', 'selected');
                                           </script>";
                                }
                                ?>
                                <input type="submit" name="xemDS" value="Xem danh sách" />
                            </form>
                        </div>
                        <button onClick="window.location.reload();" class="btn btn-success" style="margin-bottom: 20px; float: right; margin-right: 2%; background-color: aqua; color: black">Tải lại dữ liệu</button>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>

                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã hóa đơn</th>
                                <th>Ngày tháng</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(E_ERROR | E_PARSE);
                            if (isset($_POST['xemDS'])) {
                                $tmp = $_POST['ThoiGian'];
                                $tmp2 = $_POST['ThoiGian2'];
                                $_SESSION["ThoiGian"] = $tmp;
                                $_SESSION["ThoiGian2"] = $tmp2;
                                $TongTien = 0;
                                if ($tmp2 == null) {
                                    $sql2        =    "select * from tbldoanhthu where ngay = '$tmp'";
                                    $rs2        =    mysqli_query($conn, $sql2);
                                } else {
                                    $sql2        =    "select * from tbldoanhthu where ngay between '$thoigian' and '$tmp2'";
                                    $rs2        =    mysqli_query($conn, $sql2);
                                }
                                $i            =    1;
                                while ($row2 = mysqli_fetch_array($rs2)) {

                                    $TongTien = $TongTien + ($row2["thanhTien"]);
                                    echo " <tr>
                                            <td>$i</td>
                                            <td>" . $row2["idChiTiet"] . "</td>
                                            <td>" . $row2["ngay"] . "</td>
                                            <td>" . $row2["tongSL"] . "</td>
                                            <td>" . $row2["thanhTien"] . "</td>
                                            </tr>";
                                    $i++;
                                }
                                echo "<script>
                                        abc = document.getElementById('$tmp');
                                        abc.setAttribute('selected', 'selected');
                                    </script>";
                            }
                            ?>
                        </tbody>
                        <tr>
                            <th colspan="4">Tổng doanh thu:</th>
                            <th>
                                <?php
                                echo $TongTien;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">Tổng vốn hàng hóa:</th>
                            <th>
                                <?php
                                if ($tmp2 == null) {
                                    $sql3 = "select * from tbldoanhthukho where ngayXK = '$tmp'";
                                    $rs3 = mysqli_query($conn, $sql3);
                                    while ($row3 = mysqli_fetch_array($rs3)) {
                                        $thanhTien = $row3["thanhTien"];
                                        $tongTT += $thanhTien;
                                    }
                                    if ($tongTT == 0) echo 0;
                                    else
                                        echo $tongTT;
                                } else {
                                    $sql3 = "select * from tbldoanhthukho where ngayXK between '$thoigian' and '$tmp2'";
                                    $rs3 = mysqli_query($conn, $sql3);
                                    while ($row3 = mysqli_fetch_array($rs3)) {
                                        $thanhTien = $row3["thanhTien"];
                                        $tongTT += $thanhTien;
                                    }
                                    if ($tongTT == 0) echo 0;
                                    else
                                        echo $tongTT - 10000;
                                }


                                ?>
                            </th>
                        </tr>
                        <tr style="color: red;">
                            <th colspan="4">Tổng doanh thu:</th>
                            <th>
                                <?php
                                $TongDTTN = $TongTien - $tongTT;
                                echo $TongDTTN;
                                ?>
                            </th>
                        </tr>
                        <tr align="center">
                            <th colspan="5">
                                <center><label style="background-color: #f2f2f2; width: 150px; border-radius: 10px;"><a href="./export_doanhthu.php">🖨️ Xuất Excel</a></label></center>
                            </th>
                        </tr>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

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
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idKhachhang = $_SESSION["idStaff"];
} else
    header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rabbit House</title>
    <link rel="icon" type="image/png" sizes="32x16" href="../img/rabbithouse.png">
    <link rel="stylesheet" type="text/css" href="../css/style2.css?" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    #mon {
        width: 240px;
        height: 320px;
        margin: 3px;
        margin-top: 100px;
        text-align: center;
        float: left;
    }

    #tenMon {
        margin-top: 5px;
        vertical-align: top;
        height: 40px;
        font-size: 25px;
    }

    #tenMon a {
        text-decoration: none;
        color: #000;
        font-size: 25px;
    }

    #tenMon a:hover {
        color: #000;
    }

    #hinhAnh {
        width: 150px;
        height: 200px;
    }

    #hinhAnh:hover {
        transfrom: scale(1.1);
    }

    #dongia {
        margin-top: 10px;
        font-size: 30px;
    }

    #donGia span {
        color: #000;
        font-size: 30px;
        font-weight: bold;
    }

    #nutchonmua {
        height: 30px;
    }

    #info1 {
        padding: 50px;
    }

    #info1 span {
        text-align: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
        font-family: 'Times New Roman', Times, serif;
        font-size: 40px;
        font-weight: bold;
    }

    #info1 ul {
        display: block;
        margin-left: auto;
        margin-right: auto;
        list-style-type: none;
        overflow: hidden;
        text-align: center;
        margin-top: 30%;
    }

    #info1 ul li {
        display: list-item;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        list-style-position: unset;
        display: inline-block;
        list-style-type: none;
        line-height: 40px;
        margin-left: -2px;
        width: 120px;
        height: 40px;
    }

    #info1 ul li a img {
        width: 70px;
        height: 70px;
    }

    * {
        box-sizing: border-box
    }

    body {
        font-family: Verdana, sans-serif;
        margin: 0
    }

    .mySlides {
        display: none
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

        .prev,
        .next,
        .text {
            font-size: 11px
        }
    }

    #ttLoai {
        display: block;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 40px;
        font-weight: bold;
        margin-left: 18%;
    }

    #myInput {
		width: 15%;
		font-size: 16px;
		margin-bottom: 12px;
		float: right;
		margin-right: 10px;
		display: block;
		border: none;
		border-bottom: 1px solid #ccc;
		margin-top: 8px;
	}
</style>

<body>
    <?php $user = $username ?>
     
    <header>
        <?php include "./header.php"; ?>
            <div> <br /><br /><br />
                <div align="center">
                    <form action="xuatkho.php" method="GET">
                        <input id="searchbar" name="txtsearchMon" type="text" placeholder="Bạn đang tìm gì?">
                        <input type="submit" name="timKiem" value="🔍" title="Tìm kiếm">
                    </form>
                </div>
                <script type="text/javascript">
                    $(function() {
                        $("#searchbar").autocomplete({
                            source: 'ajax-mon-search.php',
                        });
                    });
                </script>
                <br />
                <?php
                include "../include/connect.inc";
                if (isset($_GET["txtsearchMon"])) {
                    $searchMon = $_GET["txtsearchMon"];
                    $sql = "select idMon, tenMon from tblmon where tenMon like '%$searchMon%' and conHang = 'O'";
                    $rs = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($rs)) {
                        //echo "<div id='link' onClick='addText(\"".$row['tenMon']."\");'>" . $row['tenMon'] . "</div>"; 
                        echo "<script>window.location.href='search.php?id=" . $row["idMon"] . "'</script>";
                    }
                    $tmp = $_GET["txtsearchMon"];
                    if ($tmp == $searchMon) {
                        echo ("<span style=\"text-align:center; color:red; font-size: 30px\"><center>Không có sản phẩm đó!</center></span>");
                    }
                }
                ?>
            </div>
    </header>
    <section id="info" align="center">
        <form method="post" action="xuatkho.php">
            <span>Xuất Kho Hàng Hóa</span><br />
            <button type="submit" class="btn btn-success" name="xuatkho" style="margin-bottom: 20px; float: left; margin-left: 2%;" title="Nếu nguyên liệu dùng để làm món cho khách hàng bị hết, nhân viên hãy chọn vào nguyên liệu đó và nhấn Xuất kho trước ngay khi lấy hàng ra khổi kho">Xuất kho</button>
            <label style="margin-bottom: 20px; font-size: 15px; font-weight: bold; float: left; margin-left: 5px; margin-top: 7px; color: red" title="Mỗi lần xuất kho là 1Kg. Số lượng ban đầu và số lượng còn lại cũng được tính theo đơn vị Kg. Khi nhân viên nhận thấy hết nguyên liệu, nhân viên phải vào đây để cập nhật khi lấy hàng mới.">(?)</label>
            <button type="button" class="btn btn-success" onClick="javascript:window.location.href='check_mon.php'" style="margin-bottom: 20px; font-size: 15px; font-weight: bold; float: right; margin-right: 2%; background-color: red; color: white" title="Trường hợp món hết hàng, nhân viên vào đây để chuyển trạng thái món sang hết hàng">Trạng thái món</button>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm tên hàng hóa..." title="Tìm kiếm hàng hóa cần xuất kho">
            <div class="table-responsive table-bordered">
                <table class="table" style="width:97%" align="center" id="myTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
                            <th>STT</th>
                            <th>Tên hàng</th>
                            <th>S.Lượng ban đầu</th>
                            <th>S.Lượng còn lại</th>
                            <th>Thời gian nhập kho</th>
                            <th>T.Gian xuất kho <br />(mới nhất)</th>
                            <th>Quản lí</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../include/connect.inc");
                        $sql        =    "select * from tblkho";
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
                            $SLBD = $row["soLuongBD"];
                            $SLCL = $row["soLuongCL"];
                            echo " <tr>
                                    <td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idKho"] . "'></td>
                                    <td>$i</td>
                                    <td>" . $row["tenHang"] . "</td>
                                    <td>$SLBD</td>
                                    <td>$SLCL</td>
                                    <td>" . $row["thoiGianNK"] . "</td>
                                    <td>$tgXKtmp</td>
                                    <td>$hoTenNV</td>
                                    </tr>";
                            $i++;
                        }
                        if (isset($_POST["xuatkho"])) {
                            if (!empty($_POST['check_list'])) {
                                foreach ($_POST['check_list'] as $check) {
                                    $sql00 = "select soLuongCL, tenHang from tblKho where idKho = $check";
                                    $rs00 = mysqli_query($conn, $sql00);
                                    $row00 = mysqli_fetch_array($rs00);
                                    $SLCLtmp = $row00["soLuongCL"];
                                    $tenHangtmp = $row00["tenHang"];
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $tgXK = date('Y-m-d H:i:s');
                                    if($SLCLtmp > 0){
                                        $SLCLtmp--;
                                        $sql9 = "update tblkho set thoiGianXK = '$tgXK', soLuongCL = '$SLCLtmp' where idKho = $check";
                                        $rs9 = mysqli_query($conn, $sql9);
                                        if($rs9){
                                            $sqlFirst = "select idKho from tbldoanhthukho";
                                            $rsFirst = mysqli_query($conn, $sqlFirst);
                                            $rowFirst = mysqli_fetch_array($rsFirst);
                                            $idKhoFirst = $rowFirst["idKho"];
                                            $sqlKhotmp = "select soTien, soLuongBD from tblkho where idKho = $check";
                                            $rsKhotmp = mysqli_query($conn, $sqlKhotmp);
                                            $rowKhotmp = mysqli_fetch_array($rsKhotmp);
                                            $soTien = $rowKhotmp["soTien"];
                                            $soLuongBD = $rowKhotmp["soLuongBD"];
                                            $thanhTien1Hang = $soTien/$soLuongBD;
                                            if($idKhoFirst != null){
                                                $sql3Max = "select max(idDTK) as idDTK from tbldoanhthukho where idKho = '$check'";
                                                $rs3Max = mysqli_query($conn, $sql3Max);
                                                $row3Max = mysqli_fetch_array($rs3Max);
                                                $maxIDDTK = $row3Max["idDTK"];
                                                $sqlDelete = "delete from tbldoanhthukho where idDTK = '$maxIDDTK'";
                                                $rsDelete = mysqli_query($conn, $sqlDelete);
                                            }
                                            $sql100 = "insert into tbldoanhthukho(ngayXK, thanhTien, idKho) values ('$tgXK', '$thanhTien1Hang', '$check')";
                                            $rs100 = mysqli_query($conn, $sql100);
                                            echo "<script>alert('Đã xuất kho thành công!')</script>";
                                        }
                                    }
                                    else {
                                        echo "<script>alert('Sản phẳm $tenHangtmp đã hết hàng trong kho, hãy dùng phần phản hòi để báo với quản lí!')</script>";
                                    }
                                }
                                echo "<script>window.location.href='xuatkho.php'</script>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-success" name="xuatkho" title="Nếu nguyên liệu dùng để làm món cho khách hàng bị hết, nhân viên hãy chọn vào nguyên liệu đó và nhấn Xuất kho trước ngay khi lấy hàng ra khổi kho">Xuất kho</button>
                </div>
                <script>
                    function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[2];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
                <script>
                    $('th').click(function() {
                        var table = $(this).parents('table').eq(0)
                        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
                        this.asc = !this.asc
                        if (!this.asc) {
                            rows = rows.reverse()
                        }
                        for (var i = 0; i < rows.length; i++) {
                            table.append(rows[i])
                        }
                    })

                    function comparer(index) {
                        return function(a, b) {
                            var valA = getCellValue(a, index),
                                valB = getCellValue(b, index)
                            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
                        }
                    }

                    function getCellValue(row, index) {
                        return $(row).children('td').eq(index).text()
                    }
                </script>
            </div>
        </form>
        <script language="JavaScript">
            function toggle(source) {
                checkboxes = document.getElementsByName('check_list[]');
                for (var i = 0, n = checkboxes.length; i < n; i++) {
                    checkboxes[i].checked = source.checked;
                }
            }
        </script>
    </section>
    </section>
    <div style="padding-top: 1%;">
        <footer>
           <div style="text-align: center;">
        <p>Liên hệ: Rabbit House Coffee<br />
          〒542-0081 3-1 Minamisenba, Chuo-ku, Osaka-shi, Osaka<br />
          Tel/Fax: 03-6472-xxxx<br />
          Mobile: 090-3176-4xxx<br />
          E-mail: info@dragoninc.co.jp</p>
        <p>🄫 2021 Power by Dragon Inc</p>
      </div>
        </footer>
    </div>
</body>

</html>
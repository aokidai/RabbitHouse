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
    margin-right: 30px;
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
                <form action="check_mon.php" method="GET">
                    <input id="searchbar" name="txtsearchMon" type="text" placeholder="B???n ??ang t??m g???">
                    <input type="submit" name="timKiem" value="????" title="T??m ki???m">
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
                    echo ("<span style=\"text-align:center; color:red; font-size: 30px\"><center>Kh??ng c?? s???n ph???m ????!</center></span>");
                }
            }
            ?>
        </div>
    </header>
    <section id="info" align="center">
        <form method="post" action="check_mon.php">
            <span>Tr???ng th??i m??n</span><br />
            <button type="submit" class="btn btn-success" name="hethang"
                style="margin-bottom: 20px; float: left; margin-left: 2%;"
                title="Trong tr?????ng h???p h??ng trong kho h???t l??m vi???c ch??? bi???n ra m??n ???? b??? gi??n ??o???n th?? m??n ???? s??? v??o tr???ng th??i h???t h??ng. Tr?????ng h???p h??ng v??o kho ???? ?????, h??ng s??? ???????c c???p nh???t l???i n??n c?? th??? pha ch??? m??n ????.">H???t
                h??ng? C?? h??ng?</button>
            <input type="text" id="myInput" class="w3-input" onkeyup="myFunction()" placeholder="T??m t??n m??n..."
                title="T??m ki???m m??n c???n chuy???n tr???ng th??i t??? c??n h??ng sang h???t h??ng v?? ng?????c l???i">
            <div class="table-responsive table-bordered">
                <table class="table" style="width:97%" align="center" id="myTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkbox" class="chk_box" onClick="toggle(this)"></th>
                            <th>STT</th>
                            <th>T??n m??n</th>
                            <th>Gi??</th>
                            <th>H??nh ???nh</th>
                            <th>Tr???ng th??i hi???n t???i</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../include/connect.inc");
                        $sql        =    "select * from tblmon";
                        $rs         =    mysqli_query($conn, $sql);
                        $count        =    mysqli_num_rows($rs);
                        // Hi???n th???
                        $pageSize = 5;
                        $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                        $sql        =    "select * from tblmon limit $pos, $pageSize";
                        $rs         =    mysqli_query($conn, $sql);
                        $i            =    1;
                        while ($row = mysqli_fetch_array($rs)) {
                            $trangThai = $row["conHang"];
                            if ($trangThai == "X") {
                                $trangThai2 = "H???t";
                            } else $trangThai2 = "C??n";
                            echo " <tr>
                                    <td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idMon"] . "'></td>
                                    <td>$i</td>
                                    <td>" . $row["tenMon"] . "</td>
                                    <td>" . $row["gia"] . "</td>
                                    <td><img src='../uploads/" . $row["hinhAnh"] . "' width=100 height=100></td>
                                    <td>$trangThai2</td>
                                    </tr>";
                            $i++;
                        }
                        ?>
                        <?php
                        if (isset($_POST["hethang"])) {
                            if (!empty($_POST['check_list'])) {
                                foreach ($_POST['check_list'] as $check) {
                                    $sqlCheck = "select conHang from tblmon where idMon = '$check'";
                                    $rsCheck = mysqli_query($conn, $sqlCheck);
                                    $rowCheck = mysqli_fetch_array($rsCheck);
                                    $trangThaitmp = $rowCheck["conHang"];
                                    if ($trangThaitmp == "O") {
                                        $sql9 = "update tblmon set conHang = 'X' where idMon = '$check'";
                                        $rs = mysqli_query($conn, $sql9);
                                    } else {
                                        $sql9 = "update tblmon set conHang = 'O' where idMon = '$check'";
                                        $rs = mysqli_query($conn, $sql9);
                                    }
                                }
                                echo "<script>alert('???? c???p nh???t')</script>";
                                echo "<script>window.location.href='check_mon.php'</script>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
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
                        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(
                            valB)
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
                <p>Li??n h???: Rabbit House Coffee<br />
                    ???542-0081 3-1 Minamisenba, Chuo-ku, Osaka-shi, Osaka<br />
                    Tel/Fax: 03-6472-xxxx<br />
                    Mobile: 090-3176-4xxx<br />
                    E-mail: info@dragoninc.co.jp</p>
                <p>???? 2021 Power by Dragon Inc</p>
            </div>
        </footer>
    </div>
</body>

</html>
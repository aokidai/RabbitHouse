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
</style>
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
    <?php $user = $username ?>

    <header>
        <?php include "./header.php"; ?>
        <div> <br /><br /><br />
            <div align="center">
                <?php
                include "../include/connect.inc";
                $idMon = $_GET["id"];
                $sql = "select tenMon from tblmon where idMon = $idMon";
                $rs = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($rs);
                $tenMon = $row["tenMon"];
                ?>
                <form action="index.php" method="GET">
                    <input id="searchbar" name="txtsearchMon" type="text" placeholder="<?= $tenMon ?>">
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
    <article>
        <input type="hidden" class="form-control" name="txtid" value="<?= $_GET["id"] ?>">
        <section id="info" align="center" style="margin-bottom: 20%">
            <span>Món tìm kiếm</span>
            <?php
            $sql        =    "select * from tblmon where idMon = $idMon and conHang = 'O' limit 0, 12";
            $rs         =    mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($rs)) {
            ?>
            <table align="center">
                <tr align="center">
                    <td>
                        <div id="mon" style="margin-top: 20px">
                            <p id="tenMon"><a href="#" values="<?= $row["tenMon"] ?>"><?= $row["tenMon"] ?></a></p>
                            <img id="hinhAnh" src="../uploads/<?= $row["hinhAnh"] ?>">
                            <p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
                            <a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Thêm vào giỏ hàng"><img
                                    id="nutmuahang" src="../img/Chonmua.png"></a>
                        </div>
                    </td>
                </tr>
            </table>
            <?php } ?>
        </section>
    </article>
    <div>
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
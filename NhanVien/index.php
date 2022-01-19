<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
} else
    header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rabbit House</title>
    <link rel="icon" type="image/png" sizes="32x16" href="../img/rabbithouse.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css?" />
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
</style>

<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "784897768537480");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v11.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <header>
        <div>
            <div id="logo"><a href="./index.php"><img src="../img/logo.png"></a></div>
            <div id="menu">
                <ul>
                    <li><span>Chào: <?= $username ?></span></li>
                    <li><a href="./giohang.php">Đơn hàng</a></li>
                    <li><a href="../index.php">Đăng xuất</a></li>
                </ul>
            </div>
            <div id="menu" style="margin-left: 50%">
                <ul>
                    <li><a href="./produce.php">Sản phẩm</a></li>
                    <li><a href="./information.php">Thông tin</a></li>
                </ul>
            </div>
            <div> <br /><br /><br /><br /><br /><br />
                <div align="center">
                    <form action="index2.php" method="GET">
                        <input id="searchbar" name="txtsearchMon" type="text" placeholder="Bạn đang tìm gì?">
                        <input type="submit" name="timKiem" value="🔍">
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
                    $sql = "select idMon, tenMon from tblmon where tenMon like '%$searchMon%' and conHang = 'Còn'";
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
    <div id="body">
        <div id="photo">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <img src="../img/bg-photo-1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../img/bg-photo-2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../img/bg-photo-3.jpg" style="width:100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

            <script>
                var slideIndex = 0;
                showSlides();

                function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 5000);
                }
            </script>
        </div>
        <article>
            <section id="info" align="center">
                <?php
                $sql3 = "select id, value1 from sensordata order by id DESC limit 1";
                $rs3 = mysqli_query($conn, $sql3);
                while ($row3 = mysqli_fetch_array($rs3)) {
                    $nhietDo = $row3["value1"];
                }
                ?>
                <span>Gợi ý món <span style="font: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif', normal; font-size: 20px">(Nhiệt độ: <?= $nhietDo ?> độ)</span></span>
                <div style="margin-left: 10%">
                    <?php
                    $sql2 = "select id, value1 from sensordata order by id DESC limit 1";
                    $rs2 = mysqli_query($conn, $sql2);
                    $nhietDo = 0;
                    while ($row2 = mysqli_fetch_array($rs2)) {
                        $nhietDo = $row2["value1"];
                        if ($nhietDo == 0) {
                            $sql        =    "select * from tblmon where goiY = 0 and conHang = 'Còn'  limit 0, 12";
                            $rs         =    mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($rs)) {
                    ?>
                                <div id="mon">
                                    <p id="tenMon"><a href="#"><?= $row["tenMon"] ?></a></p>
                                    <img id="hinhAnh" src="../uploads/<?= $row["hinhAnh"] ?>">
                                    <p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
                                    <a href='hauGioHang.php?id=<?= $row["idMon"] ?>'><img id="nutmuahang" src="../img/Chonmua.png"></a>
                                </div>
                            <?php }
                        } else if ($nhietDo < 29) {
                            $sql        =    "select * from tblmon where goiY < 29 and conHang = 'Còn' limit 0, 12";
                            $rs         =    mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($rs)) {
                            ?>
                                <div id="mon">
                                    <p id="tenMon"><a href="#"><?= $row["tenMon"] ?></a></p>
                                    <img id="hinhAnh" src="../uploads/<?= $row["hinhAnh"] ?>">
                                    <p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
                                    <a href='hauGioHang.php?id=<?= $row["idMon"] ?>'><img id="nutmuahang" src="../img/Chonmua.png"></a>
                                </div>
                            <?php }
                        } else if ($nhietDo > 28) {
                            $sql        =    "select * from tblmon where goiY > 28 and conHang = 'Còn' limit 0, 12";
                            $rs         =    mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($rs)) {
                            ?>
                                <div id="mon">
                                    <p id="tenMon"><a href="#"><?= $row["tenMon"] ?></a></p>
                                    <img id="hinhAnh" src="uploads/<?= $row["hinhAnh"] ?>">
                                    <p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
                                    <a href='hauGioHang.php?id=<?= $row["idMon"] ?>'><img id="nutmuahang" src="../img/Chonmua.png"></a>
                                </div>
                    <?php
                            }
                        }
                    } ?>
                </div>
            </section>
            </br></br>
            <section id="info" align="center" style="padding-top: 35%;">
                <span>Món mới</span>
                <div style="padding-left: 10%;">
                    <?php
                    $sql        =    "select * from tblmon where conHang = 'Còn' limit 0, 12";
                    $rs         =    mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($rs)) {
                    ?>
                        <div id="mon">
                            <p id="tenMon"><a href="#"><?= $row["tenMon"] ?></a></p>
                            <img id="hinhAnh" src="../uploads/<?= $row["hinhAnh"] ?>">
                            <p id="donGia">Đơn giá: <span><?= $row["gia"] ?>VND</span></p>
                            <a href='hauGioHang.php?id=<?= $row["idMon"] ?>'><img id="nutmuahang" src="../img/Chonmua.png"></a>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </article>
        <div style="padding-top: 70%;">
            <footer>
                <p style="text-align: center;">掲載されているすべてのコンテンツ(記事、画像、音声データ、映像データ等)の無断転載を禁じます。<br />🄫 2021 Power by Dragon Inc</p>
            </footer>
        </div>
</body>

</html>
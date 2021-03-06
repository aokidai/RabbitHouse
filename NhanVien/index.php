<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
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
        margin: 3px;
        margin-top: 20px;
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
    }
    #menu2 a {
    text-decoration: none;
    color: #000;
    display: block;
  }

  #menu2 a:hover {
    background: #F1F1F1;
    color: #333;
  }

  #menu2 ul {

    list-style-type: none;
    text-align: center;

  }

  #menu2 li {
    display: list-item;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    list-style-position: unset;
    display: inline-block;
    list-style-type: none;
    margin-left: -2px;
  }
</style>

<body>
    <?php $user = $username ?>
     
    <header>
        <?php include "./header.php"; ?>
        <div> <br /><br /><br />
            <div align="center">
                <form action="index.php" method="GET">
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
            </br>
            <aside>
                <div id="menu2" align="center">
                    <span id="ttLoai">Lo???i m??n </span>
                    <ul style="padding-top: 5px">
                        <?php
                        include "../include/left.php";
                        ?>
                    </ul>
                </div>
            </aside>
            <br/>
            <section id="info" align="center">
                <span>M??n m???i</span>
                <div style="margin-left: 10%;">
                    <?php
                    include "../include/connect.inc";
                    $sql        =    "select * from tblmon where conHang = 'O' limit 0, 12";
                    $rs         =    mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($rs)) {
                    ?>
                        <div id="mon">
                            <p id="tenMon"><a href="#" values="<?= $row["tenMon"] ?>"><?= $row["tenMon"] ?></a></p>
                            <img id="hinhAnh" src="../uploads/<?= $row["hinhAnh"] ?>">
                            <p id="donGia">????n gi??: <span><?= $row["gia"] ?>VND</span></p>
                            <a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Th??m v??o gi??? h??ng"><img id="nutmuahang" src="../img/Chonmua.png"></a>
                        </div>
                    <?php } ?>
            </section>
            <div style="padding-top: 70%;">
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
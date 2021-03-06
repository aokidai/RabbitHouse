<?php
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
    $idKhachhang = $_SESSION["idKhachhang"];
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
                        <input type="submit" name="timKiem" value="????" title="T??m ki???m">
                    </form>
                </div><br />
                <script type="text/javascript">
                    $(function() {
                        $("#searchbar").autocomplete({
                            source: 'ajax-mon-search.php',
                        });
                    });
                </script>
                <?php
                if (isset($_GET["timKiem"])) {
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
    <article>
        <input type="hidden" class="form-control" name="txtid" value="<?= $_GET["id"] ?>">
        <section id="info" style="margin-bottom: 5%">
            <span>M??n t??m ki???m</span>
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
                                <p id="donGia">????n gi??: <span><?= $row["gia"] ?>VND</span></p>
                                <a href='hauGioHang.php?id=<?= $row["idMon"] ?>' title="Th??m v??o gi??? h??ng"><img id="nutmuahang" src="../img/Chonmua.png"></a>
                            </div>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </section>
        <div id="info1">
            <span>Twitter</span>
            <div id="cont-footer-twitter" style="padding: 30px; float:left; margin-left:17%">
                <div class="twitter-widget" style="text-align: center;">
                    <a class="twitter-timeline" style="text-align: center" ; data-height="300" data-width="800" data-theme="white" data-link-color="#ef3488" data-border-color="#ef3488" data-chrome="noheader nofooter noborders transparent" href="https://twitter.com/aokidaisuke91">???????????????????????????</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            <ul>
                <li><a href="https://twitter.com/intent/tweet?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82%0D%0A&%E3%81%BF%E3%82%93%E3%81%AA%E3%81%95%E3%82%93%E3%82%88%E3%82%8D%E3%81%97%E3%81%8F%EF%BD%9E&hashtags=&related=" title="Twitter"><img src="../img/twitter.png"></a></li>
                <li><a href="https://social-plugins.line.me/lineit/share?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82" title="Line"><img src="../img/line.png"></a></li>
                <li><a href="#" title="Facebook"><img src="../img/facebook.png"></a></li>
            </ul>
        </div>
    </article>
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

</body>

</html>
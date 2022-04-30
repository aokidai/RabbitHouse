<?php
session_start();
if (isset($_SESSION["username"]))
  $username  =  $_SESSION["username"];
else
  header("location:../login.php");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rabbit House</title>
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
    <link rel="stylesheet" type="text/css" href="../css/style.css?" />
</head>
<style>
#mon {
    width: 240px;
    height: 320px;
    margin: 3px;
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
<script>
function checkLogin() {
    if (document.frmLogin.txtpassword.value == "") {
        alert("Nhập mật khẩu!");
        document.form.txtpassword.focus();
        return;
    }
    if (document.frmLogin.txtrepass.value == "") {
        alert("Nhập lại mật khẩu!");
        document.form.txtrepass.focus();
        return;
    }
    document.frmLogin.submit();
}
</script>

<body>
    <header>
        <div>
            <div id="logo"><img src="../img/logo.png"></div>
        </div>
    </header>
    <?php $user = $username ?>
    <div id="body">
        <div id="photo" style="padding-top: 5%">
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

            <?php
      include "../include/connect.inc";
      if (isset($_POST["txtpassword"])) {
        $password  =  $_POST["txtpassword"];
        $repass  =  $_POST["txtrepass"];
        if ($password != null && $repass != null) {
          if ($password == $repass) {
            $sql    =  "update tblstaff set  tblstaff.password= '$password' where username='$user'";
            $rs    =  mysqli_query($conn, $sql);
            if ($rs) {
              echo "<script>window.location.href='index.php'</script>";
            }
          } else
            echo "<script>alert('Mật khẩu không trùng!')</script>";
        } else
          echo "<script>alert('Kiểm tra lại mật khẩu!')</script>";
      }
      ?>
            <center>
                <form id="form1" name="frmLogin" method="post" action="change-password.php">
                    <table class="table table-striped table-bordered table-hover" style="width:50%; margin-top: 20px">
                        <tr align="center">
                            <th colspan="2">
                                <center>
                                    <span
                                        style="font-weight: bold; font-size:20px; font-family: 'Times New Roman', Times, serif;">Vui
                                        lòng đổi mật khẩu trước khi vào hệ thống
                                </center>
                                </span>
                            </th>
                        </tr>
                        <tr align="center">
                            <td>Mật khẩu mới<span style="color: red">(*)</span>:</td>
                            <td><input type="password" class="form-control" name="txtpassword" id="textfield2"></td>
                        </tr>
                        <tr align="center">
                            <td>Nhập lại mật khẩu<span style="color: red">(*)</span>:</td>
                            <td><input type="password" class="form-control" name="txtrepass" id="textfield3"></td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><input class="btn btn-primary"
                                    style="margin-top: 10px; width: 400px; border-radius: 10px;" type="submit"
                                    name="button" id="button" value="Đổi">
                            </td>
                        </tr>
                    </table>
                    <br />
            </center>
            </form>
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
</body>

</html>
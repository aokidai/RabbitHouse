<?php
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rabbit House</title>
    <link rel="icon" type="image/png" sizes="32x16" href="./img/rabbithouse.png">
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
    <link rel="stylesheet" type="text/css" href="./css/style.css?" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
    if (document.frmLogin.txtusername.value == "") {
        alert("T??i kho???n ho???c m???t kh???u b??? tr??ng!");
        document.form.txtusername.focus();
        return;
    }
    if (document.frmLogin.txtpassword.value == "") {
        alert("T??i kho???n ho???c m???t kh???u b??? tr??ng!");
        document.form.txtpassword.focus();
        return;
    }
    if (document.frmLogin.txtrepassword.value == "") {
        alert("T??i kho???n ho???c m???t kh???u b??? tr??ng!");
        document.form.txtrepassword.focus();
        return;
    }
    document.frmLogin.submit();
}
</script>

<body>
    <header>
        <div>
            <div id="logo"><a href="./index.php" title="Trang ch???"><img src="./img/logo.png"></a></div>
        </div>
    </header>
    <div id="body">
        <div id="photo" style="padding-top: 5%">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <img src="./img/bg-photo-1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="./img/bg-photo-2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="./img/bg-photo-3.jpg" style="width:100%">
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
      if (isset($_POST["txtusername"])) {
        include "./include/connect.inc";
        $username  =  $_POST["txtusername"];
        $password  =  $_POST["txtpassword"];
        $repass  =  $_POST["txtrepass"];
        $sqlCheck = "select username from tblkhachhang";
        $rsCheck = mysqli_query($conn, $sqlCheck);
        $flagKH = 0;
        $flagNV = 0;
        while ($rowCheck = mysqli_fetch_array($rsCheck)) {
          $usernameTmp = $rowCheck['username'];
          if ($username == $usernameTmp) {
            $flagKH = 1;
          }
        }
        $sqlCheckNV = "select username from tblstaff";
        $rsCheckNV = mysqli_query($conn, $sqlCheckNV);
        while ($rowCheckNV = mysqli_fetch_array($rsCheckNV)) {
          $userNVTmp = $rowCheckNV['username'];
          if ($username == $userNVTmp) {
            $flagNV = 1;
          }
        }
        if ($flagKH == 1 && $flagNV == 0) {
          if ($password == $repass) {
            $sql    =  "update tblkhachhang set password= '$password' where username='$username'";
            $rs    =  mysqli_query($conn, $sql);
            if ($rs) {
              echo "<script>window.location.href='login.php'</script>";
            }
          } else
            echo "<script>alert('M???t kh???u kh??ng tr??ng!')</script>";
        } else {
          if ($flagNV == 1 && $flagKH == 0) {
            if ($password == $repass) {
              $sql    =  "update tblstaff set password= '$password' where username='$username'";
              $rs    =  mysqli_query($conn, $sql);
              if ($rs) {
                echo "<script>window.location.href='login.php'</script>";
              }
            } else
              echo "<script>alert('M???t kh???u kh??ng tr??ng!')</script>";
          } else
            echo "<script>alert('Th??ng tin kh??ng ch??nh s??t!')</script>";
        }
      }
      ?>
            <center>
                <form id="form1" name="frmLogin" method="post" action="forgot.php">
                    <table class="table table-striped table-bordered table-hover" style="width:50%; margin-top: 20px">
                        <tbody>
                            <tr>
                                <td colspan="2" align="center"><span
                                        style="font-weight: bold; font-size:20px; font-family: 'Times New Roman', Times, serif;">?????i
                                        m???t kh???u</span></td>
                            </tr>
                            <tr align="center">
                                <td width="136">T??i kho???n:</td>
                                <td width="249"><input type="text" class="form-control" name="txtusername"
                                        id="textfield" placeholder="T??n t??i kho???n"></td>
                            </tr>
                            <tr align="center">
                                <td>M???t kh???u m???i:</td>
                                <td><input type="password" class="form-control" name="txtpassword" id="textfield2"
                                        placeholder="M???t kh???u"></td>
                            </tr>
                            <tr align="center">
                                <td>Nh???p l???i m???t kh???u:</td>
                                <td><input type="password" class="form-control" name="txtrepass" id="textfield3"
                                        placeholder="Nh???p l???i m???t kh???u"></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><input onClick="checkLogin()" class="btn btn-primary" type="submit"
                                        name="button" title="?????i m???t kh???u v?? ????ng nh???p" id="button"
                                        value="?????i m???t kh???u">
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><a href="./create.php"><span style="text-align: center; color: blue"
                                            title="B???n ch??a c?? t??i kho???n?"><i>B???n ch??a c?? t??i kho???n?</i></span></a></td>
                            </tr>
                        </tbody>
                    </table>
            </center>
            </form>
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
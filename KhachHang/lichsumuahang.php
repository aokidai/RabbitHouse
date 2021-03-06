<?php
session_start();
if (isset($_SESSION["username"])) {
	$username	=	$_SESSION["username"];
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
                <form action="giohang.php" method="GET">
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
        </div>
    </header>
    <div id="body">
        <article>
            <section id="info" align="center">
                <span>L???ch s??? mua h??ng</span>
                <div><span style="font-size: 20px; color: red">Tr???ng th??i gia h??ng ???????c bi???u di???n b???i k?? t??? X v?? O. X l??
                        ch??a giao h??ng c??n O l?? ???? giao h??ng.</span></div>
                <br />
                <form method="post" action="lichsumuahang.php">
                    <div class="table-responsive table-bordered">
                        <table class="table" style="width:97%" align="center">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" class="chk_box"></th>
                                    <th>STT</th>
                                    <th>T??n m??n</th>
                                    <th>S??? l?????ng</th>
                                    <th>Th??nh ti???n</th>
                                    <th>Th???i gian</th>
                                    <th>Tr???ng th??i</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$tinhtien = 0;
								include("../include/connect.inc");
								$sql		=	"select * from tbllichsu where idKhachhang = '$idKhachhang'";
								$rs 		=	mysqli_query($conn, $sql);
								$i			=	1;
								while ($row = mysqli_fetch_array($rs)) {
									$sql2	= 	"select * from tblmon where idMon = " . $row["idMon"] . "";
									$rs2 		=	mysqli_query($conn, $sql2);
									$row2 = mysqli_fetch_array($rs2);
									echo " <tr>
								<td><input type='checkbox' class='chk_box1' name='check_list[]' value='" . $row["idlichSu"] . "'></td>
								<td>$i</td>
								<td>" . $row2["tenMon"] . "</td>
								<td>" . $row["soluong"] . "</td>
								<td>" . $row["gia"] . "</td>
								<td>" . $row["thoigian"] . "</td>
								<td>" . $row["daGH"] . "</td>
								</tr>";
									$i++;
								}
								?>
                            </tbody>
                        </table>
                        <?php
						if (isset($_POST["xoahang"])) {
							foreach ($_POST['check_list'] as $check) {
								$sql9 = "delete from tbllichSu where idlichSu = '$check'";
								$rs = mysqli_query($conn, $sql9);
							}
							echo "<script>window.location.href='lichsumuahang.php'</script>";
						}
						?>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-success" name="xoahang" value="X??a h??ng"
                                title="N???u mu???n x??a h??ng ta c???n ch???n h??ng c???n x??a v?? nh???n n??t X??a h??ng">
                        </div>
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
                                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString()
                                    .localeCompare(valB)
                            }
                        }

                        function getCellValue(row, index) {
                            return $(row).children('td').eq(index).text()
                        }
                        </script>
                    </div>
                </form>
                <script type="text/javascript">
                $(function() {
                    $('.chk_box').click(function() {
                        $('.chk_box1').prop('checked', this.checked);
                    });
                });
                </script>
            </section>
            <div id="info1">
                <span>Twitter</span>
                <div id="cont-footer-twitter" style="padding: 30px; float:left; margin-left:17%">
                    <div class="twitter-widget" style="text-align: center;">
                        <a class="twitter-timeline" style="text-align: center" ; data-height="300" data-width="800"
                            data-theme="white" data-link-color="#ef3488" data-border-color="#ef3488"
                            data-chrome="noheader nofooter noborders transparent"
                            href="https://twitter.com/aokidaisuke91">???????????????????????????</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
                <ul>
                    <li><a href="https://twitter.com/intent/tweet?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82%0D%0A&%E3%81%BF%E3%82%93%E3%81%AA%E3%81%95%E3%82%93%E3%82%88%E3%82%8D%E3%81%97%E3%81%8F%EF%BD%9E&hashtags=&related="
                            title="Twitter"><img src="../img/twitter.png"></a></li>
                    <li><a href="https://social-plugins.line.me/lineit/share?text=%E9%9D%92%E6%9C%A8%E5%A4%A7%E4%BB%8B%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%82%A4%E3%83%88%E3%81%A7%E3%81%99%E3%80%82"
                            title="Line"><img src="../img/line.png"></a></li>
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
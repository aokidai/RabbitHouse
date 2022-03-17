<style>
  #menu a {
    text-decoration: none;
    color: #000;
    display: block;
  }

  #menu a:hover {
    background: #F1F1F1;
    color: #333;
  }

  #menu ul {
    float: right;
    list-style-type: none;
    text-align: center;
    padding-right: 15%;
  }
  #menu li {
    display: list-item;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    list-style-position: unset;
    display: inline-block;
    list-style-type: none;
    margin-left: -2px;
  }

  li a,
  .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  #menu li a:hover,
  .dropdown:hover .dropbtn {
    background-color: #F1F1F1;
  }

  li.dropdown {
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }

  .dropdown-content a:hover {
    background-color: #fff;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>
<div>
    <div id="logo"><a href="./index.php" title="Trang chủ"><img src="../img/logo.png"></a></div>
    <div id="menu">
        <ul>
            <li><a href="./donhang.php" title="Đơn hàng">Đơn hàng</a></li>
            <li><a href="./doanhthu.php" title="Doanh thu của nhân viên">Doanh thu</a></li>
            <li><a href="./giohang.php" title="Giỏ hàng bán hàng cho nhân viên">Giỏ hàng</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" title="Thông tin nhân viên, quản lí kho, báo cáo, đăng xuất">Chào: <?php include "../include/connect.inc";
                                                                                                                            $sql0 = "select * from tblstaff where username = '$user'";
                                                                                                                            $rs0 = mysqli_query($conn, $sql0);
                                                                                                                            $row0 = mysqli_fetch_array($rs0);
                                                                                                                            $hoTen = $row0["hoTen"];
                                                                                                                            echo $hoTen;
                                                                                                                            ?></a>
                <div class="dropdown-content">
                    <a href="information.php" title="Thông tin của nhân viên và đổi mật khẩu.">Thông tin</a>
                    <a href="xuatkho.php" title="Kiểm tra và xuất kho khi hết hàng hóa bên ngoài.">Xuất kho</a>
                    <a href="lichsu.php" title="Lịch sử bán hàng của nhân viên.">Lịch sử</a>
                    <a href="report.php" title="Báo cáo lại cho quản lí biết về các vấn đề.">Phản hồi</a>
                    <a href="tmppage.php" title="Chấm công và đăng xuất">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
</div>
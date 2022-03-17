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
    <div id="logo"><a href="./index2.php" title="Trang chủ"><img src="./img/logo.png"></a></div>
    <div id="menu">
        <ul>
            <li><a href="./giohang.php" title="Giỏ hàng những món đã chọn">Giỏ hàng</a></li>
            <li><a href="./produce.php" title="Xem các sản phẩm theo loại">Sản phẩm</a></li>
            <li><a href="./information.php" title="Thông tin tài khoản">Thông tin</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" title="Thông tin khách hàng, quản lí lịch sử, báo cáo, đăng xuất">Chào:
                    <?php include "./include/connect.inc";
                    $sql090 = "select tenKH from tblkhachhang where idKhachhang = '$idKhachhang'";
                    $rs090 = mysqli_query($conn, $sql090);
                    $row090 = mysqli_fetch_array($rs090);
                    $hoTen = $row090["tenKH"];
                    echo $hoTen;
                    ?>
                </a>
                <div class="dropdown-content">
                    <a href="./lichsumuahang.php" title="Lịch sử mua hàng của khách hàng.">Lịch sử</a>
                    <a href="./report.php" title="Phản hồi đến quản trị viên về hệ thống.">Phản hồi</a>
                    <a href="./index.php" title="Đăng xuất.">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
</div>
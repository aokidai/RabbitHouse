<?php 
session_start();
if(isset($_SESSION["username"]))
	$username	=	$_SESSION["username"];
else
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Quản trị Rabbit House</title>
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
        <script src="ckeditor/ckeditor.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="blank.php">Rabbit House</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><?=$username?></$username?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>Quản lí tài khoản</a>
                            </li>
                            <li class="divider"></li>
                            <li>
								<a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

              <?php
					include"./left_admin.php";
				?>
            </nav>
			<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">SỬA MÓN</h1>
                        </div>
						
                        <!-- /.col-lg-12 -->
                    </div>
					<?php
                      include"../include/connect.inc";
                      if(isset($_POST["cboLoai"])){
					   $idMon			=	$_POST["txtIdMon"];
                       $idLoai			=	$_POST["cboLoai"];
                       $tenMon			=	$_POST["txtTenMon"];
                       $moTa			=	$_POST["txtMoTa"];
					   $goiY			=	$_POST["txtGoiY"];
					   $trangThai		=	"";
                       $gia				=	$_POST["txtGia"];
                       $image			=	$_FILES["txtHinh"]["name"];
					   $name_tmp		=	$_FILES["txtHinh"]["tmp_name"];
					   if(isset($_POST['ckCo'])) $trangThai="Còn"; else if(isset($_POST["ckKhong"])) $trangThai="Hết"; else {
						   $sql0 = "select conHang from tblmon where idMon=$idMon";
						   $rs0 = mysqli_query($conn, $sql0);
						   $row0 = mysqli_fetch_array($rs0);
						   $trangThai = $row0['conHang'];
					   }
						if($image!="")  
                       		$sql				=	"update  tblmon set idLoai=$idLoai, tenMon='$tenMon', gia=$gia,  hinhAnh ='$image', moTa='$moTa', goiY='$goiY', conHang = '$trangThai' where idMon=$idMon"; 
					   else
						     $sql		=	"update  tblmon set idLoai=$idLoai, tenMon='$tenMon', gia=$gia, moTa='$moTa', goiY='$goiY', conHang = '$trangThai' where idMon=$idMon"; 
					  		 
                       $rs 				=	mysqli_query($conn, $sql);
                       if($rs){
						   if($image!=""){
							unlink("../uploads/".$_POST["txtHinh"]);
						   	move_uploaded_file($name_tmp,"../uploads/".$image);
						   }
                           echo"<script>window.location.href='list_mon.php'</script>";
					   }
						else
							echo"<script>alert('Thêm món không thành công')</script>";
					 }else{
						$sql			=	"select * from tblmon where idMon= ".$_GET["id"]."";					
						$rs				=	mysqli_query($conn, $sql);
						$row			=	mysqli_fetch_array($rs);
						$tenMon			= 	$row["tenMon"];
						$gia			=	$row["gia"];
						$moTa			=	$row["moTa"];
						$image			=	$row["hinhAnh"];
						$goiY			=	$row["goiY"];
						if(isset($_POST['ckCo'])) $trangThai="Còn"; else if(isset($_POST["ckKhong"])) $trangThai="Hết"; else $trangThai = $row["conHang"];
						//$trangThai		=	$row["conHang"];
					  }
					?>
					<form method="post" enctype="multipart/form-data">
                     <table class="table table-striped table-bordered table-hover" style="width:90%" align="center">
                                           
                                            <tbody>
                                                <tr>
                                                   <input type="text" hidden="true" name="txtIdMon" value='<?=$_GET["id"]?>'>
													<input type="text" hidden="true" name="txtHinh" value="<?=$image?>">
                                                    <td>Tên loại<span style="color: red">(*)</span>:</td>
                                                    <td><select class="form-control" name="cboLoai">
														<?php 
														   $sql =	"select * from tblloai";
														   $rs	=	mysqli_query($conn, $sql);
															while($row=mysqli_fetch_array($rs))
																if($_GET["idLoai"]==$row[0])
																	echo "<option value=".$row[0]." selected>".$row[1]."</option>";
																else
																	echo "<option value=".$row[0]." >".$row[1]."</option>";
														?>
														
														</select></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>Tên món<span style="color: red">(*)</span>:</td>
                                                    <td><input class="form-control" name="txtTenMon" 
															   value="<?=$tenMon?>"></td>
                                                </tr>
                                                <tr>
                                                  <td>Giá<span style="color: red">(*)</span>:</td>
                                                  <td><input type="number" class="form-control" name="txtGia" 
															 value="<?=$gia?>"></td>
                                                </tr>
                                                <tr>
                                                  <td>Hình ảnh:</td>
                                                  <td><input type="file" class="form-control" name="txtHinh" id="fileField"></td>
                                                </tr>
												<tr>
													<td>Trạng thái<span style="color: red">(*)</span>:</td>
													<td>
														<input type="checkbox" name="ckCo" value="1">Còn hàng
														<input type="checkbox" name="ckKhong" value="0"> Hết hàng
                                                        <?php
                                                            $id = $_GET["id"];
                                                            $sql000 = "select conHang from tblmon where idMon = '$id'";
                                                            $rs000 = mysqli_query($conn, $sql000);
                                                            $row000 = mysqli_fetch_array($rs000);
                                                            $trangThaitmp = $row000["conHang"];
                                                            if($trangThaitmp=='Còn') {
                                                                echo " <script> document.getElementById('a1').checked = 'true' </script>";
                                                            }
                                                            else echo " <script> document.getElementById('a2').checked = 'true' </script>";
                                                        ?>
													</td>
												</tr>
												<tr>
                                                  <td>Gợi Ý<span style="color: red">(*)</span>:</td>
                                                  <td><input type="number" class="form-control" name="txtGoiY" value="<?=$goiY?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Công thức</td>
                                                    <td>
                                                        <textarea name="txtMoTa" id="txtMoTa" rows="10" class="form-control"><?= $moTa ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                  <td colspan="2"><button type="submit" class="btn btn-primary">Cập nhật</button><button type="reset" class="btn btn-warning" style="margin-left: 10px">Làm lại</button></td>
                                                </tr>
                                               
                                        </table>
						</form>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'txtdes' );
</script>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
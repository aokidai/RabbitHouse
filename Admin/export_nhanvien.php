<?php  
session_start();
if (isset($_SESSION["username"])) {
    $username    =    $_SESSION["username"];
} else header("location:../login.php");

$user = $username;
include "../include/connect.inc";

$columnHeader = "Staff Report" . "\n" . "Name" . "\t" . "Username" . "\t" . "Total Time" . "\t" . "Total salary";
echo $columnHeader . "\n";

$setData = ''; 
mysqli_set_charset($conn, 'UTF8');
$setSql = "SELECT `hoTen`,`username`,`tongTG`,`tongLuong` FROM `tblstaff`";
$setRec = mysqli_query($conn, $setSql);  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '' . $value . '' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";
    //mb_convert_encoding($setData, 'UTF-16LE', 'UTF-8');  
}  
$encoded_csv = iconv(mb_detect_encoding($setData, mb_detect_order(), true), "UTF-8", $setData);

header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=RabbitHouse_Report_Staff.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo $encoded_csv; //php array convert to csv/excel

exit;
?>
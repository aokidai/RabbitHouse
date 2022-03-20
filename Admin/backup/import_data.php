<?php
// Name of the data file
include "../../include/connect.inc";
$sqlx = "select max(idBackup) as idBackup from backupdata";
$rsx = mysqli_query($conn, $sqlx);
$rowx = mysqli_fetch_array($rsx);
$idMax = $rowx["idBackup"];
$sql1 = "select tenFile from backupdata where idBackup = '$idMax'";
$rs1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($rs1);

$filename = $row1["tenFile"];
// MySQL host
$mysqlHost = 'localhost';
// MySQL username
$mysqlUser = 'root';
// MySQL password
$mysqlPassword = '';
// Database name
$mysqlDatabase = 'rabbithouse';

// Connect to MySQL server
$link = mysqli_connect($mysqlHost, $mysqlUser, $mysqlPassword, $mysqlDatabase) or die('Error connecting to MySQL Database');


$tempLine = '';
// Read in the full file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line) {

    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    // Add this line to the current segment
    $tempLine .= $line;
    // If its semicolon at the end, so that is the end of one query
    if (substr(trim($line), -1, 1) == ';')  {
        // Perform the query
        mysqli_query($link, $tempLine) or print("Error in " . $tempLine);
        // Reset temp variable to empty
        $tempLine = '';
    }
}
 echo "Tables imported successfully";
 echo "<script>alert('Đã import dữ liệu thành công')</script>";
 echo "<script>window.location.href='../blank.php'</script>";
?>
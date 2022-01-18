<?php
require_once('include/connect.inc');

function get_mon($conn , $term){	
	$query = "SELECT * FROM tblmon WHERE tenMon LIKE '%".$term."%' and conHang = 'Còn' ORDER BY tenMon ASC";
	$result = mysqli_query($conn, $query);	
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;	
}

if (isset($_GET['term'])) {
	$getMon = get_mon($conn, $_GET['term']);
	$cityList = array();
	foreach($getMon as $mon){
		$monList[] = $mon['tenMon'];
	}
	echo json_encode($monList);
}
?>
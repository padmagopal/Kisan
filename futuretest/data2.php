<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","u459976464_shop");
$current_date=date('Y-m-d', strtotime(' +1 day'));
$strtotime=strtotime($current_date);
$last_year=strtotime("-1 year",$strtotime);
$ss=date("Y-m-d",$last_year);

$sqlQuery = "SELECT rain,percent FROM demand2 where date ='".$ss."' ORDER BY percent";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
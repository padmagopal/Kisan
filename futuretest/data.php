<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","u459976464_shop");
$current_date=date("Y-m-d");
$strtotime=strtotime($current_date);
$last_year=strtotime("-1 year",$strtotime);
$ss=date("Y-m-d",$last_year);

$lastmonth = date("Y-m-d", strtotime("-30 days"));
 //echo $lastmonth;
//On 2019-08-19, this resulted in 2019-08-12

$strtotimes=strtotime($lastmonth);
$last_years=strtotime("-1 year",$strtotimes);

$sss=date("Y-m-d",$last_years);

$sqlQuery = "SELECT t.item_name, AVG(t.price) as price
FROM demand t
Group by t.item_name
ORDER BY t.date DESC
LIMIT 30";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","u459976464_shop");

$sqlQuery = "SELECT item_name,price FROM demand ORDER BY item_name";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
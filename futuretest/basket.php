<?php
include("db.php");
$cart="select sum(`cost`) as totalcost from `add_cart`";
$cresult=mysqli_query($db,$cart);
$cart_row=mysqli_fetch_assoc($cresult);
//echo($row['totalcost']);

$cart1="select id from `add_cart`";
$c1result=mysqli_query($db,$cart1);
$cart_no=mysqli_num_rows($c1result);
//echo($cart_no);
?>

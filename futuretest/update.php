<?php
echo "hi";

include("db.php");
$query="update order_details set status='".$_POST["se1"]."' where order_id='".$_POST["search"]."' ";
$stat=mysqli_query($db,$query);


?>
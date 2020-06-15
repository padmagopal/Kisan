<?php
//echo phpinfo();
session_start();
include("db.php");

$day=date("Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time=date("h:i:s a");

$hnum=$_POST["hno"];
$street=$_POST["street"];
$area=$_POST["area"];
$lmark=$_POST["lmark"];
$city=$_POST["city"];
$state=$_POST["state"];
$pin=$_POST["pin"];


$mail=$_SESSION["email"];
//echo $mail;
//$q="select count(*) from order_details where email='".$mail."'";
//$s=mysqli_query($db,$q);
//if (!$s)
//{
//	echo "Failed ";
//}
//echo "1";
//$ro=mysqli_fetch_row($s);
//echo $ro[0];
/*while($r1=mysqli_fetch_row($s))
{
    echo "hi";
    $ref1=$r1['ref_id'];
    echo "r1 is".$ref1;
}*/
//echo $ref1;


    //echo "5";
	$query="SELECT * from users where email='".$_SESSION['email']."'";
	$row=mysqli_fetch_array(mysqli_query($db,$query));
	$user_id=$row[1];
	
    //echo $row[6];
	
	    //echo "hi";
		 $product=$_POST['pname'];
		echo $product;
		
		$product_id=$_POST['pid'];
		echo $product_id;
		$quantity=1;//$_SESSION['quantity'][$i+1]
		$rate=$_POST['rate'];
         $queryt="SELECT seller from product_details where product_id='".$product_id."'";
	    echo $queryt;
		 $rowt=mysqli_fetch_array(mysqli_query($db,$queryt));
	     $s_id=$rowt[0];

		$sql="INSERT INTO `order_details`(`date`, `time`, `user_id`,  `product_id`,`hno`,`street`,`area`,`landmark`,`city`,`state`,`pincode`,`email`, `quantity`,`total`,`seller`) VALUES ('".$day."','".$time."','".$user_id."','".$product_id."','".$hnum."','".$street."','".$area."','".$lmark."','".$city."','".$state."','".$pin."','".$_SESSION["email"]."','".$quantity."','".$rate."','".$s_id."')";
		$res=mysqli_query($db,$sql);
		echo $sql;
		if($res==true)
		{
		  	$sql="DELETE from add_cart where user_email='".$_SESSION['email']."'";
		  	$result=mysqli_query($db,$sql);
		  
		  	unset ($_SESSION["quantity"]);
		  	unset ($_SESSION["rate"]);
		    unset ($_SESSION["total"]);

		  	if($result==true)
		  	{ 
				header("Location:my_orders1.php");
		  	}
	  	}
	


?>

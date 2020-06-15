<?php
session_start();
$errors = array();
include("db.php");
//$db=mysqli_connect('mysql.hostinger.in', 'u462049373_bandh', 'a02odxXSeWOH', 'u462049373_bandh');
//echo "login";
if(isset($_POST['login'])){

	$username=mysqli_real_escape_string($db,$_POST['uname']);
	
	$password=mysqli_real_escape_string($db,$_POST['psw']);
	//ensure that form

	if(empty($username)){
		array_push($errors, "username is required");
	}
	
	if(empty($password)){
		array_push($errors, "password is required");
	}


	if(count($errors)==0){
		
	//echo $username ;
		//$password=md5($password);//encrypt password before comparing with that database
		$query="SELECT * FROM users WHERE user_name ='$username' AND user_password='$password'";
		//echo $query;

		$result=mysqli_query($db,$query);
		
		
		if( mysqli_num_rows($result) >0){
			while($row=mysqli_fetch_row($result)){
		  
			
			$_SESSION['username']=$username;
			$_SESSION['referral']=$row[3];
			$_SESSION['user_id']=$row[0];
			
			}
			
			header('location:index.php');//redirect to home page
			
		  
		}
		else{
			array_push($errors,"wrong username/password combination");
		}
	}
	//test
	

	//test
}
//place order
if(isset($_GET['place_order'])){
	$amount=1000;
	$referral=$_SESSION['referral'];
	//insert into order details
	 date_default_timezone_set('Asia/Calcutta');
$time=date('h:i:s A');
$date=date("Y-m-d");
	$sql="INSERT INTO `order_details`( `date`, `time`, `product_id`, `address`, `quantity`,`user_id`,`ref_id`) VALUES ('".$date."
	','".$time."',1,'hyderabad',1,'".$_SESSION['user_id']."','".$_SESSION['referral']."')";
	//echo $sql;
	$query=mysqli_query($db,$sql);
//amount wise commision
	$sqls="SELECT SUM(a.product_price*b.quantity) FROM `product_details` a JOIN order_details b ON b.product_id=a.product_id WHERE `ref_id`='".$_SESSION['referral']."'";

	$querys=mysqli_query($db,$sqls);
	while($row=mysqli_fetch_row($querys)){
		//echo $sql;
		$amount=$row[0];
		//echo $amount;
		$sql1="SELECT * FROM `amount_wise_commision` ";
		$query1=mysqli_query($db,$sql1);
		$commission=0;
		$tds=1;
		$commission_amount=0;
		//echo $amount;
		while($row1=mysqli_fetch_row($query1)){
			if($amount>=$row1[3]){

				$commission=$row1[4];
				//
				$tds=$row1[6];


			}

		}
		if($commission<=0){
			$commission_amount=0;
		}
		else{
			//echo $commission;
		$commission_amount=((100-$tds)/100)*$commission;
	}
	//echo $commission_amount;
				//insert commission amount in commission details table
			//insert commission amount in commission details table
		$sql="SELECT * FROM `commission_details` WHERE `ref_id`='".$_SESSION['referral']."' AND `type`='amount_wise'";
		$query=mysqli_query($db,$sql);
		$num_rows=mysqli_num_rows($query);
		if($num_rows>0){
			$s="DELETE FROM `commission_details` WHERE `ref_id`='".$_SESSION['referral']."' AND `type`='amount_wise'";
			$result=mysqli_query($db,$s);
			$s="INSERT INTO `commission_details`( `date`, `time`, `ref_id`, `commission_amount`,`type`) VALUES ('".$date."','".$time."','".$_SESSION['referral']."','".$commission_amount."','amount_wise')";
		$x=mysqli_query($db,$s);
		}
		else{
		$s="INSERT INTO `commission_details`( `date`, `time`, `ref_id`, `commission_amount`,`type`) VALUES ('".$date."','".$time."','".$_SESSION['referral']."','".$commission_amount."','amount_wise')";
		$x=mysqli_query($db,$s);
	}



	}
	


	//member wise commision
	//member wise commision
	$sqls="SELECT COUNT(*) FROM `users` WHERE `referral`='".$_SESSION['referral']."'";
//echo $sql;
	$querys=mysqli_query($db,$sqls);
	while($row=mysqli_fetch_row($querys)){
		$members=$row[0];
		$sql1="SELECT * FROM `member_wise_commission` ";
		//echo $sql1;
		$query1=mysqli_query($db,$sql1);
		$commission=0;
		$tds=1;
		$commission_amount=0;
		while($row1=mysqli_fetch_row($query1)){
			if($members>=$row1[3]){
				$commision=$row1[4];
				$tds=$row1[6];


			}
		}
		if($commission<=0){
			$commission_amount=0;
		}
		else{
		$commission_amount=((100-$tds)/$commission)*100;
	}
				//insert commission amount in commission details table
		$sql="SELECT * FROM `commission_details` WHERE `ref_id`='".$_SESSION['referral']."' AND `type`='member_wise'";
		$query=mysqli_query($db,$sql);
		$num_rows=mysqli_num_rows($query);
		if($num_rows>0){
			$s="DELETE FROM `commission_details` WHERE `ref_id`='".$_SESSION['referral']."' AND `type`='member_wise'";
			$result=mysqli_query($db,$s);
			$s="INSERT INTO `commission_details`( `date`, `time`, `ref_id`, `commission_amount`,`type`) VALUES ('".$date."','".$time."','".$_SESSION['referral']."','".$commission_amount."','member_wise')";
		$r=mysqli_query($db,$s);
		}
		else{
		$s="INSERT INTO `commission_details`( `date`, `time`, `ref_id`, `commission_amount`,`type`) VALUES ('".$date."','".$time."','".$_SESSION['referral']."','".$commission_amount."','member_wise')";
		$r=mysqli_query($db,$s);
	}
	}

}


if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['bill']);
	header('location: ../login/index.php');
}

?>
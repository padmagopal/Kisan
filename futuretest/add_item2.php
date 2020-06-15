<?php

include("db.php");


$allow = array("jpg", "jpeg", "gif", "png");

$todir = 'img/';

if ( !!$_FILES['image']['tmp_name'] ) // is the file uploaded yet?
{
    $info = explode('.', strtolower( $_FILES['image']['name']) ); // whats the extension of the file

    if ( in_array( end($info), $allow) ) // is this file allowed
    {
        if ( move_uploaded_file( $_FILES['image']['tmp_name'], $todir . basename($_FILES['image']['name'] ) ) )
        { echo $_POST['puser']."cvbnm,.s";
         $sql="INSERT INTO `product_details`(`product_name`, `product_price`, `product_image`, `product_quant`, `product_category`, `product type`,`seller`) VALUES ('".$_POST['item']."','".$_POST['amount']."','".basename($_FILES['image']['name'] )."','".$_POST['quantity']."','".$_POST['category']."','".$_POST['rating']."','".$_POST['puser']."')";
         	echo $sql;
         $result=mysqli_query($db,$sql);
         if($result==true){
           header("location:item2.php");
         }
         else{
         	header("location:item2.php?msg=failed");
         }
        }
    }
    else
    {
        // error this file ext is not allowed
    }
}
?>

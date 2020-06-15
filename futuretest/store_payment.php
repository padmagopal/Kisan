<?php
session_start();
$_SESSION['total']=$_POST['total'];
$_SESSION['product_name']=$_POST['arr'];
$_SESSION['quantity']=$_POST['arr1'];
$_SESSION['rate']=$_POST['arr2'];
?>
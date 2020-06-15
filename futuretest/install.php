<?php
$conn= mysqli_connect('localhost', 'root', '','u459976464_shop');
$title=$_POST['title'];
$news=$_POST['news'];
$query="INSERT INTO `blog` (`title`,`news`) VALUES ('".$title."','".$news."')";
echo $query;
$status=mysqli_query($conn,$query);
	echo "<script>if(confirm('uploaded sucessfullt . Now Login')){document.location.href='blog.php'};</script>";
?>
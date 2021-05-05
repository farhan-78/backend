<?php

$con = mysqli_connect('localhost','root',);
if($con){
	echo "Connection success";
}else{
	echo "connection failed";
}

mysqli_select_db($con,'alamuserdata');

$user = $_POST['user'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$komentar = $_POST['komentar'];

$query = " insert into userinfodata (user,email,mob,komentar) 
values ('$user','$email','$mob','$komentar')";

echo "$query";

mysqli_query($con,$query);

header('location:index.php');

?>
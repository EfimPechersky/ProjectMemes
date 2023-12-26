<?php
$uselog=$_GET["login"];
$usepass=$_GET["pass"];
$con = mysqli_connect('localhost','root','root');
mysqli_select_db($con,"project");
$sql = "SELECT * FROM Users WHERE login = '".$uselog."'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
if (password_verify($usepass,$row['password'])){
	echo $row['id'];
}else{
	echo '-1';
}
?>
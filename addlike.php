<?php
$postid=$_POST['postid'];
$userid=$_POST['userid'];
$db= new PDO("mysql:dbname=project;host=localhost","root","root");
$con = mysqli_connect('localhost','root','root');
mysqli_select_db($con,"project");
$sql = "SELECT * FROM memes WHERE id='".$postid."'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$likes=$row['wholiked']." ".$userid;
$likes=trim($likes," ");
$inslike="UPDATE memes SET wholiked = '".$likes."' WHERE id = '".$postid."'";
$db->prepare($inslike)->execute();
?>
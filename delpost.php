<?php
$postid=$_POST['postid'];
$db= new PDO("mysql:dbname=project;host=localhost","root","root");
$del="DELETE FROM memes WHERE id='".$postid."'";
$db->prepare($del)->execute();
?>
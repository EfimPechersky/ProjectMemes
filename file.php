<?php

$uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$name=$_POST["username"];
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $db= new PDO("mysql:dbname=project;host=localhost","root","root");
    $con = mysqli_connect('localhost','root','root');
    mysqli_select_db($con,"project");
    $zap = mysqli_query($con,'select count(*) FROM memes;') or die();
    $count = mysqli_fetch_row($zap);
    $sql = "insert into memes (id,author,image,wholiked) values (" . $count[0] . ",\"" . $name . "\",\"" . basename($_FILES['userfile']['name']) . "\",\"\");";
    $db->prepare($sql)->execute();
    $out = "Succes.\n";
} else {
    $out = "Fail!\n";
}

echo $out;

?>
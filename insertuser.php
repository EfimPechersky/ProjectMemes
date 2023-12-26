<?php
$newlog=$_GET['login'];
$newpass=$_GET['pass'];
$hashpass=password_hash($newpass,PASSWORD_DEFAULT);
$con = mysqli_connect('localhost','root','root');
mysqli_select_db($con,"project");
$res = mysqli_query($con,'select count(*) FROM Users WHERE login = "'.$newlog.'"') or die();
$row = mysqli_fetch_row($res);
if ($row[0] > 0)
{
    echo "err";
}
else
{
    $zap = mysqli_query($con,'select count(*) FROM Users') or die();
    $count = mysqli_fetch_row($zap);

    $sql = "INSERT INTO Users (id,login,password) VALUES ('".$count[0]."','".$newlog."','".$hashpass."')";
    mysqli_query($con,$sql);

}
?>
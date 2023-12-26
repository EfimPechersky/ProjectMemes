<?php
$postid=$_POST['postid'];
$userid=$_POST['userid'];
$db= new PDO("mysql:dbname=project;host=localhost","root","root");
$con = mysqli_connect('localhost','root','root');
mysqli_select_db($con,"project");
$sql = "SELECT * FROM memes WHERE id='".$postid."'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$likes=$row['wholiked'];
$arrlikes=explode(" ",$likes);
$newlikes="";
foreach ($arrlikes as &$elem) {
    if ($elem!=$userid){
        $newlikes=$newlikes." ".$elem;
    }
}
$newlikes=trim($newlikes," ");
$inslike="UPDATE memes SET wholiked = '".$newlikes."' WHERE id = '".$postid."'";
$db->prepare($inslike)->execute();
?>
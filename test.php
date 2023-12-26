<?php
$con = mysqli_connect('localhost','root','root');
mysqli_select_db($con,"project");
$result=mysqli_query($con,"SELECT * FROM memes");
while ($row = mysqli_fetch_array($result)){
	echo $row['id']." ";
  	echo $row['author']." ";
  	echo $row['image']." ";
        echo $row['wholiked'].", ";
}
?>
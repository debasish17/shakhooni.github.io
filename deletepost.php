<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','test');
$sql="delete from blog where id=$id";
$result=mysqli_query($conn,$sql);
}
header('Location:blog.php'); 
?>
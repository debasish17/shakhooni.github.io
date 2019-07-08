<?php
session_start();
	$conn=mysqli_connect('localhost','root','','test');
	if(isset($_GET['title']) && isset($_GET['body'])){
	$title=$_GET['title'];
	$body=$_GET['body'];
	$uid=$_SESSION['login'];
	$sql2="insert into blog(uid,title,body) values('$uid','$title','$body')";
	$result=mysqli_query($conn,$sql2);
	if($result){
			echo 'blog created successfully';
	}
	else{
		echo 'Some error occured '.mysqli_error($conn);
	}
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Blog | Blog</title>
	<link rel="stylesheet" type="text/css" href="CSS/blog.css">
	<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  background: rgb(74,182,72);
  color: white;

  margin-left: 5%;
  margin-right: 5%;
  margin-top: 2%;
  margin-bottom: 2%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>
	<?php 
	 $page=2;
	include 'header.php' ?>
<?php if(isset($_SESSION['login'])){ ?>
 <div class="page-content" >
 	<br><br>
 	<p></p>
 	<form action="blog.php">
 		<h2>Create your blog</h2>
 	<textarea name="title"placeholder="Enter your title here" >title</textarea>
 	<textarea name="body"placeholder="What's on your mind" >body</textarea> 
 	<input type="submit" name="post"value="Post">
 </form>
 </div>
<?php } ?>
 <div style="margin-top:100px;">
 	<?php
 	$sql='SELECT users.NAME,blog.title,blog.body,blog.timestamp from users,blog WHERE blog.uid=users.ID';
 	$result=mysqli_query($conn,$sql);
 	while($row=mysqli_fetch_assoc($result)){

 		?>
 <div class="card">
    <div class="container">
    <h4><b><?php echo $row['title']?></b></h4>
    <p>posted by <?php echo $row['NAME']?></p> 
    <p><?php echo $row['body']?></p> 
    <p><?php echo $row['timestamp']?></p>
  </div>
</div>
<?php } ?>
</div>
</body>
</html>
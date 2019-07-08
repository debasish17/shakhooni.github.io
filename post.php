<?php
		session_start();	
		$message='';
		$conn=mysqli_connect('localhost','root','','test');
		if(isset($_GET['title']) && isset($_GET['body'])){
			$title=$_GET['title'];
			$body=$_GET['body'];
			$uid=$_SESSION['login'];
			$sql="insert into blog(uid,title,body) values('$uid','$title','$body')";
			$result=mysqli_query($conn,$sql);
			if($result){
				$message='<span style="color:red;">inserted successfully</span>';
			}else{
				$message='<span style="color:red;">inserted unsuccessfully'.mysqli_error($conn).'</span>';
			}
			}
		
		?>
		<!DOCTYPE html>
<html>
<head>
	<title>MyBlog | Blog</title>
	<link rel="stylesheet" type="text/css" href="CSS/blog.css">
	<style>
		a
		{
			text-decoration: none;
		}
		.card {
		  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		  transition: 0.3s;
		  width: 90%;
		  margin-left: 5%;
		  margin-right: 5%;
		  margin-bottom: 2%;
		  background-image: linear-gradient(white,grey);
		}
		.container {
		  padding: 2px 16px;
		}
	</style>
</head>
<body>
	<?php 
	$page=2;
	include 'header.php'; ?>

	<?php if(isset($_SESSION['login'])){ ?>
		<div style="margin-top:100px;">
		<?php 
			$uid=$_SESSION['login'];
			$sql="SELECT blog.id,users.NAME,blog.title,blog.body,blog.timestamp from users,blog WHERE blog.uid=$uid and users.ID=$uid";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
		 ?>
		<div class="card" >
		  <div class="container">
		    <h4><b><?php echo $row['title']; ?></b></h4> 
		    <p>posted by <?php echo $row['NAME']; ?></p>
		    <p><?php echo $row['body']; ?></p>
		    <p><?php echo $row['timestamp']; ?></p> 
		    <a href="deletepost.php?id=<?php echo $row['id'];?>">Delete</a>
		  </div>
		</div>
		<?php } 
		}
	?>

	</div>


</body>
</html>
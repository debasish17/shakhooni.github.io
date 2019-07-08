	<?php
	session_start();

	if(isset($_SESSION['login'])){
	$id=$_SESSION['login'];
		//photo upload start
	if(isset($_POST['upload'])){
		$fileName=$_FILES['DP']['name'];
	      if(move_uploaded_file($_FILES['DP']['tmp_name'], 'uploads/'.$fileName)){
		$conn=mysqli_connect('localhost','root','','test');
        $sql1="update users set dp='$fileName'where id=$id";
        $result=mysqli_query($conn,$sql1);
        if($result){
        	echo'Success';
        }else{
        	echo 'fail';
        }
	} else
	{
		echo 'fail';
	}

      
}

	$conn=mysqli_connect('localhost','root','','test');
	$sql="Select NAME,EMAIL,NUMBER,GENDER,BIO,DP from users where ID='$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$name=$row['NAME'];
	$email=$row['EMAIL'];
	$number=$row['NUMBER'];
	$gender=$row['GENDER'];
	$bio=$row['BIO'];
	$dp=$row['DP'];

	?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>Profile Page</title>
		<link rel="stylesheet" type="text/css" href="CSS/profile.css"> 
	</head>
	<body>
		
		<div>
		<div class='card' >
			<img src="uploads/<?php echo $dp; ?>"style="width=100%">
			<form action="profile.php" method="post" enctype="multipart/form-data">
			<input type="file" name="DP">
			<input type="submit" name="upload">
		    </form>
			<h2><b><?php echo $name; ?></b></h2>
			<h2><b><?php echo $email; ?></b></h2>
			<h2><b><?php echo $number; ?></b></h2>
			<h2><b><?php echo $gender; ?></b></h2>
			<h2><b>Bio</b></h2>
			<i><?php echo $bio; ?></i>		</div>
			<br>
			<center> <a href="blog.php"><input type="button" value="Go back to Blog"></a><br>
				<p></p>
				<a href="post.php"><input type="button" value="View my posts"></a> 
				<a href="logout.php"><input type="button" value="Log Out"></a>
			</center>
	</div>


 <?php  } //else{
// 			header('Location:login.php');
//               }

?>
	</body>
	</html>

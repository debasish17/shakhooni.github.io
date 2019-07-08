<?php
	$conn=mysqli_connect('localhost','root','','test');
	if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['number']) && isset($_GET['gender'])&& isset($_GET['bio']) && isset($_GET['pass'])){
	$name=$_GET['name'];
	$email=$_GET['email'];
	$number=$_GET['number'];
	$gender=$_GET['gender'];
	$bio=$_GET['bio'];
	$pass=$_GET['pass'];

	$sql="insert into users(NAME,EMAIL,NUMBER,GENDER,BIO,PASS) values('$name','$email','$number','$gender','$bio','$pass')";
	$result=mysqli_query($conn,$sql);
	if($result){
			echo 'users inserted successfully';
	}
	else{
		echo 'Some error occured';
	}
	}

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Signup Form</title>
		<link rel="stylesheet" href="CSS/signup.css">
	</head>
	<body>
		<div class="signupBox">
			

			
			<h1>SIGN UP </h1>
			<form action="signup.php" id="form">
				<p>Name:-</p>
				<input type="text" placeholder="Enter name" name="name" id="nameText">
				<span id="nameError" style="color: red;display: none;margin-left: 5px">Name must not empty</span><br>
				<p>Email-ID:-</p>
				<input type="text" name="email" placeholder="Enter Email" id="userText">
				<span id="userError" style="color: red; display: none; margin-left: 5px">Email id must not empty</span><br>
				<p>Phone No:-</p>
				<input type="number" placeholder="Enter number" name="number" id="numText">
				<span id="numError" style="color: red; display: none; margin-left: 5px">Number must not empty</span><br>
				<p>Gender:- </p><br><br><input type="text"  name="gender" id="genText">
				<span id="genError" style="color: red;display: none;margin-left: 5px"></span><br>
				<p>Bio:-</p><br>
				<input type="text" name="bio" id="bioText">
				<span id="bioError" style="color: red;display:none;margin-left: 5px"></span><br>	
				<p id="ai">Password:-</p>
				<input type="password" name="pass" placeholder="••••••" id="passText"></p>
				<span id="passError" style="color: red;display: none;margin-left: 5px">Password must not empty</span><br>
				<p>Confirm Password:-</p>
				<input type="password" name="pass1" placeholder="••••••" id="pass1Text">
				<span id="pass1Error" style="color: red;display: none;margin-left: 5px">Password does not match</span>

				<input type="submit" name="insert" value="Sign Up">
				
			</form>
		</div>
		<script type="text/javascript" src="JS/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('#form').submit(function()
			{
				if($('#nameText').val()=='')
				{
					$('#nameError').show();
					$('#nameText').focus();
					return false;
				}
				nameError.style.display='none';
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				if(reg.test($('#userText').val())== false)
				{
					userError.innerHTML='invalid Email';
					$('#userError').show();
					$('#userText').focus();
					return false;
				}
				userError.style.display='none';
				if($('#numText').val()=='')
				{
					$('#numError').show();
					$('#numText').focus();
					return false;
				}
				numError.style.display='none';
				var pho=/^\d{10}$/;
				if(pho.test($('#numText').val())==false)
				{
					numError.innerHTML='invalid Phone number';
					$('#numError').show();
					$('#numText').focus();
					return false;
				}
				numError.style.display='none';
				if($('#passText').val()=='')
				{
					$('#passError').show();
					$('#passText').focus();
					return false;
				}

				passError.style.display='none';
				if($('#passText').val().length<9){
					$('#passError').html('Password must not be less then 8');
					$('#passError').show();
					$('#passText').focus();
					return false;
				}
				if($('#passText').val()!==$('#pass1Text').val())
				{

					
					$('#pass1Error').show();
					$('#pass1Text').focus();
					return false;
				}
				pass1Error.style.display='none';
				return true;
			});
	});
	</script>

			
	</body>
</html>

<?php
	$conn=mysqli_connect('localhost','root','','test');
		$result=mysqli_query($conn,'select * from users');
		?>
		-
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Forgot Form</title>
		<link rel="stylesheet" href="CSS/forgot.css">
	</head>
	<body>
		<center>
		<div class="forgotBox">
			
			<h2>FORGOT PASSWORD?</h2>
			<form action="forgot.php" >
				<p>Please enter your email address and get an instruction on how to reset your Password</p>
				<input type="email" placeholder="Enter Email-id" name="" id="userText">
				<span id="userError" style="color: red; display: none; margin-left: 5px">Email id must not empty</span>
				<input type="submit" name="" value="Send Verification Link">
				
			</form>
				<script type="text/javascript" src="JS/jquery.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function(){
		$('form').submit(function(){
		if($('#userText').val()==''){
		$('#userError').show();
		$('#userText').focus();
		$('#userText').addClass('error');
		return false;
	}
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			      if (reg.test($('#userText').val()) == false)
			      {
			      	alert('Invalid Email Address');
				return false;
	}
	
	return true;
});
});
</script>
		</div>
	</center>
	
		</script>
	
	</body>
</html>

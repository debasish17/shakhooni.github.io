<?php
session_start();
if(isset($_SESSION['login']) ){
	header('Location:blog.php');
}

if(isset($_GET['user'])&& isset($_GET['pass'])){
	$conn=mysqli_connect('localhost','root','','test');
	$user=$_GET['user'];
	$pass=$_GET['pass'];
	$sql="Select ID from users where EMAIL='$user' and PASS='$pass'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_assoc($result);
	    $id=$row['ID'];
	    $_SESSION['login']=$id;
	 
		header('Location:blog.php');
	}
	
	else  {
			echo" Login unsuccessful ";
		}	
}
?>
<html>
<head>
    <title> Login Form </title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">   
</head>
    <body>
    <div class="login-box">
        <h1>Login Here</h1>
            <form action="login.php" onsubmit="return validate();">
            <p>Email</p>
            <input id="userText" type="text" name="user" placeholder="Enter Email">
            <span  id="userError"style="color:red;margin-left:10px;display:none;">Username must not be empty</span>
            <p>Password</p>
            <input id="passText" type="password" name="pass" placeholder="Enter Password">
            <span  id="passError"style="color:red;margin-left:10px;display: none;">Password must not be empty</span>
            <input type="submit" name="submit" value="Login">
            <a href="forgot.php">Forgot Password</a><br><br>
            <a href="signup.php">Create a new account</a>    
            </form>
        
        
        </div>
        <script type="text/javascript" src="JS/jquery.js"></script>
        <script type="text/javascript">
         $(document).ready(function(){
        $('form').submit(function(){
        if($('#userText').val()=='')
        {
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
                if($('#passText').val()=='')
                {
                    $('#passError').show();
                    $('#passText').focus();
                    alert('Password Cannot be Empty');
                    return false;
                }

				if($('#passText').val().length<9){
					$('#passError').html('Password must not be less then 8');
					$('#passError').show();
					$('#passText').focus();
					return false;
				}
                passError.style.display='none';
    return true;
});
});
        </script> 
    
    </body>
</html>
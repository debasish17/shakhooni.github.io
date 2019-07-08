 <ul>
 	<?php
 	?>
 	<li class='title'><a href="index.php">My Blog</a></li>
 	<?php
 	if(isset($_SESSION['login'])){?> 	
 	<li class="button" ><a href="profile.php"> Profile</a></li>	
 	<?php }else{ ?> 	
    <li class="button" ><a href="login.php"> Log In</a></li>
 <?php	} ?>
 	<li><a href=" contact.php" <?php if($page==3) echo "class='active'"; ?>>Contact Us</a> </li>
 	<li><a href="blog.php" <?php if($page==2) echo "class='active'";?> >Blog</a></li>
 	<li><a href="index.php" <?php if($page==1) echo "class='active'"; ?> >Home</a></li>
 </ul>

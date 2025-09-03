<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style-admin.css">
</head>
<body>
     <form action="login-users.php" method="post">
     	<h2>تعاونی سایپا آذربایجان</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	
     	<input type="" name="uname" placeholder="نام کاربری"><br>

     	
     	<input  type="" name="password" placeholder="رمز عبور"><br>


     	

     	<button type="submit">ورود</button>
     </form>
</body>
</html>
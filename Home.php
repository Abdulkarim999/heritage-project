<?php
include 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style1.css">
	
	<title>Login</title>
</head>
<body>
	
	<?php
	echo  date('d/m/Y');
	
	?>
	<h2>HERITAGE ENGLISH MEDIUM SCHOOL</h2>
	<div class="container">
	<h1>LOGIN</h1>
	<?php if (isset($error)): ?>
		<p style="color: red;"><?php echo $error; ?></p>
	<?php endif; ?>
	<div class="login"></div>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	   <label for="username">Username:</label>
	   <input type="text" id="username" name="username" placeholder="Enter your username" required><br>
	   <label for="password">Password:</label>
	   <input type="password" id="password" name="password" placeholder="Enter your Password" required><br>
        <button type="submit">Login</button>
	</form>
	</div>
	</div>
</body>
</html>
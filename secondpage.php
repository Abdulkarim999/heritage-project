<?php
include 'db_config.php';
include 'insertname.php';
		
//fetch data from the database
try {
	$stmt = $pdo->query("SELECT id,name FROM students");
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
	  die("Error fetching data: " . $e->getMessage());
	}
				
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="secondpage.css">
	<title>Academic office</title>
</head>

<body>
	<h1>WELCOME TO ACADEMIC OFFICE</h1>
	<h2>Names Registered</h2>
	<div class="container">
		
		<?php foreach($rows as $row): ?>
			<div class = "card">
				<h2><?php echo $row['name']; ?></h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				  <input type="=hidden" name="name" value="<?php echo $row['name']; ?>">
				   <button type="submit" name="transfer" class="btn">Transfer</button>
				    <button><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></button>
				  
				</form>
				
			</div>	
		<?php endforeach; ?>
		</div>	
</body>
</html>
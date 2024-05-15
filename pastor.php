<?php
include 'db_config.php';
			//fetch data from the database
			try {
				$stmt = $pdo->query("SELECT name FROM academic");
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
	<title>Pastor</title>
</head>
<body>
	<style>
	body{
		background-color:azure;
	}
	.container{
		display:flex;
		flex-wrap:wrap;
		align-items:center;
		justify-content: center;
	}
	.card{
		border: 1px solid #ccc;
		padding:10px;
		background: #fff;
		transition: box-shadow 0.5s ease;
        border-radius: 10px;
		display:flex;
		flex-direction:column;
		justify-content:space-between;
		margin:10px;
		width:calc(20% - 20px);
		overflow: hidden;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25),
            0 10px 10px   rgba(0,0,0,0.22)
		
		
	}
	.card:hover{
		box-shadow: 0 0 10px rgba(0,0,0,1.5);
		transform: translateY(-5px);
	}
	.btn{
		background-color: #4CAF50;
		border:none;
		color:white;
		padding:10px 20px;
		text-align:center;
		text-decoration:none;
		display:inline-block;
		font-size: 20px;
		cursor: pointer;
		border-radius: 10px;
		margin:auto;
		transition: transform 0.5 ease;
		
	}
	.btn:hover{
		transform: translateY(-5px);
	}
	h1{
		font-size: 40px;
			font-weight: bold;
			text-align:center;
	}
	h2{
			font-size: 30px;
			font-weight: bold;
			text-align:center;
			
		}
		input{
			 background: #eee;
          padding: 12px 15px;
         margin: 8px 15px;
        width: 50%;
        border-radius: 5px;
        border: none;
        outline: none;
		align-items:center;
		margin:auto;
		justify-content:center;
		}
</style>
	<h1>welcome to pastor department</h1>
	<div class="container">
	
		<?php foreach($rows as $row): ?>
			<div class = "card">
				<h2><?php echo $row['name']; ?></h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				  <input type="=text" name="name" value="<?php echo $row['name']; ?>">
				  <input type="text" name="amount" id="amount" placeholder="enter amount">
				   <button type="submit" name="transfer" class="btn">Transfer</button>
				   
				</form>
			</div>	
		<?php endforeach; ?>
		</div>
	
	
</body>
</html>
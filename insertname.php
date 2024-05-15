<?php
			$name ="";
          if($_SERVER["REQUEST_METHOD"] =="POST") {
	       $name = $_POST["name"];
		    }
			try {
		//create pdo instance
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("INSERT INTO academic (name) VALUES (:name)");

				$stmt->bindParam(':name',$name);
				$stmt->execute();
				//redirect to reflesh the page
	          
		} catch (PDOException $e) {
			      echo "Error:" . $e->getMessage();
			}


?>
<?php
$host = "localhost";
$dbname = "registration";
$username = "root";
$password = "";
				
try{
//create pdo instance
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
			      echo "Error:" . $e->getMessage();
			}


?>
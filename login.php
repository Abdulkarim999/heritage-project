<?php
if($_SERVER["REQUEST_METHOD"] =="POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	//validate credentials
	if(($username === "teacher1" && $password === "12345")){
		//redirect first teacher to its page
		header("location:registration.php");
		exit();
	} elseif (($username === "teacher2" && $password === "123456")) {
		header("location:secondpage.php");
		exit();
	}elseif (($username === "teacher3" && $password === "1234567")) {
		header("location:pastor.php");
		exit();
	} else {
         $error = "invalid username or password.";
	}
}
?>
<?php
//start session
session_start();
include 'db_config.php';
//initiate variables
$name = $class = $age = $number ="";
$success_message =$error_message= "";

if($_SERVER["REQUEST_METHOD"] =="POST") {
	$name = $_POST["name"];
	$class = $_POST["class"];
	$age = $_POST["age"];
	$number = $_POST["number"];

	//validate form data
	if (empty($name) || (empty($class) || (empty($age) || (empty($number))))) {
		$error_message = "Please fill in all fields.";
	}elseif (!is_numeric($class) || !is_numeric($age)){
		$error_message = "Class and Age must be numeric";
	}elseif (strlen($number) !=10 || !ctype_digit($number)) {
		$error_message = "Phone number must be 10 digits long and numeric";
	}else {

				$stmt = $pdo->prepare("INSERT INTO students (name,class,age,number) VALUES (:name,:class,:age,:number)");
				$stmt->bindParam(':name',$name);
				$stmt->bindParam(':class',$class);
				$stmt->bindParam(':age',$age);
				$stmt->bindParam(':number',$number);
				$stmt->execute();

				
	            $_SESSION['success_message'] = "Data sent  successfully";
				//redirect to reflesh the page
	           header("location: ".$_SERVER['PHP_SELF']);
	           exit();
		
		}
}

//check if success message session variable is set and not empty
if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) {
	//set success message and then clear the session variable
	$success_message = $_SESSION['success_message'];
	unset($_SESSION['success_message']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>registration</title>
	
</head>
<body>
	<h2>HERITAGE ENGLISH MEDIUM SCHOOL</h2>
	<div class="container">
	<h1>welcome for Registration</h1>
	<?php if (!empty($success_message)) :?> 
			 <p style="color: green;"><?php echo $success_message; ?></p>
	
	<?php endif; ?>
	<?php if (!empty($error_message)) :?> 
			 <p style="color: red;"><?php echo $error_message; ?></p>
	
	<?php endif; ?>
      <div class="signup">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	   <div class="sign">
	   <label for="name">Name:</label>
	   <input type="text" id="name" name="name" placeholder="Enter the Name" required><br>
	   <label for="class">Class:</label>
	   <input type="text" id="class" name="class" placeholder="Enter the class" required><br>
	   <label for="age">Age:</label>
	   <input type="text" id="age" name="age" placeholder="Enter the age" required><br>
	  <label for="number">Phone number:</label>
	   <input type="text" id="number" name="number" placeholder="Enter the phone number" required><br>
	   </div>
        <button type="submit">Submit</button >
		
	</form>
	</div>
	</div>
</body>
</html>
<?php
// Include the database connection file
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");

        // Bind parameters
        $stmt->bindParam(':id', $id);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect back to secondpage.php after successful deletion
            header("Location: secondpage.php");
            exit();
        } else {
            echo "Error deleting record";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$pdo = null;
?>

?>
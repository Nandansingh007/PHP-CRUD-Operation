
<?php
$host = "localhost";
$port = 3307;                       // Use the custom port number
$dbName = "company_db";
$username = "root";                 // Use your MySQL root username  

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbName", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the connection was successful
    if ($conn) {
        echo "Connected to the database successfully!";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

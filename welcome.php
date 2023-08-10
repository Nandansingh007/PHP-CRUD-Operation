<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome</h2>
    <p>You are now logged in.</p>
    <a href="./Employee/employee.html">Employee Page</a><br>
    <a href="./company/company.html">Company Page</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>

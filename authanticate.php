<?php
session_start();

$validUsername = "nandan";
$validPassword = "singh";

if ($_POST['username'] === $validUsername && $_POST['password'] === $validPassword) {
    $_SESSION['authenticated'] = true;
    header("Location: welcome.php"); // Redirect to the welcome page after successful login
} else {
    echo "Invalid username or password. <a href='login.php'>Go back to login</a>";
}
?>

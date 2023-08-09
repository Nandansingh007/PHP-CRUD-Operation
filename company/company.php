<?php
include ("../db.php"); // Include the database connection

// Create a new company
if (isset($_POST['create'])) {
    $companyName = $_POST['companyName'];
    $address = $_POST['address'];

    $sql = "INSERT INTO company (CompanyName, Address) VALUES (?, ?)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$companyName, $address]);
        echo "New company added successfully.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Search companies by name
if (isset($_GET['search'])) {
    $searchName = $_GET['searchName'];

    $sql = "SELECT * FROM company WHERE CompanyName LIKE ?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(["%$searchName%"]);

        if ($stmt->rowCount() > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Company Name</th><th>Address</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['Id'] . "</td>";
                echo "<td>" . $row['CompanyName'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No companies found.";
        }
    } catch(PDOException $e) {
        echo "Error searching companies: " . $e->getMessage();
    }
}

// Update a company
if (isset($_POST['update'])) {
    $companyId = $_POST['companyId'];
    $newCompanyName = $_POST['newCompanyName'];
    $newAddress = $_POST['newAddress'];

    $sql = "UPDATE company SET CompanyName=?, Address=? WHERE Id=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newCompanyName, $newAddress, $companyId]);
        echo "Company updated successfully.";
    } catch(PDOException $e) {
        echo "Error updating company: " . $e->getMessage();
    }
}

// Delete a company
if (isset($_GET['delete'])) {
    $companyId = $_GET['deleteCompanyId'];

    $sql = "DELETE FROM company WHERE Id=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$companyId]);
        echo "Company deleted successfully.";
    } catch(PDOException $e) {
        echo "Error deleting company: " . $e->getMessage();
    }

}
?>

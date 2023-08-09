<?php
include ("../db.php"); // Include the database connection

// Create a new employee
if (isset($_POST['create'])) {
    $employeeName = $_POST['employeeName'];
    $salary = $_POST['salary'];
    $dob = $_POST['dob'];
    $companyId = $_POST['companyId'];

    $sql = "INSERT INTO Employee (Name, Salary, DateOfBirth, Company) VALUES (?, ?, ?, ?)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$employeeName, $salary, $dob, $companyId]);
        echo "New employee created successfully.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Search employees by name
if (isset($_GET['search'])) {
    $searchName = $_GET['searchName'];

    $sql = "SELECT * FROM Employee WHERE Name LIKE ?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(["%$searchName%"]);

        if ($stmt->rowCount() > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Employee Name</th><th>Salary</th><th>Date of Birth</th><th>Company</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['Id'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Salary'] . "</td>";
                echo "<td>" . $row['DateOfBirth'] . "</td>";
                echo "<td>" . $row['Company'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No employees found.";
        }
    } catch(PDOException $e) {
        echo "Error searching employees: " . $e->getMessage();
    }
}

// Update an employee
if (isset($_POST['update'])) {
    $employeeId = $_POST['employeeId'];
    $newEmployeeName = $_POST['newEmployeeName'];
    $newSalary = $_POST['newSalary'];
    $newDOB = $_POST['newDOB'];
    $newCompanyId = $_POST['newCompanyId'];

    $sql = "UPDATE Employee SET Name=?, Salary=?, DateOfBirth=?, Company=? WHERE Id=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newEmployeeName, $newSalary, $newDOB, $newCompanyId, $employeeId]);
        echo "Employee updated successfully.";
    } catch(PDOException $e) {
        echo "Error updating employee: " . $e->getMessage();
    }
}

// Delete an employee
if (isset($_GET['delete'])) {
    $deleteEmployeeId = $_GET['deleteEmployeeId'];

    $sql = "DELETE FROM Employee WHERE Id=?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$deleteEmployeeId]);
        echo "Employee deleted successfully.";
    } catch(PDOException $e) {
        echo "Error deleting employee: " . $e->getMessage();
    }
}

?>

function validateCreateEmployeeForm() {
    var salaryInput = document.getElementsByName("salary")[0];
    var salary = parseFloat(salaryInput.value);
    var salaryError = document.getElementById("salaryError");

    // Check if salary is within the valid range
    if (salary < 10000 || salary > 50000) {
        salaryError.textContent = "Salary should be between 10,000 and 50,000";
        return false; // Prevent form submission
    } else {
        salaryError.textContent = ""; // Clear error message
    }

    
}

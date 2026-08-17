<?php

session_start();

// Check if the session role is set and is either 'employee' or 'user'
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'employee' && $_SESSION['role'] !== 'user')) {
    // Redirect to login.html if the role is not 'employee' or 'user'
    header('Location: login.html');
    exit();
}

include('config.php');

// Create connection with error handling
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Handle POST request to add data (for adding employee)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['employeeName']) && isset($_POST['employeeUsername']) && isset($_POST['employeePassword'])) {
            // Add employee data
            $employeeName = $_POST['employeeName'];
            $employeeUsername = $_POST['employeeUsername'];
            $employeePassword = $_POST['employeePassword'];

            // Hash the password before storing it
            $hashedPassword = password_hash($employeePassword, PASSWORD_BCRYPT);

            // Insert data into the "employees" table
            $sql = "INSERT INTO employees (name, username, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $employeeName, $employeeUsername, $hashedPassword);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Employee added successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sorry for the inconvenience. Something went wrong, please try again later.']);
            }

            // Close the statement
            $stmt->close();
        }

       // Check if new username already exists
if (isset($_POST['editEmployeeId']) && isset($_POST['newEmployeeUsername']) && isset($_POST['newEmployeePassword'])) {
    $editEmployeeId = $_POST['editEmployeeId'];
    $newEmployeeUsername = $_POST['newEmployeeUsername'];
    $newEmployeePassword = $_POST['newEmployeePassword'];

    // Check for duplicate username
    $checkQuery = $conn->prepare("SELECT id FROM employees WHERE username = ? AND id != ?");
    $checkQuery->bind_param("si", $newEmployeeUsername, $editEmployeeId);
    $checkQuery->execute();
    $checkQuery->store_result();

    if ($checkQuery->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'Username already exists.'));
        exit();
    }

    // Proceed to update the employee if no duplicate
    $hashedPassword = password_hash($newEmployeePassword, PASSWORD_BCRYPT);
    $updateQuery = $conn->prepare("UPDATE employees SET username = ?, password = ? WHERE id = ?");
    $updateQuery->bind_param("ssi", $newEmployeeUsername, $hashedPassword, $editEmployeeId);

    if ($updateQuery->execute()) {
        echo json_encode(array('status' => 'success', 'message' => 'Employee updated successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to update employee.'));
    }
}



    
        // Handle POST request for deleting employee
        if (isset($_POST['deleteEmployeeId'])) {
            $deleteEmployeeId = $_POST['deleteEmployeeId'];

            // Delete employee from the "employees" table
            $sql = "DELETE FROM employees WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $deleteEmployeeId);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Employee deleted successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error deleting employee.']);
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Fetch data from "employees" table
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $employeesSql = "SELECT * FROM employees";
        $employeesResult = $conn->query($employeesSql);

        // Store the results in an array
        $employees = [];

        if ($employeesResult->num_rows > 0) {
            while ($row = $employeesResult->fetch_assoc()) {
                $employees[] = $row;
            }
        }

        // Return the employee data as JSON
        echo json_encode(['employees' => $employees]);
    }
} catch (Exception $e) {
    // Log the error for debugging
    error_log($e->getMessage());

    // Return a generic error message to the user
    echo json_encode(['status' => 'error', 'message' => 'Sorry for the inconvenience. Something went wrong, please try again later.']);
    exit();
}

// Close the connection
$conn->close();
?>

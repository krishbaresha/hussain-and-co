<?php
session_start();





include('config.php');





// Check session role
if (!isset($_SESSION['role'])) {
    header('Location: login.html');
    exit();
}

if ($_SESSION['role'] === 'employee') {
    header('Location: dashboard.html');
    exit();
}

if ($_SESSION['role'] !== 'user') {
    header('Location: login.html');
    exit();
}
// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit();
}

// Read incoming JSON data
$data = json_decode(file_get_contents('php://input'), true);

// Process actions
if (isset($data['action'])) {
    $action = $data['action'];

    if ($action === 'fetch_admins') {
        // Fetch admins
        $sql = "SELECT id, username FROM users";
        $result = $conn->query($sql);
        $admins = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($admins);
        exit();
    }

    if ($action === 'add_admin') {
        // Add a new admin
        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add admin.']);
        }
        exit();
    }

    if ($action === 'update_admin') {
        // Update admin details
        $adminId = $data['adminId'];
        $username = $data['username'];
        $password = $data['password'];
        $sql = "UPDATE users SET username = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $username, $adminId);

        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $updatePassSql = "UPDATE users SET password = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updatePassSql);
            $updateStmt->bind_param("si", $hashedPassword, $adminId);
            $updateStmt->execute();
        }

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update admin.']);
        }
        exit();
    }

    if ($action === 'delete_admin') {
        // Delete admin
        $adminId = $data['adminId'];
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $adminId);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete admin.']);
        }
        exit();
    }
}

// If no valid action, return error
echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
$conn->close();
?>

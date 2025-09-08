<?php
require 'db.php'; 

// Only proceed if POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get raw POST data (ie. email and password)
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Email and password are required']);
        exit;
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $db = new db();
        $pdo = $db->connect();

        // Prepare INSERT query with parameters
        $stmt = $pdo->prepare("INSERT INTO admin (Email, Password) VALUES (:email, :password)");

        // Bind parameters safely
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'User registered successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to register user']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: '.$e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>

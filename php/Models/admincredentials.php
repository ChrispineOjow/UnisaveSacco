<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require 'db.php'; 

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $db = new db();
    $pdo = $db->connect();

    $stmt = $pdo->prepare("SELECT Email, Password FROM admin WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['Password'])) {
            $_SESSION['email'] = $user['Email'];
            echo json_encode(['success' => true, 'message' => 'Login successful']);
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Incorrect password or email.']);
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Incorrect password or email.']);
        exit();
    }
}
?>

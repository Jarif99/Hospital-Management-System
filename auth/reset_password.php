<?php

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: forgot_password.php");
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if ($email === '' || $password === '' || $confirm === '') {
    echo "All fields are required.";
    exit();
}

if ($password !== $confirm) {
    echo "Password not match.";
    exit();
}

if (strlen($password) < 6) {
    echo "Password must be at least 6 characters.";
    exit();
}

$database = new Database();
$conn = $database->connect();

// Check if email exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Email not found.";
    exit();
}

$stmt->close();

// Update password (plain text, consistent with signup/login)
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $password, $email);

if ($stmt->execute()) {
    echo "
        <h3>Password Updated Successfully</h3>
        <a href='../index.php'>Login Now</a>
    ";
} else {
    echo "Password update failed.";
}

$stmt->close();

?>
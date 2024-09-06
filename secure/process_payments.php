<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    
    $stmt = $conn->prepare("INSERT INTO payment (username, amount, method) VALUES ( 'username', 'amount', 'method')");

    if ($stmt->execute()) {
        echo "Payment successfully recorded.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

header("Location: payments.php");
exit();
?>

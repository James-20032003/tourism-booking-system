<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $place = $_POST['place'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO bookings (username, date, time, place) VALUES ('$username', '$date', '$time', '$place')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




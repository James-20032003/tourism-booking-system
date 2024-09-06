<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION['username'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <style>
        /********************************** Styling Begin **********************************/
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            margin: 0;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .header {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 5px 10px;
            display: flex;
            align-items: right;
            justify-content: space-between;
        }
        .logout-icon {
            cursor: pointer;
            background-color: transparent;
            border: none;
        }
        .logout-icon img {
            height: 30px;
        }
        .container {
            display: flex;
            flex: 1;
        }
        .dashboard {
            height: 100%;
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        .dashboard h2 {
            margin-top: 0;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-radius: 4px;
        }
        .form-submit {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            margin-top: 20px;
            cursor: pointer;
        }
        .form-submit:hover {
            background-color: #45a049;
        }
        /********************************** Styling End **********************************/
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h1>Travel Uganda Surprise & Acquire Moments Originary (TUSAMO)</h1>
        </div>
        <button class="logout-icon" onclick="logout()">
            <img src="images/logout.png" alt="Logout">
        </button>
    </div>
    <div class="container">
        <div class="dashboard">
            <div class="sidebar">
                <h2>Tusamo</h2>
                <a href="book_now.php">Book Now</a>
                <a href="places_available.php">Places Available</a>
                <a href="tour_books.php">Tour Books</a>
                <a href="payments.php">Make Payment</a>
                <a href="search.php">Search</a>
            </div>
        </div>

        <div class="content">
            <h2>Book Now</h2>
            <form action="book.php" method="post" id="bookingForm">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" class="form-control" required>

                <label for="time">Time:</label>
                <input type="time" id="time" name="time" class="form-control" required>

                <label for="place">Place:</label>
                <input type="text" id="place" name="place" class="form-control" required>

                <input type="submit" value="Book Now" class="form-submit">
            </form>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'logout.php';
        }

        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const place = document.getElementById('place').value;

            const bookingInfo = `Date: ${date}, Time: ${time}, Place: ${place}`;
            alert('Booking Confirmed: ' + bookingInfo);

            this.submit();
        });
    </script>
</body>
</html>

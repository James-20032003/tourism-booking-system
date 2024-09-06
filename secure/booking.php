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
    <title>Make Payment</title>
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
            <h2>Make Payment</h2>
            <form action="process_payment.php" method="post">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" required>

                <label for="method">Payment Method:</label>
                <select id="method" name="method" class="form-control" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="mobile_money">Mobile Money</option>
                </select>

                <input type="submit" value="Pay Now" class="form-submit">
            </form>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>

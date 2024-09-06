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
    <title>Tour Books</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
            <h2>Tour Books</h2>
            <table>
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Exploring Uganda</td>
                        <td>John Doe</td>
                        <td>A comprehensive guide to the best tourist spots in Uganda.</td>
                    </tr>
                    <tr>
                        <td>Adventures in Africa</td>
                        <td>Jane Smith</td>
                        <td>An adventurous take on traveling across Africa, with a focus on Uganda.</td>
                    </tr>
                    <tr>
                        <td>Uganda's Hidden Gems</td>
                        <td>Bob Johnson</td>
                        <td>Discover the lesser-known but stunning locations in Uganda.</td>
                    </tr>
                </tbody>
            </table>

            <div class="download-section">
                <a href="https://www.scribd.com/document/482696807/Tourism-Book-01-pdf" download>Tourism Book (PDF)</a>
                <a href="http://elibrary.gci.edu.np/bitstream/123456789/3258/1/Bt.467%20Dictionary%20of%20Travel%2C%20Tourism%20and%20Hospitality%2C%20Third%20Edition%20by%20S.%20Medlik.pdf" download>Dictionary and Hospitality (PDF)</a>
                <a href="https://www.researchgate.net/publication/232723106_Worldwide_Destinations_The_geography_of_travel_and_tourism" download>World Destination</a>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>

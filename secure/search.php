<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
echo "Welcome, " . $_SESSION['username'];


include 'config.php';

$searchResults = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['search_query'];

    $stmt = $conn->prepare("SELECT * FROM bookings WHERE username LIKE ? OR date LIKE ? OR time LIKE ? OR place LIKE ?");
    $searchPattern = "%" . $searchQuery . "%";
    $stmt->bind_param("ssss", $searchPattern, $searchPattern, $searchPattern, $searchPattern);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }

    $stmt->close();
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        /* Styling */
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
            align-items: center;
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
            <h2>Search Bookings</h2>
            <form action="search.php" method="post">
                <label for="search_query">Search:</label>
                <input type="text" id="search_query" name="search_query" required>
                <input type="submit" value="Search">
            </form>

            <?php if (!empty($searchResults)) : ?>
                <h2>Search Results</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Place</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($searchResults as $result) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($result['username']); ?></td>
                                <td><?php echo htmlspecialchars($result['date']); ?></td>
                                <td><?php echo htmlspecialchars($result['time']); ?></td>
                                <td><?php echo htmlspecialchars($result['place']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <p>No results found for "<?php echo htmlspecialchars($searchQuery); ?>"</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>

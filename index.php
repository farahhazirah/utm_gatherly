<?php
require_once 'config/db.php';

// Example query to fetch data
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "No results founds";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "UTM Gatherly"; ?></title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="images/android-chrome-192x192.png">
    <!-- Link to Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional link to your custom CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- header -->
    <?php include 'views/header.php'; ?>
    <!-- header end -->


    <!-- nav -->
    <?php include 'views/nav.php'; ?>
    <!-- nav end -->


    <!-- Main Content Area -->
    <main class="container my-5">
        <?php include 'views/calendar.php'; ?>
    </main>


    <!-- Footer Section -->
    <?php include 'views/footer.php'; ?>
    <!-- footer end -->


    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

    // Close the connection
    $conn->close();

?>
<?php
require_once 'config/db.php';

include 'config/router.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "UTM Gatherly"; ?></title>

    <!-- favicon -->
    <link rel="icon" href="images/favicon.ico">
    <!-- Link to Bootstrap CSS -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <?php include $contentFile; ?>
    </main>


    <!-- Footer Section -->
    <?php include 'views/footer.php'; ?>
    <!-- footer end -->


    <!-- Bootstrap and jQuery Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php

    // Close the connection
    $conn->close();

?>
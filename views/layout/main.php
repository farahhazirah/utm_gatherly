<?php 
// Check if there’s a success message in the session, this for success message used in function signup line 90 or login line 34
if (isset($_SESSION['success'])):
    $successMessage = $_SESSION['success'];
    unset($_SESSION['success']); // Remove it after displaying
endif;
// Check if there’s a error message in the session, this for error message
if (isset($_SESSION['error'])):
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']); // Remove it after displaying
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "UTM Gatherly"; ?></title>

    <!-- favicon -->
    <link rel="icon" href="<?php echo IMAGE_URL; ?>favicon.ico">
    <!-- Link to Bootstrap CSS -->
    <link href="<?php echo ASSET_URL; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome icon -->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>@fortawesome/fontawesome-free/css/all.min.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>bootstrap-icons/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- header -->
    <?php include 'header.php'; ?>
    <!-- header end -->

    <!-- nav -->
    <?php include 'nav.php'; ?>
    <!-- nav end -->


    <!-- Main Content Area -->
    <main class="container my-5">
        <?php echo $content; ?>
    </main>


    <!-- Footer Section -->
    <?php include 'footer.php'; ?>
    <!-- footer end -->


    <!-- Bootstrap and jQuery Scripts -->
    <script src="<?php echo ASSET_URL; ?>jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fullcalendar -->
    <script src="<?php echo ASSET_URL; ?>fullcalendar/index.global.min.js"></script>
    <!-- sweetalert2 -->
    <script src="<?php echo ASSET_URL; ?>sweetalert2/dist/sweetalert2.all.min.js"></script> 
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if there's a success message
            <?php if (!empty($successMessage)): ?>
                Swal.fire({
                  icon: "success",
                  title: "Success!",
                  text: "<?php echo $successMessage; ?>",
                  showConfirmButton: false,
                  timer: 2500
                });
            <?php endif; ?>

            <?php if (!empty($errorMessage)): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "<?php echo $errorMessage; ?>"
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>
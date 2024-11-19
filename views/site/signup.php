<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - <?php echo $title; ?></title>
    <link rel="icon" href="<?php echo IMAGE_URL; ?>favicon.ico">
    <!-- font awesome icon -->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/styles.css" >
</head>
<body>
    <div class="container">
        <div class="justify-content-center">
            <img class="bi me-2" src="<?php echo IMAGE_URL; ?>gatherly.png" alt="Gatherly Logo" width="200" height="auto"><!-- logo gatherly -->
            <h1><?php echo $title; ?></h1>
        </div>

        <div id="loginForm" class="form-content">
            <!-- Sign Up Form -->
            <h2>Sign Up</h2>
            <form action="<?php echo BASE_URL; ?>index.php?r=site/signup" method="POST">
                <div class="input-container">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-container">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-container">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" style="background: linear-gradient(90deg, #81c784, #a5d6a7);">Sign Up</button>
            </form>
        </div>

        <!-- Toggle Button for Switching to Signup Page -->
        <p>Already have an account ? <a href="<?php echo BASE_URL; ?>index.php?r=site/login">Sign In</a></p>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
    <!-- sweetalert2 -->
    <script src="<?php echo ASSET_URL; ?>sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if there's an error message, then show sweetalert message
            <?php if (!empty($error)): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "<?php echo $error; ?>" // error message passed from function signup line 70 or 96
                });
            <?php endif; ?>
        });
    </script>

</body>
</html>
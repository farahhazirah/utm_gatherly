<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - <?php echo $title; ?></title>
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

        <!-- Sign In Form -->
        <h2>Login</h2>
        <form action="<?php echo BASE_URL; ?>index.php?r=site/login" method="POST">
            <div class="input-container">
                <span class="icon">&#128100;</span>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <span class="icon">&#128274;</span>
                <input type="password" name="password" placeholder="Password" required>
                <a style="float: right;" href="<?php echo BASE_URL; ?>index.php?r=site/forgotPassword">Forgot Password?</a>
            </div>

            <button style="margin-top: 20px;" type="submit">Login</button>
        </form>

        <!-- Toggle Button for Switching to Signup Page -->
        <!-- <div>
            <button type="button" style="background: linear-gradient(90deg, #81c784, #a5d6a7);" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?r=site/signup'">Sign Up</button>
        </div> -->

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <p>Dont have an account ? <a href="<?php echo BASE_URL; ?>index.php?r=site/signup">Register</a>
        </p>
    </div>

    <script src="<?php echo ASSET_URL; ?>sweetalert2/dist/sweetalert2.all.min.js"></script>

</body>
</html>
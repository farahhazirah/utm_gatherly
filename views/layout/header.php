<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* header color gradient */
        .bg-maroon-gradient {
            color: #fff !important;
            background: linear-gradient(to right, #4b0000, #800000, #b22222) !important;
        }

        .user-name-text {
            color: var(--vz-header-item-color);
        }
    </style>
</head>

<body>
    <header class="p-3 bg-maroon-gradient">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img class="bi me-2" src="<?php echo IMAGE_URL; ?>gatherly.png" alt="Gatherly Logo" width="40"
=======
                <a href="<?php echo BASE_URL; ?>index.php?r=site/index" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img class="me-2" src="<?php echo IMAGE_URL; ?>gatherly.png" alt="Gatherly Logo" width="40"
>>>>>>> Stashed changes
=======
                <a href="<?php echo BASE_URL; ?>index.php?r=site/index" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img class="me-2" src="<?php echo IMAGE_URL; ?>gatherly.png" alt="Gatherly Logo" width="40"
>>>>>>> Stashed changes
                        height="32">
                </a>
                <!-- pindah pergi nav.php -->
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                    <li><a href="<?php echo BASE_URL; ?>index.php?r=site/index"
                            class="nav-link px-2 text-white">Home</a></li>
=======
=======
>>>>>>> Stashed changes
                    <!-- <li><a href="<?php echo BASE_URL; ?>index.php?r=site/index"
                            class="nav-link px-2 text-secondary">Home</a></li>
>>>>>>> Stashed changes
                    <li><a href="<?php echo BASE_URL; ?>index.php?r=calendar/index"
                            class="nav-link px-2 text-white">Calendar</a></li> -->
                </ul>

<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo IMAGE_URL; ?>profilepicture.jpg" alt="mdo" width="32" height="32"
                            class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
=======
=======
>>>>>>> Stashed changes
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?php echo IMAGE_URL; ?>profilepicture.jpg" width="32" height="32" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium text-white"><?php echo $_SESSION['username']?></span>
                                <!-- <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">User Role</span> -->
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 65px, 0px);">
                        <!-- list dropdown item-->
                        <h6 class="dropdown-header">Welcome <?php echo $_SESSION['username']?>!</h6>
                        <!-- profile -->
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <div class="dropdown-divider"></div>
                        <!-- logout -->
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>index.php?r=site/logout"><i class="fa-solid fa-right-from-bracket fa-fade fa-sm align-middle me-2" style="color: #f06060;"></i><span class="align-middle" style="color: #f06060;">Logout</span></a>
                    </div>
                    
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </header>

</body>

</html>
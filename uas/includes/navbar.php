<nav class="navbar navbar-expand-lg navbar-light navbar-arana fixed-top navbar-fixed-top">
    <div class="container">
        <a href="index.php" class="navbar-brand navbar-logo-journal">
            <img src="images/<?= $config['logo'] ?>" alt="Logo" class="logo-journal" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item text-center active">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item text-center">
                    <a href="about-us.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item text-center">
                    <a href="our-projects.php" class="nav-link">Our Projects</a>
                </li>
                <li class="nav-item text-center">
                    <a href="contact-us.php" class="nav-link">Contact Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (!isset($_SESSION['USR'])) : ?>
                    <li class="nav-item text-center mr-xl-3">
                        <a href="admin/register.php" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item text-center">
                        <a href="admin/login.php" class="btn btn-primary nav-link px-4 text-white">Login</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item text-center">
                        <a href="admin/index.php" class="btn nav-link px-4 py-0 text-dark">
                            <img class="img-profile rounded-circle mr-lg-3" width="45" src="admin/img/undraw_profile.svg">
                            <?= $_SESSION['USR'] ?></a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>
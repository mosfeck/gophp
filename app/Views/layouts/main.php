<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <title><?= (isset($meta_title) ? $meta_title : 'Codeigniter default') ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Blog') ?>">Blog <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url() ?>/ContactControl">Contact</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url() ?>/RegisterControl">Register</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url() ?>/SigninControl">Throttler</a>
                    </li>

                    <?php if (session()->has('logged_user')) : ?>
                        <div class="dropdown">
                            <li class="nav-item" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a class="nav-link dropdown-toggle" href="#"><?= $this->renderSection('page_title') ?></a>
                            </li>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item">
                                    <a class="nav-link text-dark" href="<?= site_url() . '/DashboardControl' ?>">Dashboard</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link text-dark" href="#">Edit</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link text-dark" href="<?= site_url() . '/DashboardControl/avatar' ?>">Upload avatar</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link text-dark" href="#">change password</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link text-dark" href="<?= site_url() . '/DashboardControl/login_activity' ?>">Login Activity</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link  text-dark" href="<?= site_url() . '/DashboardControl/logout' ?>">Logout</a>
                                </li>
                            </div>

                        <?php else : ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= site_url() ?>/LoginControl">Login</a>
                            </li>
                        <?php endif; ?>
                        </div>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <?= $this->renderSection('content') ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
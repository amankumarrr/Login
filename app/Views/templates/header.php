<?php $config = config('Site'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= base_url(); ?>/public_html/assets/css/style.css?v=1.5">
    <link rel="stylesheet" href="<?= base_url(); ?>/public_html/assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public_html/assets/css/theme.css">
    <link rel="stylesheet" type="text/css" media="print" href="<?= base_url(); ?>/public_html/assets/css/print.css">

    <script src="<?= base_url(); ?>/public_html/assets/js/base.js"></script>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title></title>

</head>


<body>
    <?php
    $uri = service('uri');
    ?>
    <?php if (session()->get('isLoggedIn')) { ?>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark header-color">
            <a class="navbar-brand tcolor-2" href="<?= base_url(); ?>/"><?= $config->siteName ?></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group d-none">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <?php if (session()->get('isLoggedIn')) : ?>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " id="userDropdown" data-id="<?= session()->get('id') ?>" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw tcolor-2"></i>&nbsp;<?= session()->get('firstname') ?></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url(); ?>/admin/profile"> <img src="<?= base_url(); ?>/public_html/assets/images/<?= $config->siteDefaultDP ?>" alt="..." class="img-thumbnail rounded-circle"></a>
                            <a class="dropdown-item" href="<?= base_url(); ?>/"><i class="fa fa-home mr-2 tcolor-2"></i>Home</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url(); ?>/logout"> <i class="fa fa-sign-out-alt tcolor-2"></i>&nbsp; Sign-out</a>
                        </div>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
                        <a class="nav-link" href="<?= base_url(); ?>/">Login</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
                        <a class="nav-link" href="<?= base_url(); ?>/register">Register</a>
                    </li>
                </ul>
            <?php endif; ?>
        </nav>
    <?php } ?>
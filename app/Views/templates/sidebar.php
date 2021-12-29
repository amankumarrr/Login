<?php if (session()->get('isLoggedIn')) { ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark sidebar-color" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="<?= base_url(); ?>/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Personal</div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profile
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url(); ?>/admin/profile">View Profile</a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Settings</div>
                        <a class="nav-link" href="<?= base_url(); ?>/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Sign-out
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer sidebar-footer-color">
                    <div class="small">Logged in as:</div>
                    <span class="spinner-grow text-success spinner-grow-sm mr-2"></span><span class=""><?= strtoupper((string) session()->get('role')) ?></span>
                </div>
            </nav>
        </div>
    <?php } ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
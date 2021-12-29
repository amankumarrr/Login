<?= view_cell('\App\Libraries\Header::getHeader') ?>
<?= view_cell('\App\Libraries\Sidebar::getSidebar') ?>
<?= $this->renderSection('content') ?>
<?= view_cell('\App\Libraries\Footer::getFooter') ?>
           
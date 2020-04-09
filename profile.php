<?php
require_once 'core/init.php';

if (!Session::exsist('username')) {
    header('Location:register.php');
}



require_once 'templates/header.php';
?>

<h1>Hai <?php echo Session::get('username') ?></h1>
<?php require_once 'templates/footer.php' ?>
<?php

require_once 'core/init.php';


if (Input::get('submit')) {
    // 1. Memanggil ojbek Validasi 
    $validasi = new Validasi();

    // 2. metode check
    $validasi = $validasi->check(array(
        'username' => array('required' => TRUE),
        'password' => array('required' => TRUE)
    ));

    // 3. Lolos uji check
    if ($validasi->passed()) {

        if ($user->login_user(Input::get('username'), Input::get('password'))) {
            Session::set('username', Input::get('username'));
            header('location:profile.php');
        } else {
            echo "login gagal";
        }
    } else {
        $errors = $validasi->errors();
    }
}



require_once 'templates/header.php';
?>
<h2>Login di sini</h2>

<form action="login.php" method="POST">
    <label for="">Username</label>
    <input type="text" name="username"> <br>

    <label for="">Passsword</label>
    <input type="password" name="password"> <br>

    <input type="submit" name="submit" value="Login">
    <div id="errors">
        <?php if (!empty($errors)) { ?>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        <?php } ?>
    </div>
</form>


<?php
require_once 'templates/footer.php';
?>
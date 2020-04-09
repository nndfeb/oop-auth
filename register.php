<?php

require_once 'core/init.php';

$errors = array();

if (Input::get('submit')) {
    // 1. Memanggil ojbek Validasi 
    $validasi = new Validasi();

    // 2. metode check
    $validasi = $validasi->check(array(
        'username' => array(
            'required' => TRUE,
            'min' => 3,
            'max' => 50,
        ),
        'password' => array(
            'required' => TRUE,
            'min' => 3,
        )
    ));

    // 3. Lolos uji check
    if ($validasi->passed()) {

        $user->register_user(array(
            'username' => Input::get('username'),
            'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
        ));

        Session::set('username', Input::get('username'));
        header('location:profile.php');
    } else {
        $errors = $validasi->errors();
    }
}



require_once 'templates/header.php';
?>
<h2>Daftar di sini</h2>

<form action="register.php" method="POST">
    <label for="">Username</label>
    <input type="text" name="username"> <br>

    <label for="">Passsword</label>
    <input type="password" name="password"> <br>

    <input type="submit" name="submit" value="Daftar">
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
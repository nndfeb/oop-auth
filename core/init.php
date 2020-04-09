<?php

session_start();

// Load Semua Class

spl_autoload_register(function ($class) {
    require_once 'class/' . $class . '.php';
});

$user = new User();

<?php

class Session
{
    public static function exsist($name)
    {
        return (isset($_SESSION[$name])) ? TRUE : FALSE;
    }
    public static function set($nama, $nilai)
    {
        $_SESSION[$nama] = $nilai;
    }

    public static function get($nama)
    {
        return $_SESSION[$nama];
    }
}

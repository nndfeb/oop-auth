<?php

class user
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function register_user($fields = array())
    {
        if ($this->db->insert('users', $fields)) return TRUE;
        else return FALSE;
    }

    public function login_user($username, $password)
    {
    }
}

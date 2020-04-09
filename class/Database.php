<?php


class Database
{
    private static $INSTANCE = null;
    private
        $mysqli,
        $HOST = 'localhost',
        $USER = 'root',
        $PASS = '',
        $DBNAME = 'db_auth';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
        if (mysqli_connect_error()) {
            die('Gagal Koneksi');
        }
    }

    /*
Singletion patteren
*/

    public static function getInstance()
    {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new Database();
        }
        return self::$INSTANCE;
    }


    public function insert($table, $fields = array())
    {
        // Mengambil kolom
        $column = implode(", ", array_keys($fields));

        // Mengambil nilai
        $valueArray = array();
        $i = 0;
        foreach ($fields as $key => $values) {
            if (is_int($values)) {
                $valueArray[$i] = $this->escape($values);
            } else {
                $valueArray[$i] = "'" .  $this->escape($values) . "'";
            }
            $i++;
        }
        $values = implode(", ", $valueArray);

        $query = "INSERT INTO $table ($column) VALUES ($values)";

        return $this->run_query($query, "masalah saat memasukan data ");
    }

    public function run_query($query, $msg)
    {
        if ($this->mysqli->query($query)) return TRUE;
        else die($msg);
    }

    public function escape($name)
    {
        return $this->mysqli->real_escape_string($name);
    }
}

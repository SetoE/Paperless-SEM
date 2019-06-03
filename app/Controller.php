<?php

class Controller
{

    protected $db;

    public function __construct()
    {
        $f3 = \Base::instance();

        $db = new DB\SQL('mysql:host=localhost;port=3306;dbname=aai_db', 'root', '');

        new DB\SQL\Session($db);
        $this->db = $db;
    }
}

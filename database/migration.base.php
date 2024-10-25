<?php

class MigrationBase
{
    protected ?DB $db;

    public function __construct()
    {
        $config = require "config/config.php";

        $this->db = new DB($config['database']);
    }
}

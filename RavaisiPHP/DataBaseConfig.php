<?php
ini_set("default_charset", "UTF-8");
class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $dbname;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'ravaisi';
    }
}
?>
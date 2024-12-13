<?php
require 'DataBase.php';
ini_set("default_charset", "UTF-8");
$db = new DataBase();
if ($db->db_connect())
{
    echo $db->getStringOrders('orders', $_POST["order_table"]);
    
}
else
{
    echo 'error connecting to database';
}
?>
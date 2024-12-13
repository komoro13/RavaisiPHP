<?php
require 'DataBase.php';
$db = new DataBase();
if ($db->db_connect())
{
    echo $db->getOrders('orders');
}
else
{
    echo 'error connecting to database';
}
?>
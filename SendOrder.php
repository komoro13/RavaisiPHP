<?php
ini_set("default_charset", "UTF-8");
require "DataBase.php";
$db = new DataBase();
if ($db->db_connect())
{
    if ($db->sendOrder("orders", $_POST["order_string"], $_POST["order_table"], $_POST["price"]))
    {
        echo 'Order sent successfully';
    }
    else
    {
        echo 'error sending order';
    }
}
else
{
    echo 'error connecting to database';
}
?>

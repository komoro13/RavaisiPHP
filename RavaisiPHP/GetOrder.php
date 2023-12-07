<?php
require "DataBase.php";
$db = new DataBase();
if ($db->db_connect())
{
    echo $db->getOrder('orders', $_POST['order_table']);
}
else
{

}
?>
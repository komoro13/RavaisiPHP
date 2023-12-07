<?php
require "DataBase.php";
$db = new DataBase();
if ($db->db_connect())
{
    echo $db->getProductToppings('products', $_POST['name']);
}
else
{

}
?>
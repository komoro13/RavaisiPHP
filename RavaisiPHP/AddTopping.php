<?php
ini_set("default_charset", "UTF-8");
require 'DataBase.php';
$db = new DataBase();

if ($db->db_connect())
{
    if ($db->add_topping('toppings', $_POST['name'], $_POST['price']))
    {
        echo 'item added successfully!';
    }
    else 
    {
        echo 'error adding item';
    }
}
else
{
    echo 'error connecting to database';
}
?>
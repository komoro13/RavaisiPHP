<?php
require "DataBase.php";
$db = new DataBase();
if ($db->db_connect())
{
    if ($db->deleteItem("toppings", $_POST['name']))
    {
        echo 'Category deleted successfully!'; 
    }
    else
    {
        echo 'error deleting category!';
    }
}
else
{
    echo 'error deleting database!';
}
?>
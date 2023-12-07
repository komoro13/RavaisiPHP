<?php
ini_set("default_charset", "UTF-8");
require "DataBase.php";
$db = new DataBase();
if ($db->db_connect())
{
    echo $db->get_items('toppings', $_POST["name"]);
    
}
else
{

}
?>
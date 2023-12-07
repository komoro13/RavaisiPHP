<?php
ini_set("default_charset", "UTF-8");
require 'DataBase.php';
$db = new DataBase();

if ($db->db_connect())
{
    if ($db->add_product('products', $_POST['name'], $_POST['price'], $_POST['category'],$_POST['toppings'] ))
    {
      echo 'product added successfully';
    }     
    else 
    {
    echo 'error adding product';
   }
}
else
{
    echo 'error conencting to database';
}

?>
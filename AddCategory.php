<?php
ini_set("default_charset", "UTF-8");
require 'DataBase.php';
$db = new DataBase();

if (isset($_POST['name']))
{
    if ($db->db_connect())
    {
        if ($db->add_category('categories', $_POST['name']))
        {
            echo 'category added successfully';
        }     
        else 
        {
            echo 'error adding category';
        }
    }
    else
    {
        echo 'error conencting to database';
    }
}
else
{
    echo 'error: all fields are mandatory';
}
?>
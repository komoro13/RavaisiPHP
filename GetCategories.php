<?php
require 'DataBase.php'; 
$db = new DataBase();

if ($db->db_connect())
{
    echo $db->get_items("categories", "");      
}
else 
{
    echo 'error connecting to database';
}

?>
<?php
$db = new DataBase();
if ($db->db_connect())
{
    if ($db->submitReport(reports, $_POST['place'], $_POST['comment']))
    {
      echo 'report added succesfully';
    }     
    else 
    {
    echo 'error adding report';
   }
}
else
{
    echo 'error connecting to database';
}
?>
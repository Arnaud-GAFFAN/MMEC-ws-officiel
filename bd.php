<?php 
$con = new mysqli('localhost','root','','blog_admin_db');
if (!$con)
{
    echo 'la connexion n\'a pas eu lieu';
}
?>
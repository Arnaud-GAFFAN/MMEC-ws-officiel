<?php

$con = new mysqli('localhost','root','','blog_admin_db');
if (!$con)
{
    echo 'la connexion n\'a pas eu lieu';
}
else{

    if (isset($_GET['deleteid']))
    {
        $id=$_GET['deleteid'];
        
        $query="delete from blog_categories where id=$id";
        $execute=mysqli_query($con,$query);
        if($execute)
        {
           header('location:categoriesdetails.php');
        }
    }
}
?>
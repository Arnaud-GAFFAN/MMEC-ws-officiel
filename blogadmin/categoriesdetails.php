
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="css/bootstrap.min.css" />
       <link rel="icon" href="../img/logo.png">
    <title>MMEC</title>
</head>
<body>
    <br><br>
    <section class="test ">
            <div class="container">
                <a class="btn btn-primary" href="./add.php" style="">Ajouter une <span style="color: red;"> catégorie</span></a>
             <br><br>
                <table class="table table-striped">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nom de la catégories</th>
                        <th scope="col">Actions</th>
                           <?php

$con = new mysqli('localhost','root','','blog_admin_db');
if (!$con)
{
    echo 'la connexion n\'a pas eu lieu';
}else{

    $query= "SELECT * FROM blog_categories";
    $execute = mysqli_query($con , $query);
    if ($execute)
    {
       while ($row=mysqli_fetch_assoc($execute)) 
       {
         $id=$row['id'];
         $nom=$row['name'];
         echo '<tr>
         <th scope="row">'.$id.'</th>
         <td>'.$nom.'</td>
         <td> <a class="btn btn-primary " href="update.php? updateid='.$id.'">Modifier</a></td>
         <td> <a class="btn btn-danger" href="delete.php? deleteid='.$id.'">Supprimer</a></td>
     </tr>';
       } 
    }
}
?>
                    </thead>
                    <tbody>
</body>
</html>

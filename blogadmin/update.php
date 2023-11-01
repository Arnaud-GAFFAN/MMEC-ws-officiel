<?php
$id = $name = "";
$idvide = $namevide = "";
// include 'bd.php';
 
$con = new mysqli('localhost','root','','blog_admin_db');
if (!$con)
{
    echo 'la connexion n\'a pas eu lieu';
}

    
    if(isset($_GET['updateid']))
    {
   $id=$_GET['updateid'];
    }
    $query="SELECT * FROM blog_categories WHERE id='$id'";
    $execute=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($execute);
     $nom=$row['name'];
    $valide=false;
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
  
   $nom=$_POST["nom"];
      if (empty($nom))
   {
     $idvide='entrez le nom de la catégorie';
     $valide=false;
   }else
   {
    $valide=true;
   }
   if ($valide = true )
   {
    $con = new mysqli('localhost','root','','blog_admin_db');
if (!$con)
{
    echo 'la connexion n\'a pas eu lieu';
}
else
{

 $query = "UPDATE blog_categories SET name ='$nom' WHERE id='$id'";
    $execute=mysqli_query($con,$query);
       if ($execute)
       {
          echo 'modification effectué';
          header('location: ./categoriesdetails.php');
       }
       else{
        echo 'non';
       }
      }
}
}

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>MMEC</title>
    <link rel="icon" href="../img/logo.png">
</head>
<body>
    <br><br>
    <form class="Formulaire" method="post">
            <div class="row">
                 <div class="col-md-3"></div>
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom de la catégories</label>
                    <input type="text" name="nom" class=" form-control" value="<?php echo $nom; ?>" placeholder="Renseigner un nom">
                     <p style="color:red; font-style:italic;margin-top:0px; font-size:small;"><?php echo $idvide; ?></p>
             
                    <div class="">
                     <input type="submit" class="btn btn-primary w-100" value="Modifier">
                 </div>
</body>
                    </div>   
                      <div class="col-md-3"></div>
</form>

</html>
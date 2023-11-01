<?php
$id = $name = "";
$idvide = $namevide = "";
// include 'bd.php';
 
$con = new mysqli('localhost','root','','blog_admin_db');
if (!$con)
{
    echo 'la connexion n\'a pas eu lieu';
}
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

 $query = "INSERT INTO blog_categories(name) VALUES('$nom')";
    $execute=mysqli_query($con,$query);
       if ($execute)
       {
          echo 'enrégistrement effectué';
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
                    <input type="text" name="nom" class=" form-control"  placeholder="Renseigner un nom">
                     <p style="color:red; font-style:italic;margin-top:0px; font-size:small;"><?php echo $idvide; ?></p>
             
                    <div class="">
                     <input type="submit" class="btn btn-primary w-100" value="Ajouter">
                 </div>
</body>
                    </div>   
                      <div class="col-md-3"></div>
</form>

</html>
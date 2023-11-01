<?php
$valide=false;
$nom= $desc = $datei = $datef = "";
$nomvide = $descvide = $dateivide = $datefvide  = "";
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['my_image']))
{
   $nom = $_POST["nom"];
    $desc = $_POST["desc"];
    $datei = $_POST["datei"];
  
  
   $valide=true;
   if (empty($nom)){
    $nomvide='renseignez le nom de l\'activité';
     $valide=false;
   }
  if (empty($desc)){
    $descvide='decrivez l\'activité';
     $valide=false;
   }
     if (empty($datei)){
    $dateivide='Quelle est la date de début ?';
     $valide=false;
   }

   if($valide) {
      include 'bd.php';
     "<pre>";
     ($_FILES['my_image']);
      "</pre>";
     
     $img_name = $_FILES['my_image']['name'];
     $img_size = $_FILES['my_image']['size'];
     $tmp_name = $_FILES['my_image']['tmp_name'];
     $error = $_FILES['my_image']['error'];
     
     if ($error === 0) {
       if ($img_size > 1250000000) {
        $em = "Sorry, your file is too large.";
		   // header("Location: ajoutactiviter.php?error=$em");
      }else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png"); 
        
        if (in_array($img_ex_lc, $allowed_exs)) {
          $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
          $img_upload_path = 'uploads/'.$new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);

          // Insert into Database
          $query = "INSERT INTO `activité` (`nom`, `description`, `jour1`, `jour2`) VALUES ( '$nom', '$desc', '$datei', '$new_img_name')";

          //$sql = "INSERT INTO images(image_url) 
          //VALUES('$new_img_name')";
          	    $execute=mysqli_query($con,$query);
                if ($execute){
                  $valid = "activité enrégister" ;
                }
        }else {
         echo $em = "You can't upload files of this type";
        //  header("Location: ajoutactiviter.php?error=$em");
        }
      }
    }else {
      echo 'non';
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMEC</title>
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
  <?php if (isset($valid)): ?>
		<p class="alert alert-success"><?php echo $valid; ?></p>
	<?php endif ?>
    <h3 style="text-align: center;">Ajouter une Actviter</h3>
    <section class="py-3">
      <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <label for="nom" class="form-label">Nom de L'activité</label>
                <input type="text" name="nom" class=" form-control" placeholder="Séminaire pour les couples">
                     <p style="color:red; font-style:italic;margin-top:0px; font-size:small;"><?php echo $nomvide; ?></p>

                <label for="prenom" class="form-label">Description de L'activité</label>
                <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
                     <p style="color:red; font-style:italic;margin-top:0px; font-size:small;"><?php echo $descvide; ?></p>

                                <label for="nom" class="form-label">date de début</label>
                                <input type="date" name="datei" class=" form-control" placeholder="">
                     <p style="color:red; font-style:italic;margin-top:0px; font-size:small;"><?php echo $dateivide; ?></p>

                       
                        
                         
                        
                                <label for="nom" class="form-label">image</label>
                                <input type="file" name="my_image" class=" form-control " >
                     <p style="color:red; font-style:italic;margin-top:0px; font-size:small;"><?php echo $datefvide; ?></p>

                            </div>
                    
                   
             
           </div>
                <input type="submit" value="Ajouter"  class="btn btn-primary w-100 mt-2">
            </div>
        </div>
        </form>
      </div>
    </section>
</body>
</html>
<?php

session_start();
if (isset($_SESSION['login']))
{
//le script de chaque page
}
else
{
header('location: index.php'); //retour a l’accueil pour te connecter 
}


include 'include/database.php';

// on récupère l'id de edit de l'article à modifier
if (isset($_GET['edit']) AND !empty($_GET['edit'])) {

    $edit_id = htmlspecialchars($_GET['edit']);
    $edit_article = $db->prepare('SELECT * FROM content WHERE id = ?');
    $edit_article->execute(array($edit_id));
      
    // on vérifie que l'article existe bien
    if ($edit_article->rowCount() ==1) {
        // on récupère les infos
        $edit_article = $edit_article->fetch();
        
    } else {
        die("Erreur : l'article n'existe pas...");
    }
} 

$titre="";
$descriptif="";
$categorie="";

if (isset($_POST['titre'], $_POST['descriptif'], $_POST['categorie'])) {
    if(!empty($_POST['titre']) AND !empty($_POST['descriptif']) AND !empty($_POST['categorie'])) {     
        
        $titre = htmlspecialchars($_POST['titre']);
        $descriptif = htmlspecialchars($_POST['descriptif']);
        $categorie = htmlspecialchars($_POST['categorie']);
        
        
        $update = $db->prepare('UPDATE content SET titre=?, descriptif=?, categorie=? WHERE id =?');
            $update->execute(array($titre, $descriptif, $categorie, $edit_id)); 
            $message = 'Votre article a bien été mis à jour';  
    }
    else {
        $message ='Veuillez remplir tous les champs';
    }
} 



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modification d'article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />    
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <?php include 'include/header.php' ?>
    <!-- menu -->
    <?php include 'include/menu.php' ?>


    <div class="container">

    <h1>Bienvenue sur notre site sur les châteaux de la Loire</h1><br>
    
    <div id="add_article_A">
            <p>Modification d'article</p><br>
            <!-- <p id="CA">Les plus visités</p> -->
            
            <form method="post" onSubmit="window.location.reload()">
                
                    <label>Type d'article : </label>
                    <div>
                       <?php 
                if(empty($categorie)) {
                    if($edit_article['categorie'] == "Les plus visités"){
                        ?>
                        <input type="radio" id="" name="categorie" value="Les plus visités" checked="checked" required >
                        <label for="">Les plus visités</label>
                        <input type="radio" id="" name="categorie" value="A découvrir" required>
                        <label for="">A découvrir</label>
                      <?php  
                    } else { ?>
                        <input type="radio" id="" name="categorie" value="Les plus visités"  required >
                        <label for="">Les plus visités</label>
                        <input type="radio" id="" name="categorie" value="A découvrir" checked="checked" required>
                        <label for="">A découvrir</label>
                        <?php }              
                 } else {
                    
                      if($categorie == "Les plus visités"){
                          ?>
                       <input type="radio" id="" name="categorie" value="Les plus visités" checked="checked" required >
                        <label for="">Les plus visités</label>
                        <input type="radio" id="" name="categorie" value="A découvrir" required>
                        <label for="">A découvrir</label>
                      <?php  
                    } else { ?>
                        <input type="radio" id="" name="categorie" value="Les plus visités"  required >
                        <label for="">Les plus visités</label>
                        <input type="radio" id="" name="categorie" value="A découvrir" checked="checked" required>
                        <label for="">A découvrir</label>
                        <?php } 
                  }
                   ?>
                    </div><br>
                  
                <input type="text" name="titre"  value=" <?php if(!empty($titre)) { echo $titre; } 
                                                        else { echo $edit_article['titre']; } ?>" required><br><br>
      
                <textarea name="descriptif" id="" cols="30" rows="10" required><?php if(!empty($descriptif)) { echo $descriptif; } 
                                                        else { echo $edit_article['descriptif']; } ?></textarea><br>
                
                <input type="submit" value="Modifier" onclick="alert('Article modifié')" ><br/> 
                
                 <?php if(isset($message)) { echo $message; } ?>
                 <br/>
                <a href="form_backoffice.php">Retour backoffice</a>
                
            </form><br><br>
            
        </div>  
    
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
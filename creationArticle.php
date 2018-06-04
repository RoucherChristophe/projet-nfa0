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

// création d'article

if(isset($_POST['titre'], $_POST['categorie'], $_POST['descriptif'])) {
    if(!empty($_POST['titre']) and !empty($_POST['descriptif']) and !empty($_POST['categorie'])) {
    

        $titre = htmlspecialchars($_POST['titre']);
        $descriptif = htmlspecialchars($_POST['descriptif']);
        $categorie = htmlspecialchars($_POST['categorie']);


        $ins_aa = $db->prepare('insert into content (titre, descriptif, categorie) values (?, ?, ?)');
        $ins_aa->execute(array($titre, $descriptif, $categorie));

    } else {
        $erreur = 'Veuillez remplir tous les champs';
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
    
    
 <!-- création d'article  -->    
    <div id="add_article_A">
            <p>Publication d'article</p><br>
            <!-- <p id="CA">Les plus visités</p> -->
            <form method="post" action="">
                
                    <label>Type d'article : </label>
                    <div>
                        <input type="radio" id="" name="categorie" value="Les plus visités" required >
                        <label for="">Les plus visités</label>
                    
                        <input type="radio" id="" name="categorie" value="A découvrir" required>
                        <label for="">A découvrir</label>
                    
                    </div><br>

                <input type="text" name="titre" placeholder="Titre" id="" required><br><br>
                <textarea name="descriptif" id="" cols="30" rows="10" placeholder="contenu" required></textarea><br>
                <input type="submit" value="Publier" onclick="alert('Article publié')"><br><br>
                
                 <a href="form_backoffice.php">Retour backoffice</a> 
                 
            </form><br><br>
        </div>
    
    
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
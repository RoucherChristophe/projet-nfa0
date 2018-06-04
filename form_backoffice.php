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

ini_set("display_errors",0);error_reporting(0);

include 'include/database.php';

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
    <title>ADMIN</title>
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

        <h1>Gestion du site</h1><br>
        <p id="login_user"> Bienvenu <?= $_SESSION['login']; ?> </p>
        <p id="login_user"><a href="include/destruction_session.php"><button class ="bouton">Déconnection</button></a></p>
        
       
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
                <input type="submit" value="Publier">
            </form><br><br>
            <?php if (!isset($erreur)) {  ?>
                <script> alert("Article publié") </script>
            <?php ; } ?>
        </div>
           
        

    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
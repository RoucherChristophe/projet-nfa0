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

$article = $db->query('SELECT * FROM content');


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
        
       <br/> 
       <h2> Que souhaitez-vous faire ?</h2>
       <br/>
        <h4><a href="message.php"> Consulter vos messages </a></h4>
       <br/>
        <h4><a href="creationArticle.php"> Créer un article </a></h4>
    <br/>
    <h4>Modifier ou supprimer un article</h4>
    <h4>Liste des articles :</h4>
    <br/>
   <ul>
    <?php 
    while ($a = $article->fetch()) { 
       ?>
      <!-- on créer le lien vers les articles en récupérant l'id de la bdd  -->
       <li class="liBackoff"><?= $a['titre']  ?> | 
       <a href="articlemodif.php?edit=<?= $a['id'] ?>">Modifier</a> | 
       <a href="supprimer.php?id=<?= $a['id'] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>  
        </li>  
    
       <?php
                                   }  ?>
      
   </ul>    
</div>
    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
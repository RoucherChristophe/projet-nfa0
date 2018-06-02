<?php 

  $expiration = 365*24*3600; // J'initialise la variable expiration d'1 an
  setcookie ('msg', 'Bienvenue', time()+$expiration); // Je génère le cookie

session_start();

if (!isset($_SESSION['countArtA'])) {
  $_SESSION['countArtA'] = 0;
} else {
  $_SESSION['countArtA']++;
}

include 'include/database.php';

if(isset($_GET['id']) AND !empty($_GET['id'])) {
  $get_id = htmlspecialchars($_GET['id']);

  $articles = $db->prepare('select * from content where categorie="Les plus visités" and id = ?');
  $articles->execute(array($get_id));

  if($articles->rowCount() == 1) {
    $articles = $articles->fetch();
    $titre = $articles['titre'];
    $descriptif = $articles['descriptif'];

  } else {
      die ('Cet article n\'existe pas !');
  }
} else {
    die('Erreur');
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Article A</title>
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
  <br>
  <h1 class="souligne">Les plus visités</h1><br>
    
  <div id="cookie">
    <h3> <?php               
      if ($_SESSION['countArtA'] == 0) {
        echo $_COOKIE['msg']; 
      }   ?>
    </h3>
              
  </div>
  <hr><br>
     
  <?php
    if ($titre == 'Le Chateau de Chamborg') {
      ?>
      <img src="img/Chambord2.png" alt="Image du chateau de Chamborg">
      <?php
      
    if ($titre == 'Le château de Chenonceau') {
      ?>
      <img src="img/Chenonceau2.png" alt="Image du chateau de Chenonceau">
      <?php
    }
    if ($titre == 'Le chateau de Cheverny') {
      ?>
      <img src="img/Cheverny2.png" alt="Image du chateau de Cheverny">
      <?php
    }
    if ($titre == 'Le chateau d\'Azay-le Rideau') {
      ?>
      <img src="img/azaylerideau2.png" alt="Image du chateau d' Azay-le-rideau">
      <?php
    } ?>
   
    <h2><?php echo $titre ?></h2><br>
    <p><?php echo $descriptif ?></p><br><hr>
  </div>

  <!-- footer -->
  <?php include 'include/footer.php' ?>

</body>
</html>
 
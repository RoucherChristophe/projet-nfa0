<?php

	$expiration = 365*24*3600; // J'initialise la variable expiration d'1 an
	setcookie ('msg', 'Bienvenue', time()+$expiration); // Je génère le cookie

session_start();

if (!isset($_SESSION['countCont'])) {
  $_SESSION['countCont'] = 0;
} else {
  $_SESSION['countCont']++;
}

ini_set("display_errors",0);error_reporting(0);


include 'include/database.php';

if(isset($_POST['sujet_message'], $_POST['nom_prenom'], $_POST['tel'], $_POST['mail'], $_POST['message'])) {
    if(!empty($_POST['sujet_message']) and !empty($_POST['nom_prenom']) and  !empty($_POST['tel']) and !empty($_POST['mail']) and !empty($_POST['message'])) {

        $sujet_message = htmlspecialchars($_POST['sujet_message']);
        $nom_prenom = htmlspecialchars($_POST['nom_prenom']);
        $tel = htmlspecialchars($_POST['tel']);
        $mail = htmlspecialchars($_POST['mail']);
        $message = htmlspecialchars($_POST['message']);

       
        header('Location: reception.php');

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
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />    
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119438889-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119438889-1');
    </script>


</head>

<body>
    <!-- header -->
    <?php include 'include/header.php' ?>
    <!-- menu -->
    <?php include 'include/menu.php' ?>


    <div class="container">

    <h1>Contact</h1><br>
    
     <div id="cookie">
             <h3>
              <?php               
            if ($_SESSION['countCont'] == 0) {
               echo $_COOKIE['msg']; 
            }  
            ?>
       </h3>
        </div>
    
    <div id = "formulaire">
        <p>Remplir le formulaire pour vous mettre en relation avec nous.</p> <br>
           
            <form method="POST" action= "reception.php">
                    
                    <fieldset>
                        <legend>&nbsp Sujet du message &nbsp</legend>
                        <div>
                            <input type="radio" id="" name="sujet_message" value="Demande de contact" checked="checked" required >
                            <label for="">Demande de contact</label>
                        
                            <input type="radio" id="" name="sujet_message" value="Demande d'informations" required>
                            <label for="">Demande d'informations</label>
                        
                            <input type="radio" id=""name="sujet_message" value="Suggestion d'amélioration" required >
                            <label for="">Suggestion d'amélioration</label>
                        </div><br>
                    </fieldset>
                <!-- <label class="contact">Nom et prénom : </label> -->
                <input type="text" name="nom_prenom" placeholder="Nom et prénom"  required><br>
                <!-- <label class="contact">Téléphone : </label> -->
                <input type="text" name="tel" placeholder="Téléphone"><br>
                <!-- <label class="contact">Mail : </label> -->
                <input type="text" name="mail" placeholder="mail" required ><br>
                <label class="">Contenu du message : </label><br>
                <textarea name="message" cols="40" rows="6" placeholder="contenu du message"  required></textarea><br>
                <button type="submit">Envoyer</button> <button type="reset">Effacer</button>

            </form>

    </div>
    <?php if(isset($erreur)) { echo $erreur; } ?>
    
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
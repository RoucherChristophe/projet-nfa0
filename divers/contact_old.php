<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact</title>
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

    <h1>Contact</h1><br>
    
    <div id = "formulaire">
        <p>Remplir le formulaire pour vous mettre en relation avec nous.</p> <br>
    <form action="insert_mail.php" method="POST">
            <label>Sujet du message : </label>
            <div>
                <input type="radio" id="" name="sujet_message" value="Demande de contact">
                <label for="">Demande de contact</label>
            
                <input type="radio" id="" name="sujet_message" value="Demande d'informations">
                <label for="">Demande d'informations</label>
            
                <input type="radio" id=""name="sujet_message" value="Suggestion d'amélioration">
                <label for="">Suggestion d'amélioration</label>
            </div><br>
        <!-- <label class="contact">Nom et prénom : </label> -->
        <input type="text" name="nom_prenom" placeholder="Nom et prénom" ><br>
        <!-- <label class="contact">Téléphone : </label> -->
        <input type="text" name="tel" placeholder="Téléphone"><br>
        <!-- <label class="contact">Mail : </label> -->
        <input type="text" name="mail" placeholder="mail" ><br>
        <label class="">Contenu du message : </label><br>
        <textarea name="message" cols="60" rows="10" placeholder="contenu du message" ></textarea><br>
        <button type="submit">Envoyer</button> <button type="reset">Effacer</button>

    </form>
    </div>
    
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
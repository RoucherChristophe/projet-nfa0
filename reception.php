<?php
include 'include/database.php';

$result = $db->query('SELECT date_envoi FROM message ORDER BY id DESC limit 1');
$date = $result->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mail envoyé</title>
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

    <h1>Opération réussie</h1><br>
    <p>Message envoyé</p>
    <br>
    
    <?php
    
// Sécurité pour éviter les caractères spéciaux
        $sujet = $_POST['sujet_message'];
        $nom = $_POST['nom_prenom'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $message = $_POST['message'];
  
        // liste des caractères autorisés
        $pattern = '/^[a-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ<>+"&()=?`^!$_:;,[\]]*$/i';
    
        // liste des caractères interdit
        $carinterdit = array("%", "{", "}");
    
   //on compare avec la liste des caractères autorisés si le nom contient les caracères % {} 
if ((!preg_match($pattern, $nom)) || (!preg_match($pattern, $tel)) || (!preg_match($pattern, $message))) { 
    
    //si ils contiennent un caractère interdit on le supprime 
    $resultNom = str_replace($carinterdit, "", $nom);    
    $resultTel = str_replace($carinterdit, "", $tel); 
    $resultMessage = str_replace($carinterdit, "", $message); 
    
    // affichage du message d'erreur
    echo ('Les caractères non souhaités { } % ont été supprimés de votre message');
    echo '<br/>';
    ?>
    <br>
    <!-- affichage des informations  -->
    <p>
                 Nom et Prénom : <?php echo $resultNom;  ?>
            </p>
            <br>
            <p>
                 Téléphone :   <?php echo $resultTel;  ?>
            </p>          
            <br>
            <p>
                 Email :   <?php echo $_POST['mail'];  ?>
            </p>      
            <br>
            <p>
                Message : 
            </p>
            <p>
                <textarea name="message" cols="40" rows="6" value="">
                  <?php echo $resultMessage;  ?>
                </textarea>
            </p>
            <br>
            <p>
                 Heure de reception du message :   <?php echo date(' H:i:s ');;  ?>
            </p>   
            
            <?php
     $ins_mail = $db->prepare('insert into message (sujet_message, nom_prenom, tel, mail, message, date_envoi)
        values (?, ?, ?, ?, ?, now())');
        $ins_mail->execute(array($sujet, $resultNom, $resultTel, $mail, $resultMessage));

    }
    else {
?>
            <p>
                 Nom et Prénom : <?php echo $_POST['nom_prenom'];  ?>
            </p>
            <br>
            <p>
                 Téléphone : <?php echo $_POST['tel'];  ?>
            </p>          
            <br>
            <p>
                 Email :   <?php echo $_POST['mail'];  ?>
            </p>         
            <br>
            <p>
                Message :
           </p>
            <p> 
                <textarea name="message" cols="40" rows="6" value="">
                  <?php echo $_POST['message'];  ?>
                </textarea>
            </p>
            <br>
            <p>
                   Heure de reception du message :   <?php echo date(' H:i:s ');;  ?>
            </p>
        
           <?php
     $ins_mail = $db->prepare('insert into message (sujet_message, nom_prenom, tel, mail, message, date_envoi)
        values (?, ?, ?, ?, ?, now())');
        $ins_mail->execute(array($sujet, $nom, $tel, $mail, $message));
    }

            ?> 
    </div>
       

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
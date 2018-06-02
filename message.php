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

$result = $db->query('SELECT * FROM message ORDER BY id DESC limit 10');

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

        <h1>Consultation des messages</h1><br>
        
        <table>
   <tr>
       <th> Nom/Prénom </th>
       <th>Téléphone</th>
       <th>Sujet du message</th>
       <th>Message</th>
       <th>Email</th>
       <th>Heure de reception</th>

   </tr>
   
<?php
    while ($msg = $result->fetch()){
        ?>
        <tr>
        <td><?php echo $msg['nom_prenom'];?></td>
        <td><?php echo $msg['tel'];?></td>
        <td><?php echo $msg['sujet_message'];?></td>
        <td><?php echo $msg['message']?></td>
        <td><?php echo $msg['mail'];?></td>
        <td><?php echo $msg['date_envoi'];?></td>
    </tr>
       <?php } ?>
    
   
</table>
       <br/>
       <br/>
        <button><a href="envoi_fichierCSV.php" id="aButton">
       Télécharger fichier csv
        </a></button>
        
</div>
    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
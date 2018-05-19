<?php
include 'include/database.php';
 
$sujet_message=$_POST['sujet_message'];
$nom_prenom=$_POST['nom_prenom'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$message=$_POST['message'];

var_dump($_POST);



// //On prépare la requête
// $requete = $db->prepare('INSERT INTO message (sujet_message, nom_prenom, tel, mail, message, date,) VALUES(:sujet_message,:nom_prenom,:tel,:mail,:message,:now())');
// // On lie les variables définie au-dessus au paramètres de la requête préparée
// $requete->bindValue(':sujet_message', $sujet_message, PDO::PARAM_STR); 
// $requete->bindValue(':nom_prenom', $nom_prenom, PDO::PARAM_STR);
// $requete->bindValue(':tel', $tel, PDO::PARAM_STR); 
// $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
// $requete->bindValue(':message', $message, PDO::PARAM_STR);

// //On exécute la requête
// $requete->execute();
// header('Location: mail_envoye.php');   // redirection vers la page voulu

?>

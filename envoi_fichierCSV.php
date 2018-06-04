<?php
/// header pour créer le téléchargement
header('Content-Type: text/csv');
// header pour donner un nom au fichier
header('Content-Disposition: attachment; filename="message.csv"');



// connexion à la BDD
include 'include/database.php';

// requète préparer
$req = $db->prepare('SELECT * FROM message');
$req->execute();
$data = $req->fetchAll();


// affichage html
?>"id";"nom/prenom";"tel";"sujet message";"message";"email";"date reception"<?php
// on parcours tous les éléments du tableau pour récupérer toutes les données
foreach($data as $d) {
    // on affiche ligne par ligne
    echo "\n".'"'.$d['id'].'";"'.$d['nom_prenom'].'";"'.$d['tel'].'";"'.$d['sujet_message'].'";"'.$d['message'].'";"'.$d['mail'].'";"'.$d['date_envoi'].'"';  
}
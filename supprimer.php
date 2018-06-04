<?php
include 'include/database.php';

// on récupère l'id de edit du lien modifier
if (isset($_GET['id']) AND !empty($_GET['id'])) {
   
    $supp_id = htmlspecialchars($_GET['id']);
    
    $supp = $db->prepare('DELETE FROM content WHERE id = ?');
    $supp->execute(array($supp_id));
    
    // retour vers l'acceuil 
    header('location: form_backoffice.php');
        
    } 
 if (!isset($erreur)) {  ?>
                <script> alert("Article publié") </script>
            <?php ; } 

<?php include 'include/database.php';

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $articles = $db->prepare('select * from content where categorie="A découvrir" and id = ?');
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
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les châteaux à découvrir</title>
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

    <h1>Les châteaux à découvrir</h1><br><br><hr><br>
    <h2><?php echo $titre ?></h2><br>
    <p><?php echo $descriptif ?></p><br><hr>
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
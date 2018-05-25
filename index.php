<?php include 'include/database.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Accueil</title>
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

        <h1>Bienvenue sur notre site sur les châteaux de la Loire</h1><br>
        <div id = "img_index">
            <img src="img/Cheverny3.png" alt="Image du château de Cheverny">
        </div><br><br>
        <div id = "description_index">
        <p>L'expression châteaux de la Loire regroupe sous une même appellation touristique un ensemble de châteaux français situés dans le Val de Loire. Le territoire connu sous le nom de comté de Tours est âprement disputé entre le Xe siècle et le XIe siècle par la maison féodale blésoise et la maison d'Anjou ; cette guerre sera à l'origine de très nombreux châteaux du val de Loire actuels1. Les châteaux de la Loire ont la particularité d'avoir été, pour la plupart, bâtis ou fortement remaniés à la Renaissance française (XVe-XVIes.), à une époque où la cour des rois de France était installée dans cette région. La notion de châteaux de la Loire revêt principalement une acception touristique, liée à cette exceptionnelle densité de monuments à visiter. Toutefois ils ont la particularité architecturale d'être pour la plupart2 construits en tuffeau turonien ou en brique avec chaînages en tuffeau.</p>
        <p>Source : wikipedia.org</p>
        </div>
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
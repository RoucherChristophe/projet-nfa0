<?php include 'include/database.php';

$articles = $db->query('select * from content where categorie="Les plus visités" order by id desc');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Catégorie A</title>
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

        <h1>Catégorie A</h1><br>
        <h2>Les plus visités</h2><br>
        <div class="article_titre">
            <?php while($a = $articles->fetch()) { 
                 ?> <br><a href="articleA.php?id= <?php echo $a['id'] ?> "> <?php echo $a['titre']?> </a><br><br><hr>
           <?php } ?>
        </div>
   

    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
<?php 

$expiration = 365*24*3600; // J'initialise la variable expiration d'1 an
	setcookie ('msg', 'Bienvenue', time()+$expiration); // Je génère le cookie

session_start();

if (!isset($_SESSION['countPA'])) {
  $_SESSION['countPA'] = 0;
} else {
  $_SESSION['countPA']++;
}

include 'include/database.php';

$articles = $db->query('select * from content where categorie="Les plus visités" order by id desc LIMIT 0, 5');

$tabId = array();
$tabTitre = array();

  while ($infos = $articles->fetch()) 
  {    
     array_push($tabId, $infos['id']);
     array_push($tabTitre, $infos['titre']);
  }           

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les plus visités</title>
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


     <div class="containerP">

        <br><br><br>
        
        <div id="cookie">
         <h3>
     <?php                
            if ($_SESSION['countPA'] == 0) {
               echo $_COOKIE['msg']; 
            }   
        ?>
       </h3>
        </div>
        
        <h1 class="txt_align, souligne">Les principaux châteaux royaux</h1><br>
        
        <div>
            <p class="txt_align">La vallée de la Loire, connue comme « Le Jardin de la France » a été la résidence favorite des Rois de France durant la Renaissance. Ce sont des édifices pour la plupart bâtis ou fortement remaniés à la renaissance française, à un moment où le pouvoir royal était situé sur les rives du fleuve, de ses affluents où à proximité de ceux-ci (XVe et XVIe siècles). La plupart des châteaux puisent néanmoins leurs origines dans le Moyen Âge dont ils conservent des traits architecturaux importants. La concentration en monuments remarquables dans cette région a justifié le classement du Val de Loire en patrimoine mondial de l'humanité par l'UNESCO.</p>
            
        </div>
        <br>
        <div class="imgChateau">
            <img class="imgPage" src="img/amboise.png" alt="Image du chateau d'Aboise'">
            <img class="imgPage" src="img/Chambord.png" alt="Image du chateau de Chamborg">
            <img class="imgPage" src="img/Chenonceau.png" alt="Image du chateau de Chenonceau">
        </div>
        
        <div class="article_titre">
            <?php while($a = $articles->fetch()) { 
                 ?> <br><a href="articleA.php?id= <?php echo $a['id'] ?> "> <?php echo $a['titre']?> </a><br><br><hr>
           <?php } ?>
        </div>
        
   <div>
        <ul>   
          <div class="imgChateau">
            <li> 
             <a href="articleA.php?id= <?php echo $tabId[0]; ?> "> 
              <h3 class="txt_align"><?php if (!isset($tabTitre[0])) { echo " ";} else {echo $tabTitre[0];}  ?></h3> <br>   </a>
            </li>
            </div>
               
                         
           <div class="imgChateau">
            <li>  
             <a href="articleA.php?id= <?php echo $tabId[1]; ?> ">   
              <h3 class="txt_align"><?php if (!isset($tabTitre[1])) { echo " ";} else {echo $tabTitre[1];}  ?></h3> <br>                       
                  
               </a>           
               </li>
            </div>
            
            <div class="imgChateau">
            <li>  
             <a href="articleA.php?id= <?php echo $tabId[2]; ?> "> 
              <h3 class="txt_align"><?php if (!isset($tabTitre[2])) { echo " ";} else {echo $tabTitre[2];} ?></h3> <br>          
                  
                </a> 
            </li>
            </div>            
            
            <div class="imgChateau">
            <li>
             <a href="articleA.php?id= <?php echo $tabId[3]; ?> ">  
              <h3 class="txt_align"><?php if (!isset($tabTitre[3])) { echo " ";} else {echo $tabTitre[3];} ?></h3> <br>           
                </a>
            </li>
            </div>
            
            <div class="imgChateau">
            <li>
             <a href="articleA.php?id= <?php echo $tabId[4]; ?> ">  
              <h3 class="txt_align"><?php if (!isset($tabTitre[4])) { echo " ";} else {echo $tabTitre[4];} ?></h3> <br>           
                </a>
            </li>
            </div>
            
        </ul>
        </div>
           

    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>

</body>
</html>
 
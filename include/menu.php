<div class="menu">
        <div id="admin">     
        <?php
            if(isset($_SESSION['login'])) {
                ?>
                
                <div >
                <a href="include/destruction_session.php">    <button class ="bouton">Déconnexion</button>  </a>
                <h3 class ="log_menu"><?= $_SESSION['login']; 
                if (isset($_SESSION['login'])) {
                    ?>
                    <br><br>
                    <a href="form_backoffice.php">retour backoffice</a>
                    <?php
                } ?> </h3>
                
                </div>
          
              <?php
             } else {
                ?>               
               <a href="admin.php"> <button class ="bouton">Connexion</button> </a>
                <?php
            }          
            ?>         
        
        </div>
   
    <nav class="nav_menu">
        <ul id="nav">
            <li><a href="index.php" title="Aller a l'accueil">Accueil</a></li>
            <li><a href="pageA.php" title="Les sites les plus visités">Les plus visités</a></li>
            <li><a href="pageB.php" title="Les sites à découvrir">A découvrir</a></li>
            <li><a href="contact.php" title="Nous contacter">Contact</a></li>
        </ul>
    </nav>
    </div>            
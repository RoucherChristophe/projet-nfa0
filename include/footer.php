<footer class="footer">
<?php
$requete = $db->query("SELECT nom,login FROM user where id!='4'");
?>
    <div id = "credits">
        <p>Conception:
        <?php
        while($resultat = $requete->fetch())
        { ?>
            <? echo $resultat['login']. " " .$resultat['nom']. " "; ?>
        <?php
        }
        ?>
        </p>
        <a id="mentions" href="mentions_legales.php">Mention Légales</a>

    </div>
    <div id ="footer_description">
        <p id="descrisption_footer"> &copy; 2018. Project CNAM NFA083-NFA0XX</p>
    </div>
</footer>


<?php
// Initialisation de la session.
// Si vous utilisez un autre nom
// session_name("autrenom")
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_unset($_SESSION['count']);
session_unset($_SESSION['countPA']);
session_unset($_SESSION['countPB']);
session_unset($_SESSION['countArtA']);
session_unset($_SESSION['countArtB']);
session_unset($_SESSION['countCont']);

// Finalement, on détruit la session.
session_destroy();
header('Location: ../index.php');   // redirection vers la page voulu
?>
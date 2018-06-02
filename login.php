<?php
    include 'include/database.php';
    global $db;

    

    if(isset($_POST['formlogin']))
    {
        extract($_POST);

        $login = htmlspecialchars($_POST["login"]);   // test pour faille xss
        $password = htmlspecialchars($_POST["password"]);  // test pour faille xss


        if(!empty($login) && !empty($password))
        {
            $q = $db->prepare("SELECT * FROM user WHERE login = :login");
            $q->execute(['login' => $login]);
            $result = $q->fetch();

            if($result == true)
            {
                // le compte existe bien

                if(password_verify($password, $result['password']))
                {
                    session_start();   // ouverture de la session
                    $_SESSION['login'] = $login;   // enregistrement de l identifiant
                    header('Location: /form_backoffice.php');   // redirection vers la page voulu
                    exit();    // le mettre apres un header
                }
                else
                {
                    echo "L'identifiant ou le mot de passe n'est pas correcte";
                    
                }
            }
            else
            {
                echo "L'identifiant ou le mot de passe n'est pas correcte";

                // echo "l'identifiant " . $identifiant . " n'existe pas";
                
            }
        }
        else 
        {
            echo "Veuillez compléter l'ensemble des champs";
        }
    }

?>
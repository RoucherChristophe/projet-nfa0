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
            header('Location: form_backoffice.php');   // redirection vers la page voulu
            exit();    // le mettre apres un header
          }
          else
          {
            $erreur = "L'identifiant ou le mot de passe n'est pas correcte";
          }
        }
        else
        {
          $erreur = "L'identifiant ou le mot de passe n'est pas correcte";                
        }
      }
      else 
      {
        echo "Veuillez compléter l'ensemble des champs";
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin</title>
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

    <h1>Page d'identification</h1><br>

      <div class="ident_user">
        <p> Merci de vous identifier </p> <br/>
          
          <form method="POST" action=""> 
                
            Identifiant : <br><input type="text" name="login" required> <br/>
            Mot de passe : <br><input type="password" name="password"   required> <br/><br>
            <input type="submit" name="formlogin" value="Se connecter"> <br/>
            
          </form>
          <br><br>
          <?php if(isset($erreur)) { echo $erreur; } ?>

      </div> 

  </div>

  <!-- footer -->
  <?php include 'include/footer.php' ?>

</body>
</html>
 
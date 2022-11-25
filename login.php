<?php

    /**
     * !! Première chose à faire - session_start()
     * On démarre la session toujours en début de script. 
     * Dans la session, nous allons y stocker des infos de la personne connectée.  
     */
    session_start(); 

    /**
     * On peut récupérer le nom du script actuel, de manière dynamique
     * 
     * $_SERVER["PHP_SELF"]
     */    
    // $nomScriptActuel = $_SERVER["PHP_SELF"]; 

    
    $connexionEnCours = isset($_POST["eml"], $_POST["pass"]);

    if($connexionEnCours){
        
        /***** Traitement de la connexion 
        * Si nous sommes ici -> c'est parce l'utilisateur a cliqué sur le bouton "connexion"
        */
        $emlLogin = $_POST["eml"];
        $passLogin = $_POST["pass"];

        // echo "email received: $emlLogin - password received: $passLogin";
        include_once 'StagiaireModel.php';
        $dataStagModel = new StagiaireModel();
        $stag = $dataStagModel->getStagiaireWithEmail($emlLogin);


        if($stag){ //si $stag différent de NULL
            //Comparaison de mots de passse

            if(password_verify($passLogin, $stag->motDePasse)){
                //ok pour se connecter-> les mots de passe correspondent
                $_SESSION["if3-user-email"] = $emlLogin;
                $_SESSION["if3-user-nom"] = $stag->nom; 
                //... possible de retenir plus d'informations si besoin :) 

                /**
                 * on redirige vers la page d'accueil qui se comportera autrement: accueillera la personne connectée
                 */
                header("location:index.php");
 

            }else{
                //même si stagiaire trouvées, mots de passe ne correspondent pas
                $passwordNotMatch = true;  

            }

        }else {// $stag == NULL , pas trouvé de stagiaire avec cet email
            $userNotExist = true;
        }


        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion - IF3</title>
</head>
<body>

<h2 id="connexion">Connectez-vous pour continuer</h2>



<!-- <form action=<?php // echo $nomScriptActuel; ?> method="post">

    <p>
        <label for="id_email">Votre email: </label> <br>
        <input type="email" name="eml" id="id_email">
    </p>
    
    <p>
        <label for="id_password">Votre mot de passe:</label> <br>
        <input type="password" name="pass" id="id_password">
    </p>

</form> -->

<!-- 
Si on ne met rien dans action, traitement dans le script actuel  -->
<form id="form_connection" action="" method="post">

    <div id="form_elem_connection">
        <p>
            <label for="id_email">Votre email: </label> <br>
            <input type="email" name="eml" id="id_email">
        </p>
        
        <p>
            <label for="id_password">Votre mot de passe:</label> <br>
            <input type="password" name="pass" id="id_password">
        </p>

        <p>
            <input type="submit" value="Connexion">
        </p>

    </div>
</form>

    <p class="error">
            <?php
                if(isset($passwordNotMatch) && $passwordNotMatch ){
                    echo "les mots de passe ne correspondent pas";
                }
                if(isset($userNotExist) && $userNotExist ){
                    echo "Nous n'avons pas trouvé de stagiaire avec cet email";
                }
            ?>
        </p>

<?php
    include_once ("footer.html");
?>
    
</body>
</html>

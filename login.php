<?php
    /**
     * On peut récupérer le nom du script actuel, de manière dynamique
     * 
     * $_SERVER["PHP_SELF"]
     */    
    // $nomScriptActuel = $_SERVER["PHP_SELF"]; 

    //***** Traitement de la connexion  */
    $connexionEnCours = isset($_POST["eml"], $_POST["pass"]);

    if($connexionEnCours){

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

                
            }else{
                //même si stagiaire trouvées, mots de passe ne correspondent pas


            }

        }else {// $stag == NULL , pas trouvé de stagiare avec email
            echo "<p></p>";
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

    <?php
            include_once ("footer.html");

    ?>
    
</body>
</html>

<?php
    session_start();
    $isConnected = isset($_SESSION["if3-user-email"]);

    //!$isConnected équivalent à $isConnected == false
    if(!$isConnected){ 
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Interface3 - Home</title>
</head>
<body>
        <?php
            include("entete.html");

            include("nav.php");
        ?>
    
        <div class="toTheRight">
                 Coucou <?php echo $_SESSION["if3-user-nom"] ?>
                 <a href="logout.php">Se déconnecter</a>
        </div>
        
        <?php

            if(isset($_GET["page"])){
                $maPage= $_GET["page"];

                switch ($maPage) {
                    case 'formation':
                        /**
                         * Importation, inclusion des fonctionnalités sur l'accès aux données de formations (dans la base de données)
                         */
                        include_once("FormationModel.php"); 
                        $model = new FormationModel();
                        $toutesFormations = $model->getAllTrainings(); 
                        include("formations.php");
                        break;

                    case 'recrutement':
                        include("recrutement.html");
                        break;

                    case 'sensibiliser':
                        include("sensibiliser.html");
                        break;
                    
                    case 'contact':
                        include("contact.html");
                        break;

                    default:
                        include("welcome.php");
                        break;
                }   


            }else {
                include("welcome.php");
            }



            include_once("footer.html");

        ?>


</body>
</html>
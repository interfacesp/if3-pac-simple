<?php
    /**
     * Traitement inscription ici 
     */
    $soumissionFormulaire = isset(
        $_POST["nom"], 
        $_POST["prenom"],
        $_POST["naissance"],
        $_POST["email"],
        $_POST["numNational"]); 

    if($soumissionFormulaire){
        include_once "StagiaireModel.php";

        $nom = $_POST["nom"]; 
        $prenom = $_POST["prenom"];
        $naissance = $_POST["naissance"];
        $email = $_POST["email"];
        $numNational = $_POST["numNational"];
        $receivedPassword = $_POST["pass"];

        // echo "Nom: $nom";
        // echo "Prenom: $prenom";
        // echo "Email: $email"; 
        // echo "Num national: $numNational";
        // echo "Date naissance: $naissance";


        $nouvStag  = new Stagiaire($numNational,$nom,$prenom,$naissance,$email,$receivedPassword);

        $model = new StagiaireModel();
        $model->inscrire($nouvStag);

        header("Location:index.php");
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription - Interface3</title>
</head>
<body>

<?php include_once 'entete.html'; ?>

<h1>Inscrivez-vous</h1>

<div class="centrage">
    <form action="" method="post">

    <label for="id_nom">Votre Nom: </label> <br>
    <input type="text" name="nom" id="id_nom">

    <br><br>

    <label for="id_prenom">Votre prénom: </label> <br>
    <input type="text" name="prenom" id="id_prenom">

    <br><br>

    <label for="id_birth">Date de naissance</label>
    <input type="date" name="naissance" id="id_birth">

    <br><br>
    <label for="id_email">Email: </label> <br>
    <input type="email" name="email" id="id_email">

    <br><br>

    <label for="id_pass">Choisissez un mot de passe: </label> <br>
    <input type="password" name="pass" id="id_pass">

    <br><br>

    <label for="id_Num">Numéro National: </label> <br>
    <input type="text" name="numNational" id="id_Num">

    <br><br>

    <input type="submit" value="Confirmer Inscription">

    </form>
</div>


<?php include 'footer.html'; ?>
    
</body>
</html>
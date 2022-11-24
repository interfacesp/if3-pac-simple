<?php

$envoiFormulaire = isset($_POST["nom"],$_POST["email"],$_POST["message"]);

if($envoiFormulaire){
    //cela veut dire qu'on nous a envoyé un message

    $nomRecu = $_POST["nom"];
    $emailRecu = $_POST["email"];
    $messageRecu = $_POST["message"];
    

    echo "<h2>Cette page a reçu comme information</h2>"; 
    echo "<p>Nom: $nomRecu</p>";
    echo "<p>Email: $emailRecu</p>"; 
    echo "<p> Message: $messageRecu</p>";
}

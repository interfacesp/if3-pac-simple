<?php


class Stagiaire {

    public string $numNational; 
    public string $nom; 
    public string $prenom;
    public string $dateNaissance; 
    public string $email; 
    public string $motDePasse;
    
    
    function __construct(string $nn, //numéro national 
                        string $unNom, //un nom 
                        string $unPrenom, //un prénom 
                        string $birthDate,  // une date de naissance
                        string $unEmail,  // un email
                        string $unPassword) // un mot de passe
    {
        $this->numNational = $nn;
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->dateNaissance = $birthDate;
        $this->email = $unEmail;
        $this->motDePasse = $unPassword;
    }

}
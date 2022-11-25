<?php 
include_once 'DBConnection.php';
include_once 'Stagiaire.php';

class StagiaireModel {


    public DBConnection $myConnection; 
    private PDO $myPDO; 

    /**
     * Constructur -> pour initialiser l'objet
     */
    function __construct()
    {
        $this->myConnection = new DBConnection("IF3");
        $this->myPDO= $this->myConnection->open();
    
    }

    /**
     * Destructeur
     */

    function __destruct()
    {
        $this->myConnection->close();
    }

    /**
     * Méthode pour demander à la base de données 
     * de nous renvoyer un.e Stagiaire dont l'email 
     * est passé en paramètre
     */
    function getStagiaireWithEmail(string $email): Stagiaire {
        
        $emailParam = trim($email);

        $query= "
                SELECT * 
                FROM stagiaire
                WHERE email=?;

         ";
        $request= $this->myPDO->prepare($query);
        $request->execute([$emailParam]);
        $result = $request->fetchAll();
        
        $nombreStagiaires = count($result);

        if($nombreStagiaires == 0 ){
            return new Stagiaire("","","","","",""); 
        }

        return new Stagiaire(
            $result[0]["numero_national"],
            $result[0]["nom"],
            $result[0]["prenom"],
            $result[0]["date_naissance"],
            $result[0]["email"],
            $result[0]["password"]
        );


    }



}


   



    
   
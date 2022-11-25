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
    function getStagiaireWithEmail(string $email) {
        
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
            return NULL;
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


    function inscrire(Stagiaire $nouvStagiaire) : void{

        /**
         * Avant de sauvegarder mot de passe, on le nettoie (enlever espaces) et le crypte
         */
        $mdpForDB = trim($nouvStagiaire->motDePasse);
        $hashMotDePasse= password_hash($mdpForDB, PASSWORD_DEFAULT); 

        $query= "
                INSERT INTO stagiaire(numero_national,nom,prenom,date_naissance,email,password) 
                VALUES(?,?,?,?,?,?); 
        "; 
        
        try {

                $request= $this->myPDO->prepare($query);
                $request->execute([
                    $nouvStagiaire->numNational,
                    $nouvStagiaire->nom,
                    $nouvStagiaire->prenom,
                    $nouvStagiaire->dateNaissance,
                    $nouvStagiaire->email,
                    $hashMotDePasse //on stocke le hash du mot de passe en clair
            ]);

        }catch (PDOException $exception){
            die("erreur dans l'insertion : $exception->getMessage()");
        }

       


    }



}


   



    
   
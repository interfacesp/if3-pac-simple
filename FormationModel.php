<?php 
include_once 'DBConnection.php';
include_once 'Formation.php';

class FormationModel {


    public DBConnection $myConnection; 
    private PDO $myPDO; 

    function __construct()
    {
        $this->myConnection = new DBConnection("IF3");
        $this->myPDO= $this->myConnection->open();
    
    }

    function __destruct()
    {
        $this->myConnection->close();
    }

    function getAllTrainings() : Array {
        
        $query= "
                SELECT * FROM formations;

         ";
        $request= $this->myPDO->prepare($query);
        $request->execute();
        $result = $request->fetchAll();

        $allTrainings = [];

        //Temporaire
        // echo "<pre>"; 
        // print_r($result);
        // echo "</pre>";
        //

        foreach ($result as $formation) {
            
            $objetFormation = new Formation($formation["id"],
                                            $formation["nom"], 
                                            $formation["financeur"]);

            //Autre façon de faire
            // $objetFormation->id = $formation["id"]; 
            // $objetFormation->nom = $formation["nom"];
            
           
            $allTrainings [] =  $objetFormation;

        }

        return $allTrainings;


    }


   



    
   
}
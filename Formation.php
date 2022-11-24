<?php 


class Formation {
    public int $id; 
    public string $nom;
    public string $financeur;
    // public string $financeur; 
    

    function __construct(int $anId, string $aName, string $leFinanceur )
    {
        $this->id= $anId;
        $this->nom = $aName;
        $this->financeur = $leFinanceur;
    }
   


}
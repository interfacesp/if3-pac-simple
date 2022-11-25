<h1>Bienvenue chez Inteface3</h1>

<?php
    /**
     * Ce script (welcome.php) sera inclu,injecté dans index.php
     * Comme nous avons fait session_start() dans index.php => nous aurons accès aux informations
     * de session $_SESSION
     */


    $connectedIntern = $_SESSION["if3-user-nom"]; 

    $date_du_jour = date("d-m-Y");
    $heure_actuelle = date("H:i:s"); 


    echo "<p>Bonjour $connectedIntern :) </p>";
    echo "Date du jour: $date_du_jour <br>";
    echo "Heure: $heure_actuelle";
?>

  
<p>
        Lorem ipsum <mark>dolor</mark>, sit amet consectetur adipisicing elit. Dolor aliquid iure sint vero, dignissimos, commodi hic facere, corrupti debitis expedita nihil. Ipsum earum perspiciatis nesciunt provident sapiente eos quisquam placeat?
</p>


<p>
    <strong>Lorem</strong> ipsum dolor sit amet consectetur adipisicing elit. Unde doloribus nisi, ipsam mollitia excepturi perspiciatis eaque error similique libero saepe assumenda cumque inventore velit distinctio. Autem numquam ratione officia inventore.
</p>
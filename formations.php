 <h1>Nos Formations</h1>


<?php

foreach($toutesFormations as $uneFormation){

    echo "<h4>$uneFormation->nom</h4>";
    echo "<p>Financé par: $uneFormation->financeur</p>";
}
?>


<?php

echo "<h1>Tus entradas: ". $nombre ."</h1>";


    foreach($butacas as $entrada){

        echo " Id entrada: ".$entrada["id"] . " Fila: ".$entrada["fila"] . " Columna: ".$entrada["columna"] .  "<br>";

    }


    echo "<h3>Reservas hechas por el usuario: " .$reservas["COUNT(id)"]. "</h3>"




?>
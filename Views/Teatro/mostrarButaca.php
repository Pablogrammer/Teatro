
<style>
  


</style>

<h1 class="title">BUTACAS</h1>

<form action="<?=base_url?>Butaca/comprarButacas" method="post">
    <table>
        <tr>

            <?php

            foreach($sala as $butaca){

                if($butaca->getId() % 6 !== 0){
                    if ($butaca->getEstado() == 'ocupado'){
                        echo '<td> <input type="checkbox" value= "'.$butaca->getId().'" name = "'.$butaca->getId().'" checked disabled> '.$butaca->getId().'</td>';
                    }
                    else if ($butaca->getEstado() == 'libre'){
                        echo '<td> <input type="checkbox" value= "'.$butaca->getId().'" name = "'.$butaca->getId().'"> '.$butaca->getId().'</td>';
                    }
                }else{
                    echo '</tr>';
                    echo '<tr>';

                    if ($butaca->getEstado() == 'ocupado'){
                        echo '<td> <input type="checkbox" value= "'.$butaca->getId().'" name = "'.$butaca->getId().'" checked disabled> '.$butaca->getId().'</td>';
                    }
                    else if ($butaca->getEstado() == 'libre'){
                        echo '<td> <input type="checkbox" value= "'.$butaca->getId().'"name = "'.$butaca->getId().'" > '.$butaca->getId().'</td>';
                    }
        
                }
            }

            ?>
        </tr>

    </table>

    <input type="submit" value="Comprar">  
</form>

<table>
    <tr>
        <td class="libre"><input type="checkbox" ><b>Butacas libres</b></td>
        <td class="ocupada"><input type="checkbox"  checked disabled><b>Butacas ocupadas</b></td>
    </tr>
</table>
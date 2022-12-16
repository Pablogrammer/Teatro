<?php
namespace Controllers;

use Models\Butaca;

use Lib\Pages;

class ButacaController{
    private Pages $pages;
    private Butaca $butaca;
    
    public function __construct(){
        $this->pages = new Pages();
        $this->butaca = new Butaca(0,0,0,0,'');
    }

    public function mostrarButacas(){

        $sala = $this->butaca->obtenerButacas();

        if($sala && is_object($sala[0])){

            $this->pages->render('Teatro/mostrarButaca', ['sala' => $sala]);
        }
    }

    public function comprarButacas(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_SESSION['identity']->id;
            $nombre = $_SESSION['identity']->nombre;
            $reservas = ($this->butaca->extraerReservas($id));

                if($reservas["COUNT(id)"] <= 5 && $reservas["COUNT(id)"] + sizeof($_POST) <= 5){

                    $butacas = [];
                    foreach($_POST as $id_butaca){
                        $butaca = $this->butaca->extraerButaca($id_butaca);
                        array_push($butacas, $butaca);
                    }
             
                    $this->butaca->comprarButaca($butacas, $id);
                    $this->pages->render('Teatro/mostrarEntradas', ['butacas' => $butacas, 'nombre' => $nombre, 'reservas' => $reservas]);
                }
                
                $this->mostrarButacas();
                
                
            
            
        }
    }
}


?>
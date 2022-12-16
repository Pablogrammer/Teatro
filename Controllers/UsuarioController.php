<?php
namespace Controllers;

use Models\Usuario;

use Lib\Pages;

class UsuarioController{
    private Pages $pages;
    
    public function __construct(){
        $this->pages = new Pages();
    }

    public function registro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
       
            if(isset($_POST['data'])){

                $registrado = $_POST['data'];

                $valido = Usuario::validarRegistro($registrado);
                if ($valido === true) {

                    $usuario = Usuario::fromArray($registrado);

                    $save = $usuario->save();

                    if ($save) {
                        $_SESSION['register'] = 'complete';
                    } 
                }
                else {
                    $_SESSION['register'] = 'failed';
                    $this->pages->render('usuario/registro', ['error' => $valido]);
                }
            }
        }
        $this->pages->render('usuario/registro');
    }

    public function identifica(): void {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if ($_POST["data"]) {
                $registrado = $_POST['data'];


                $valido = Usuario::validarLogin($registrado);
                if ($valido === true) {
                    $usuario = Usuario::fromArray($_POST["data"]);

                    $identity = $usuario->login();

                    if ($identity && is_object($identity)) {
                        $_SESSION["identity"] = $identity;


                        header("Location:" . base_url . "Butaca/mostrarButacas");

                    } 
                }
                else {
                    $_SESSION["error_login"] = "Identificación fallida";
                    $this->pages->render('usuario/identifica', ['error' => $valido]);
                }
            }

        }
        $this->pages->render("usuario/identifica");
    }

    
    public function logout(){
        unset($_SESSION['identity']);
        session_destroy();

    }

    public function index(){

    }
}


?>
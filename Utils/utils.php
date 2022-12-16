<?php
namespace Utils;

use Exception;

class Utils{

    public static function deleteSession(string $name) : void{
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

    }

    public static function validarNombre(string $nombre) :bool|string{
        try{
            if(strlen($nombre < 3)){
                throw new Exception('EL nombre debe de tener mas de tres caracteres');
            }
            if(!preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/',$nombre)){
                throw new Exception('El nombre solo puede contener letras');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
        return true;
    }

    public static function validarEmail(string $email) :bool|string{
        try{
            if(!preg_match('/^[\w.]+@([\w-]+\.)+[\w-]{2,4}$/',$email)){
                throw new Exception('El email debe de tener un formato valido ejemplo: ejemplo@ejemplo.es');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
        return true;
    }

    public static function validarPassword(string $password) :bool|string{
        try{
            if(strlen($password < 8)){
                throw new Exception('La contraseña debe de tener mas de tres caracteres');
            }
            if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\-_!¿?¡])[a-zA-Z0-9\.\-_?¿]{8,}$/',$password)){
                throw new Exception('La contraseña debe de contener al menos una mayuscula, una minuscula, un numero y uno de estos simbolos: -._?¿');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
        return true;
    }

}

?>
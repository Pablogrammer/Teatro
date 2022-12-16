<?php
namespace Models;

use Lib\BaseDatos;
use PDOException;
use Utils\Utils;

class Usuario {

    private string $id;
    private string $usuario;
    private string $email;
    private string $password;

    private BaseDatos $bd;

    public function __construct(string $id, string $usuario, string $email, string $password) {
        $this->bd = new BaseDatos();
        $this->id = $id;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function getUsuario(): string {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }
    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public static function fromArray(array $data): Usuario {
        return new usuario(
            $data["id"] ?? "",
            $data["user"] ?? "",
            $data["email"] ?? "",
            $data["password"] ?? "");
    }

    public function save(): bool {


        $sql = $this->bd->prepara("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password_segura)");
        $sql->bindParam(':nombre', $usuario, \PDO::PARAM_STR);
        $sql->bindParam(':email', $email, \PDO::PARAM_STR);
        $sql->bindParam(':password_segura', $password_segura, \PDO::PARAM_STR);

        $usuario = $this->getusuario();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 4]);


        try {
            $sql->execute();
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function buscaUser($nombr){
        $result = false;
        $cons = $this->bd->prepara("SELECT * FROM usuarios WHERE nombre = :nombre");
        $cons->bindParam(':nombre', $nombr, \PDO::PARAM_STR);

        try{
            $cons->execute();
            
            if($cons && $cons->rowCount() == 1){  
                $result = $cons->fetch(\PDO::FETCH_OBJ);
      
            }
        }catch(PDOException){
            
            $result = false;
        }
        
        return $result;
    }

    public function login(){
        $result = false;
        $usuario = $this->usuario;
        $password = $this->password;

        $busca_usuario = $this->buscaUser($usuario);

        if($busca_usuario !== false){
            $verify = password_verify($password, $busca_usuario->password);
            
            var_dump($password, );

            if($verify){
                $result = $busca_usuario;
            }else{

            }
            var_dump($verify);
        }

        return $result;
    }

    static function validarRegistro($datos): bool|string{
        $nombre = Utils::validarNombre($datos['user']);
        $email = Utils::validarEmail($datos['email']);
        $password = Utils::validarPassword($datos['password']);

        if($nombre === true){
            if($email === true){
                if($password === true){
                    return true;
                }else{
                    return $password;
                }
            }else{
                return $email;
            }
        }else{
            return $nombre;
        }
    }

    static function validarLogin($datos): bool|string{
        $nombre = Utils::validarNombre($datos['user']);
        $password = Utils::validarPassword($datos['password']);

        if($nombre === true){
            if($password === true){
                return true;
            }else{
                return $password;
            }
        }else{
            return $nombre;
        }
    }

    
}
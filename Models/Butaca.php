<?php

    namespace Models;
    use Lib\BaseDatos;
    use PDOException;


    class Butaca {

        private int $id;
        private int $usuario_id;
        private int $fila;
        private int $columna;
        private string $estado;
        private BaseDatos $bd;


        function __construct( int $id, int $usuario_id, int $fila, int $columna, string $estado)
        {
            $this->id = $id;
            $this->usuario_id = $usuario_id;
            $this->fila = $fila;
            $this->columna = $columna;
            $this->estado = $estado;
            $this->bd = new BaseDatos();
                        
        }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    
    public function getFila(): int {
        return $this->fila;
    }

    public function setFila(int $fila): void {
        $this->fila = $fila;
    }

    
    public function getColumna(): int {
        return $this->columna;
    }

    public function setColumna(int $columna): void {
        $this->columna = $columna;
    }

    
    public function getEstado(): string {
        return $this->estado;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    
    public function getUsuario_id(): string {
        return $this->usuario_id;
    }

    public function setUsuario_id(int $usuario_id): void {
        $this->usuario_id = $usuario_id;
    }



    public function obtenerButacas(){

        $this->bd->consulta("SELECT * FROM butacas ORDER BY id");
        return $this->extraerTodos(); 
    }

    public function extraerTodos(): ?array{

        $butaca = [];
        $butaca_datos = $this->bd->extraer_todos();

        foreach($butaca_datos as $datos){
            $butaca[] = Butaca::fromArray($datos);
        }
        return $butaca;
    }

    public function comprarButaca($array,$usuario){
        foreach($array as $butaca){
            $butaca = $butaca['id'];

            $this->bd->consulta("UPDATE `butacas` SET `usuario_id` = $usuario WHERE `butacas`.`id` = $butaca");
            $this->bd->consulta("UPDATE `butacas` SET `estado` = 'ocupado' WHERE `butacas`.`id` = $butaca");

        }

    }

    public function extraerButaca($id){

        $this->bd->consulta("SELECT * FROM `butacas` WHERE `butacas`.`id` = $id");
        return($this->bd->extraer_registro());

    }

    public function extraerReservas($id){
        $this->bd->consulta("SELECT COUNT(id) FROM butacas WHERE `butacas`.`usuario_id` = $id");
        return($this->bd->extraer_registro());
        
    }

    public static function fromArray(array $data): Butaca {
        return new Butaca(
            $data["id"] ?? 0,
            $data["usuario_id"] ?? "",
            $data["fila"] ?? "",
            $data["columna"] ?? "",
            $data["estado"] ?? "",
        );
    }

    }

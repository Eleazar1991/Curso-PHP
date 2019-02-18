<?php
require_once 'ModeloBase.php';
class Nota extends ModeloBase{
    public $usuario_id;
    public $titulo;
    public $descripcion;

    public function __construct(){
        parent::__construct();
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }

    public function getUsuario(){
        return $this->usuario_id;
    }
    public function setUsuario($usuario_id){
        $this->usuario_id=$usuario_id;
    }

    public function guardar(){
        $sql="INSERT INTO notas (titulo,descripcion,usuario_id,fecha) VALUES ('$this->titulo','$this->descripcion',$this->usuario_id,CURDATE());";
        $guardado= $this->db->query($sql);
        return $guardado;
    }
}



?>
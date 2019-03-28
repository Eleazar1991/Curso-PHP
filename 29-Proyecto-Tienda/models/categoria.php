<?php
class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre=$this->db->real_escape_string($nombre);
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getAllCategorias(){
        return $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
    }
    public function getCategoriaNombre($id){
        return $this->db->query("SELECT nombre FROM categorias WHERE id='$id';");
    }
    public function save(){
        $sql="INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}');";
        $save= $this->db->query($sql);

        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function delete(){
        $sql="DELETE FROM categorias WHERE id='{$this->getId()}';";
        $delete= $this->db->query($sql);
        var_dump($delete);
        $result=false;
        if($delete){
            $result=true;
        }
        return $result;
    }

    public function update(){
        $sql="UPDATE categorias SET nombre='{$this->getNombre()}' WHERE id='{$this->getId()}';";
        $update= $this->db->query($sql);
        $result=false;
        if($update){
            $result=true;
        }
        return $result;
    }
}
?>
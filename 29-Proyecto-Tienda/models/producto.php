<?php
class Producto{
    private $id;
    private $categoria_id;
    private $titulo;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    public function __construct(){
        $this->db=Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }

    public function getCategoriaId(){
        return $this->categoria_id;
    }
    public function setCategoriaId($categoria_id){
        $this->categoria_id=$categoria_id;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo=$this->db->real_escape_string($titulo);
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$this->db->real_escape_string($descripcion);
    }

    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }

    public function getStock(){
        return $this->stock;
    }
    public function setStock($stock){
        $this->stock=$stock;
    }

    public function getOferta(){
        return $this->oferta;
    }
    public function setOferta($oferta){
        $this->oferta=$oferta;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function getImagen(){
        return $this->imagen;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }

    public function getAllProductos(){
        return $productos=$this->db->query("SELECT * FROM productos WHERE stock>0 ORDER BY id DESC");
    }

    public function save(){
        $sql="INSERT INTO productos VALUES (NULL, '{$this->getCategoriaId()}', '{$this->getTitulo()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}', '{$this->getOferta()}', CURDATE(), '{$this->getImagen()}');";
        $save= $this->db->query($sql);

        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function delete(){
        $sql="DELETE FROM productos WHERE id='{$this->getId()}';";
        $delete= $this->db->query($sql);
        $result=false;
        if($delete){
            $result=true;
        }
        return $result;
    }

    public function update(){
        $sql="UPDATE productos SET categoria_id='{$this->getCategoriaId()}', titulo='{$this->getTitulo()}', descripcion='{$this->getDescripcion()}', precio='{$this->getPrecio()}', stock='{$this->getStock()}', oferta='{$this->getOferta()}', imagen='{$this->getImagen()}' WHERE id='{$this->getId()}';";
        echo $sql;
        $update= $this->db->query($sql);
        echo $this->db->error;
        $result=false;
        if($update){
            $result=true;
        }
        return $result;
    }

    public function getProducto($id){
        return $producto=$this->db->query("SELECT * FROM productos WHERE id=$id");
    }

    public function getRandom($limit){
        return $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
    }
    public function getProductoCategoria($categoria_id){
        return $this->db->query("SELECT * FROM productos WHERE categoria_id=$categoria_id");
    }
}




?>
<?php
class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
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

    public function setUsuarioId($usuario_id){
        $this->usuario_id=$usuario_id;
    }
    public function getUsuarioId(){
        return $this->usuario_id;
    }

    public function setProvincia($provincia){
        $this->provincia=$this->db->real_escape_string($provincia);
    }
    public function getProvincia(){
        return $this->provincia;
    }

    public function setLocalidad($localidad){
        $this->localidad=$this->db->real_escape_string($localidad);
    }
    public function getLocalidad(){
        return $this->localidad;
    }

    public function setDireccion($direccion){
        $this->direccion=$this->db->real_escape_string($direccion);
    }
    public function getDireccion(){
        return $this->direccion;
    }

    public function setCoste($coste){
        $this->coste=$coste;
    }
    public function getCoste(){
        return $this->coste;
    }

    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setHora($hora){
        $this->hora=$hora;
    }
    public function getHora(){
        return $this->hora;
    }

    public function getAllProductos(){
        return $productos=$this->db->query("SELECT * FROM productos ORDER BY id DESC");
    }

    public function save(){
        $sql="INSERT INTO pedidos VALUES (NULL, '{$this->getUsuarioId()}', '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', '{$this->getCoste()}', 'confirmado', CURDATE(), CURTIME());";
        $save= $this->db->query($sql);
        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function last_insert(){
        $sql="SELECT LAST_INSERT_ID();";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function getPedido($id){
        return $producto=$this->db->query("SELECT * FROM pedidos WHERE id=$id");
    }

    public function getProductosByPedido($id){
        $sql="SELECT productos.imagen, productos.titulo, productos.precio, lineas_pedidos.unidades
              FROM productos, lineas_pedidos 
              WHERE lineas_pedidos.pedido_id=$id AND lineas_pedidos.producto_id=productos.id;";
              return $this->db->query($sql);
              
    }
    
    public function getPedidoByUser(){
        $sql="SELECT * FROM pedidos
              WHERE usuario_id={$this->getUsuarioId()} ORDER BY id DESC LIMIT 1;";
        return $this->db->query($sql)->fetch_object();
    }

    public function getPedidoByUserId($id){
        $sql="SELECT * FROM pedidos
              WHERE usuario_id={$this->getUsuarioId()} AND id=$id;";
        return $this->db->query($sql)->fetch_object();
    }

    public function getPedidoById($id){
        $sql="SELECT pedidos.*, usuarios.nombre, usuarios.apellidos, usuarios.email FROM pedidos
              LEFT JOIN usuarios
              ON pedidos.usuario_id=usuarios.id  AND pedidos.id=$id;";
        return $this->db->query($sql)->fetch_object();
    }

    public function getPedidosByUser(){
        $sql="SELECT * FROM pedidos
              WHERE pedidos.usuario_id={$this->getUsuarioId()} ORDER BY pedidos.id DESC;";
        return $this->db->query($sql);
    }

    public function getAllPedidos(){
        $sql="SELECT * FROM pedidos;";
        return $this->db->query($sql);
    }

    public function updateState(){
        $sql="UPDATE pedidos SET estado='{$this->getEstado()}' WHERE id={$this->getId()};";
        return $this->db->query($sql);
    }
}

?>
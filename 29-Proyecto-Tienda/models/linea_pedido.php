<?php
class LineaPedido{
    private $id;
    private $pedido_id;
    private $producto_id;
    private $unidades;
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

    public function setPedidoId($pedido_id){
        $this->pedido_id=$pedido_id;
    }
    public function getPedidoId(){
        return $this->pedido_id;
    }

    public function setProductoId($producto_id){
        $this->producto_id=$producto_id;
    }
    public function getProductoId(){
        return $this->producto_id;
    }

    public function setUnidades($unidades){
        $this->unidades=$unidades;
    }
    public function getUnidades(){
        return $this->unidades;
    }

    public function save(){
        $sql="INSERT INTO lineas_pedidos VALUES (NULL, '{$this->getPedidoId()}', '{$this->getProductoId()}', '{$this->getUnidades()}');";
        $save= $this->db->query($sql);
        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }
}
?>
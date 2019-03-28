<?php
require_once 'models/pedido.php';
require_once 'models/linea_pedido.php';
require_once 'models/producto.php';
class pedidoController{
    public function do(){
       require_once 'views/pedido/do.php';
    }

    public function add(){
        if(isset($_SESSION['identity']) && isset($_POST)){
            $provincia=isset($_POST['provincia'])?$_POST['provincia']:false;
            $localidad=isset($_POST['localidad'])?$_POST['localidad']:false;
            $direccion=isset($_POST['direccion'])?$_POST['direccion']:false;
            if($provincia && $localidad && $direccion){
                $pedido=new Pedido();
                $pedido->setUsuarioId($_SESSION['identity']->id);
                $pedido->setProvincia($provincia);
                $pedido->setDireccion($direccion);
                $pedido->setLocalidad($localidad);
                $pedido->setCoste(Utils::statsCarrito()['total']);
                $save=$pedido->save();
                if($save){
                    if(isset($_SESSION['carrito'])){
                        $linea_pedido=new LineaPedido();
                        foreach($_SESSION['carrito'] as $indice=>$producto){
                            $linea_pedido->setPedidoId($pedido->last_insert()['LAST_INSERT_ID()']);
                            $linea_pedido->setProductoId($_SESSION['carrito'][$indice]['producto']->id);
                            $linea_pedido->setUnidades($_SESSION['carrito'][$indice]['unidades']);
                            $save_linea=$linea_pedido->save();
                            $miproducto= new Producto();
                            $miproducto->setId($producto['producto']->id);
                            $miproducto->setCategoriaId($producto['producto']->categoria_id);
                            $miproducto->setTitulo($producto['producto']->titulo);
                            $miproducto->setDescripcion($producto['producto']->descripcion);
                            $miproducto->setPrecio($producto['producto']->precio);
                            $miproducto->setStock($producto['producto']->stock);
                            $miproducto->setOferta($producto['producto']->oferta);
                            $miproducto->setFecha($producto['producto']->fecha);
                            $miproducto->setImagen($producto['producto']->imagen);
                            $newstock=$miproducto->getStock() - $producto['unidades'];
                            if($newstock>=0){        
                                $miproducto->setStock($miproducto->getStock()-$producto['unidades']);
                                $miproducto->update();
                            }else{
                                $_SESSION['errores']['ped-general']="No hay stock de $miproducto->nombre";
                            }  
                        } 
                    }
                    if(!empty($save_linea)){
                        $_SESSION['ped-completado']="El pedido se ha completado con exito";
                    }else{
                        $_SESSION['errores']['ped-general']="Fallo al realizar el pedido";
                    }      
                }else{
                    $_SESSION['errores']['ped-general']="Fallo al realizar el pedido";
                }
            }else{
                $_SESSION['pedido']="Failed";
                header("Location:".base_url."pedido/do");
            }
        }else{
            header("Location:".base_url);
        }
        Utils::deleteSession('carrito');
        header("Location:".base_url."pedido/confirmado");
    }
    
    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $pedido= new Pedido();
            $pedido->setUsuarioId($_SESSION['identity']->id);
            $pedido_total=$pedido->getPedidoByUser();
            $pedido_productos= new Pedido();
            $productos=$pedido_productos->getProductosByPedido($pedido_total->id);
        }    
        require_once 'views/pedido/confirmado.php';
    }

    public function one(){
        if(isset($_GET['id'])){
            $pedido= new Pedido();
            $pedido->setUsuarioId($_SESSION['identity']->id);     
            $pedido_total=$pedido->getPedidoByUserId($_GET['id']);
            $pedido_productos= new Pedido();
            $productos=$pedido_productos->getProductosByPedido($pedido_total->id);
        }    
        require_once 'views/pedido/pedido.php';
    }

    public function one_all(){
        if(isset($_GET['id'])){
            $pedido= new Pedido();     
            $pedido_total=$pedido->getPedidoById($_GET['id']);
            $pedido_productos= new Pedido();
            $productos=$pedido_productos->getProductosByPedido($pedido_total->id);
        }    
        require_once 'views/pedido/pedido.php';
    }

    public function mis_pedidos(){
        if(isset($_SESSION['identity'])){
            $pedido= new Pedido();
            $pedido->setUsuarioId($_SESSION['identity']->id);
            $pedidos_totales=$pedido->getPedidosByUser();
            $total_pedidos=array();
            $total_productos=array();
            while($pedido_total=$pedidos_totales->fetch_object()){
                array_push($total_pedidos,$pedido_total);
                $pedido_productos= new Pedido();
                $productos=$pedido_productos->getProductosByPedido($pedido_total->id);
                array_push($total_productos,$productos);    
            }
            require_once 'views/pedido/mis_pedidos.php';
        }else{
            header("Location:".base_url."producto/gestion");
        }  
    }
    
    public function pedidos(){
            Utils::isAdmin();
            $pedido= new Pedido();
            $pedidos_totales=$pedido->getAllPedidos();
            $total_pedidos=array();
            $total_productos=array();
            while($pedido_total=$pedidos_totales->fetch_object()){
                array_push($total_pedidos,$pedido_total);
                $pedido_productos= new Pedido();
                $productos=$pedido_productos->getProductosByPedido($pedido_total->id);
                array_push($total_productos,$productos);    
            }
            require_once 'views/pedido/mis_pedidos.php';
    }

    public function update_state(){
        if(isset($_POST) && isset($_GET)){
           $pedido=new Pedido();
           $pedido->setId($_GET['id']);
           $pedido->setEstado($_POST['estado']);
           $update=$pedido->updateState();
           if($update){
                $_SESSION['mod-completed']="El estado del pedido ".$pedido->getId()." se ha modificado con exito";
           }else{
                $_SESSION['errores']['mod-failed']="El estado del pedido ".$pedido->getId()." no se ha modificado";
           }
           header("Location:".base_url."pedido/pedidos");
        }
    }
}

?>
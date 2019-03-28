<?php
require_once 'models/producto.php';

class carritoController{
    public function index(){
        require_once "views/carrito/index.php";
    }
    public function add(){
        if(isset($_GET['id']) && isset($_POST)){
            $producto= new Producto();
            $producto=Utils::getProducto($_GET['id']);
            if(is_object($producto)){
                if(isset($_SESSION['carrito'])){
                    array_push($_SESSION['carrito'],array(
                        "unidades"=>$_POST['cantidad'],
                        "producto"=>$producto));
                }else{
                    $_SESSION['carrito'][]= array(
                        "unidades"=>$_POST['cantidad'],
                        "producto"=>$producto);
                }
                header("Location:".base_url."carrito/index");
            }else{
                header("Location:".base_url);
            }
        }
    }
    public function delete(){
        if(isset($_GET['index']) && isset($_SESSION['carrito'])){
            unset($_SESSION['carrito'][$_GET['index']]);
            if(sizeof($_SESSION['carrito'])==0){
                $this->delete_all();
            }else{
                $_SESSION['prod-car-del']="El producto se ha eliminado del carrito";
                header("Location:".base_url."carrito/index");
            }
        }    
    }
    public function delete_all(){
        $_SESSION['prod-car-del-all']="Se han eliminado todos los productos del carrito";
        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");
    }

    public function modify(){
        if(isset($_GET['index'])){
            foreach($_SESSION['carrito'] as $indice=>$producto){
                if($indice==$_GET['index']){
                    if(isset($_GET['method'])){
                        if($_GET['method']==="up"){
                            $_SESSION['carrito'][$indice]['unidades']++;
                            $_SESSION['mod-car-completed']="El carrito se ha modificado con exito";
                        }elseif($_GET['method']==="down"){
                            if($_SESSION['carrito'][$indice]['unidades']>1){
                                $_SESSION['carrito'][$indice]['unidades']--;
                                $_SESSION['mod-car-completed']="El carrito se ha modificado con exito";
                            }    
                        }
                    }
                }
            }
            header("Location:".base_url."carrito/index");
        }
        
    }

}




?>
<?php
class Utils{
    public static function deleteSession($nombre){
        if(isset($_SESSION[$nombre])){
            $_SESSION[$nombre]=null;
            unset($_SESSION[$nombre]);
        }
        return;
    }
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria=new Categoria();
        $categorias=$categoria->getAllCategorias();
        return $categorias;
    }

    public static function showCategoriaNombre($id){
        require_once 'models/categoria.php';
        $categoria=new Categoria();
        $categorias=$categoria->getCategoriaNombre($id);
        return $categorias->fetch_object();
    }
    public static function getProducto($id){
        require_once 'models/producto.php';
        $producto=new Producto();
        $prod=$producto->getProducto($id);
        return $prod->fetch_object();
    }
    public static function statsCarrito(){
        $stats=array(
            'count'=>0,
            'total'=>0
        );
        $total=0;
        if(isset($_SESSION['carrito'])){
            $stats['count']=count($_SESSION['carrito']);
            foreach($_SESSION['carrito'] as $indice=>$producto){
                $total+=($_SESSION['carrito'][$indice]['producto']->precio*$_SESSION['carrito'][$indice]['unidades']);
            }
            $stats['total']=$total;
        }
        return $stats;
    }
}




?>
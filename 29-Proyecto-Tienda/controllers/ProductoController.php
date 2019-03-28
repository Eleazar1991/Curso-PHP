<?php
require_once 'models/producto.php';
class productoController{
    public function index(){
        $producto=new Producto();
        $productos=$producto->getRandom(6);
        $is_categoria=false;
        //renderizar vista
        require_once 'views/producto/destacados.php';
    }
    public function gestion(){
        Utils::isAdmin();
        
        $producto=new Producto();
        $productos=$producto->getAllProductos();

        require_once 'views/producto/gestion.php';
    }
    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }
    public function save(){
        Utils::isAdmin();
        //Guardar el producto
        if(isset($_POST)){
            $titulo = isset($_POST['name']) ? $_POST['name'] :false;
            $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] :false;
            $precio=isset($_POST['precio']) ?  $_POST['precio'] :false;
            $stock=isset($_POST['stock']) ? $_POST['stock'] :false;
            $categoria_id=isset($_POST['categoria']) ? $_POST['categoria'] :false;
            //Guardar Imagen
            $imagen=$_FILES['imagen'];
            /*Array de errores*/
            $errores= array();
            if($titulo){
                $titulo_validado=true;
            }else{
                $titulo_validado=false;
                $errores['prod-titulo']= "El titulo no es válido";
            }
            if($descripcion){
                $descripcion_validado=true;
            }else{
                $descripcion_validado=false;
                $errores['prod-descripcion']= "La descripcion no es válida";
            }
            if($precio && is_numeric($precio)){
                $precio_validado=true;
            }else{
                $precio_validado=false;
                $errores['prod-precio']= "El precio no es válido";
            }
            if($stock){
                $stock_validado=true;
            }else{
                $stock_validado=false;
                $errores['prod-stock']= "El stock no es válido";
            }
            if($categoria_id){
                $categoria_id_validado=true;
            }else{
                $categoria_id_validado=false;
                $errores['prod-categoria_id']= "El identificador de la categoría no es válido";
            }
            if($imagen){
                $imagenname=isset($imagen['name']) ? $imagen['name'] :false;
                $mimetype=isset($imagen['type']) ? $imagen['type'] :false;
                //Si la imagen tiene estos formatos
                if($mimetype="image/jpg" || $mimetype="image/jpeg" || $mimetype="image/png" || $mimetype="image/gif"){
                    
                    //Creamos directorio si no esta creado para almacenar la imagen
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images',0777,true);
                    }
                    move_uploaded_file($imagen['tmp_name'],'uploads/images/'.$imagenname);
                    $imagen_validado=true;
                }else{
                    $errores['prod-imagen']= "La imagen no es válida";
                }
            }else{
                $imagen_validado=false;
                $errores['prod-imagen']= "La imagen no es válida";
            }
            if(count($errores)==0){
                $producto=new Producto();
                $producto->setTitulo($titulo);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria_id);
                $producto->setImagen($imagenname);

                $save=$producto->save();
                if($save){
                    $_SESSION['prod-completado']="El producto se ha añadido con exito";
                }else{
                    $_SESSION['errores']['prod-general']="Fallo al añadir el producto";
                }
            }else{
                $_SESSION['errores']=$errores;
                header("Location:".base_url."producto/crear");
            }
        }else{
            $_SESSION['producto']="Failed";
            header("Location:".base_url."producto/crear");
        }
        header("Location:".base_url."producto/gestion");
    }
    public function delete(){
        Utils::isAdmin();
        if(isset($_GET)){;
            $id=isset($_GET['id'])?$_GET['id']:false;
            if($id && is_numeric($id)){
                $producto=new Producto();
                $producto->setId($id);
                $delete=$producto->delete();
                if($delete){
                    $_SESSION['prod-completado']="El producto se ha eliminado con exito";
                }else{
                    $_SESSION['errores']['prod-general']="Fallo al eliminar el producto";
                }
            }else{
                $_SESSION['errores']['prod-id']='EL identificador del producto no existe';
                header("Location:".base_url."producto/borrar");
            }
        }else{
            $_SESSION['producto']="Failed";
            header("Location:".base_url."producto/borrar");
        }
        header("Location:".base_url."producto/gestion");
    }
    public function modificar(){
        Utils::isAdmin();
        $producto=new Producto();
        $productos=$producto->getAllProductos();

        require_once 'views/producto/modificar.php';
    }
    public function update(){
        Utils::isAdmin();
        //Guardar el producto
        if(isset($_POST) && isset($_GET)){
            $oldproduct=Utils::getProducto($_GET['id']);
            $id=isset($_GET['id'])?$_GET['id']:$oldproduct->getId();
            $titulo = isset($_POST['name']) ? $_POST['name'] :$oldproduct->getTitulo();
            $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] :$oldproduct->getDescripcion();
            $precio=isset($_POST['precio']) ?  $_POST['precio'] :$oldproduct->getPrecio();;
            $stock=isset($_POST['stock']) ? $_POST['stock'] :$oldproduct->getStock();;
            $categoria_id=isset($_POST['categoria']) ? $_POST['categoria'] :$oldproduct->getCategoriaId();;
            //Guardar Imagen
            $imagen=$_FILES['imagen'];
            /*Array de errores*/
            $errores= array();
            if($titulo){
                $titulo_validado=true;
            }else{
                $titulo_validado=false;
                $errores['prod-titulo']= "El titulo no es válido";
            }
            if($descripcion){
                $descripcion_validado=true;
            }else{
                $descripcion_validado=false;
                $errores['prod-descripcion']= "La descripcion no es válida";
            }
            if($precio && is_numeric($precio)){
                $precio_validado=true;
            }else{
                $precio_validado=false;
                $errores['prod-precio']= "El precio no es válido";
            }
            if($stock){
                $stock_validado=true;
            }else{
                $stock_validado=false;
                $errores['prod-stock']= "El stock no es válido";
            }
            if($categoria_id){
                $categoria_id_validado=true;
            }else{
                $categoria_id_validado=false;
                $errores['prod-categoria_id']= "El identificador de la categoría no es válido";
            }
            if($imagen){
                $imagenname=isset($imagen['name']) ? $imagen['name'] :false;
                $mimetype=isset($imagen['type']) ? $imagen['type'] :false;
                //Si la imagen tiene estos formatos
                if($mimetype="image/jpg" || $mimetype="image/jpeg" || $mimetype="image/png" || $mimetype="image/gif"){
                    
                    //Creamos directorio si no esta creado para almacenar la imagen
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images',0777,true);
                    }
                    move_uploaded_file($imagen['tmp_name'],'uploads/images/'.$imagenname);
                    $imagen_validado=true;
                }else{
                    $errores['prod-imagen']= "La imagen no es válida";
                }
            }else{
                $imagen_validado=false;
                $errores['prod-imagen']= "La imagen no es válida";
            }
            if(count($errores)==0){
                $producto=new Producto();
                $producto->setId($id);
                $producto->setTitulo($titulo);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria_id);
                ($_FILES['imagen']['size']!=0) ? $producto->setImagen($imagenname) : $producto->setImagen($oldproduct->imagen);
                $save=$producto->update();
                if($save){
                    $_SESSION['prod-completado']="El producto se ha modificado con exito";
                }else{
                    $_SESSION['errores']['prod-general']="Fallo al modificar el producto";
                }
            }else{
                $_SESSION['errores']=$errores;
                header("Location:".base_url."producto/modificar");
            }
        }else{
            $_SESSION['producto']="Failed";
            header("Location:".base_url."producto/modificar");
        }
        header("Location:".base_url."producto/gestion");
    }
    public function categoria(){
        if(isset($_GET)){
            $producto=new Producto();
            $productos=$producto->getProductoCategoria($_GET['categoria_id']);
            $categoria=Utils::showCategoriaNombre($_GET['categoria_id']);
            $is_categoria=true;
            require_once 'views/producto/destacados.php';
        }
    }
    public function show(){
        if(isset($_GET)){
            $producto=Utils::getProducto($_GET['id']);
            require_once 'views/producto/individual.php';

        }
    }
}

?>
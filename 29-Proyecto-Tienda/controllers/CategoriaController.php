<?php
require_once 'models/categoria.php';
class categoriaController{
    //Si tiene permisos de administrador -> isAdmin() puede modificar categorias, etc.
    //Especie de middleware
    public function index(){
        Utils::isAdmin();
        $categoria=new Categoria();
        $categorias=$categoria->getAllCategorias();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    public function save(){
        Utils::isAdmin();
        //Guardar la categoria
        if(isset($_POST)){
            $nombre = isset($_POST['name']) ? $_POST['name'] :false;
            /*Array de errores*/
            $errores= array();
            if($nombre){
                $nombre_validado=true;
            }else{
                $nombre_validado=false;
                $errores['cat-nombre']= "El nombre no es valido";
            }

            if(count($errores)==0){
                $categoria=new Categoria();
                $categoria->setNombre($nombre);
                $save=$categoria->save();
                if($save){
                    $_SESSION['cat-completado']="La categoria se ha añadido con exito";
                }else{
                    $_SESSION['errores']['cat-general']="Fallo al añadir la categoria";
                }
            }else{
                $_SESSION['errores']=$errores;
                header("Location:".base_url."categoria/crear");
            }
        }else{
            $_SESSION['category']="Failed";
            header("Location:".base_url."categoria/crear");
        }
        header("Location:".base_url."categoria/index");
    }
    public function borrar(){
        Utils::isAdmin();
        $categoria=new Categoria();
        $categorias=$categoria->getAllCategorias();
        require_once 'views/categoria/borrar.php';
    }

    public function modificar(){
        Utils::isAdmin();
        $categoria=new Categoria();
        $categorias=$categoria->getAllCategorias();
        require_once 'views/categoria/modificar.php';
    }

    public function update(){
        Utils::isAdmin();
        if(isset($_POST)){
            $id=isset($_POST['cat-up'])?$_POST['cat-up']:false;
            $nombre=isset($_POST['cat-nom'])?$_POST['cat-nom']:false;
            /*Array de errores*/
            $errores= array();
            if($id){
                $id_validado=true;
            }else{
                $id_validado=false;
                $errores['cat-id']= "El identificador no es valido";
            }

            if($nombre){
                $nombre_validado=true;
            }else{
                $nombre_validado=false;
                $errores['cat-nombre']= "El nombre de la categoria no es valido";
            }
            
            if(count($errores)==0){
                $categoria=new Categoria();
                $categoria->setId($_POST['cat-up']);
                $categoria->setNombre($_POST['cat-nom']);
                $delete=$categoria->update();
                if($delete){
                    $_SESSION['cat-completado']="La categoria se ha modificado con exito";
                }else{
                    $_SESSION['errores']['cat-general']="Fallo al modificar la categoria";
                }
            }
        }
        header("Location:".base_url."categoria/index");
    }

    public function delete(){
        Utils::isAdmin();
        if(isset($_POST)){
            $id=isset($_POST['cat-del'])?$_POST['cat-del']:false;
            /*Array de errores*/
             $errores= array();
            if($id){
                $id_validado=true;
            }else{
                $id_validado=false;
                $errores['cat-id']= "El identificador no es valido";
            }
            if(count($errores)==0){
                $categoria=new Categoria();
                $categoria->setId($_POST['cat-del']);
                $delete=$categoria->delete();
                if($delete){
                    $_SESSION['cat-completado']="La categoria se ha eliminado con exito";
                }else{
                    $_SESSION['errores']['cat-general']="Fallo al eliminar la categoria";
                }
            }   
        }
        header("Location:".base_url."categoria/index");
    }
}

?>
<?php
require_once 'autoload.php';

// $usuario=new Usuario();

// var_dump($usuario);
// echo $usuario->nombre;

//Espacios de nombre y paquetes
use MisClases\Usuario, MisClases\Categoria, MisClases\Entrada;
use PanelAdministrador\Usuario as UsuarioAdmin;

class Principal{
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct(){
        $this->usuario= new Usuario();
        $this->categoria= new Categoria();
        $this->entrada= new Entrada();
    }
    public function getUsuario(){
        return $usuario;
    }
    public function Information(){
        echo __CLASS__;
        echo __NAMESPACE__;
        echo __METHOD__;
    }
}

$principal=new Principal();
var_dump($principal);

//Objeto de otro paquete
$usuario= new UsuarioAdmin();
var_dump($usuario);

//Comprobar si existe una clase
if(class_exists('MisClases\Usuario')){
    echo "<h1>La clase existe</h1>";
}else{
    echo "<h1>La clase no existe</h1>";
}

// if(@class_exists('PanelAdministrador\Usuario2')){
//     echo "<h1>La otra clase existe</h1>";
// }else{
//     echo "<h1>La otra clase no existe</h1>";
// }

//Obtener listado de metodos de una clase
var_dump(get_class_methods($principal));
echo $principal->Information();
?>
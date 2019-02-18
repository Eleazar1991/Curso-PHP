<h1>Bienvenido a mi web con MVC</h1>
<p>
    Parametro ?action = crearUsuario | mostrarTodos | listarNota
</p>
<p>
    Parametro ?controller = UsuarioController; 
</p>
<?php
require_once 'autoload.php';

if(isset($_GET['controller'])){
    $controladores=$_GET['controller']."Controller";
}else{
    echo "La página que buscas no existe";
    exist();
}
if(class_exists($controladores)){
    $controlador= new $controladores();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action=$_GET['action'];
        $controlador->$action();
    }else{
        echo "La página que buscas no existe";
    }
}else{
    echo "La pagina que buscas no existe";
}




?>
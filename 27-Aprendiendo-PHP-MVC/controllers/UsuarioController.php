<?php
class UsuarioController{
    public function mostrarTodos(){
        require_once 'models/usuario.php';
        
        $usuario= new Usuario();
        $todos_usuarios=$usuario->conseguirTodos('usuarios');

        require_once 'views/usuarios/mostrar-todos.php';
    }
    public function crearUsuario(){
        require_once 'views/usuarios/crear-usuario.php';
    }
}




?>
<?php
class NotaController{
    public function listarNota(){
        //Modelo
        require_once 'models/nota.php';

        //Logica Accion Controlador
        $nota = new Nota();
        $notas=$nota->conseguirTodos('notas');

        //Vista
        require_once 'views/nota/listar.php';
    }
    public function crearNota(){
        //Modelo
        require_once 'models/nota.php';

        //Logica Accion Controlador
        $nota = new Nota();
        $nota->setUsuario(1);
        $nota->setTitulo("Nota de prueba");
        $nota->setDescripcion("Descripcion de mi nota de prueba");
        $guardar=$nota->guardar();
        
        header("Location: index.php?controller=Nota&action=listarNota");
    }
    public function borrarNota(){
        
    }
}




?>
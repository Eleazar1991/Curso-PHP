<?php

class errorController{
    public function index(){
        echo "<h1>La pagina que buscas no existe</h1>";
    }
    public static function mostrarError($errores,$campo){
        $alerta="";
        if(isset($errores[$campo]) && !empty($campo))
            $alerta= "<div class='alert red'>".$errores[$campo]."</div>";

        return $alerta;
    }
}


?>
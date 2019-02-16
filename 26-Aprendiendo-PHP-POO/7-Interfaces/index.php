<?php
interface Ordenador{
    public function encender();
    public function apagar();
    public function reiniciar();
    public function desfragmentar();
}

class iMac implements Ordenador{
    private $modelo;

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo=$modelo;
    }
    public function encender(){
        return "encender";
    }
    public function apagar(){
        return "apagar";
    }
    public function reiniciar(){
        return "reiniciar";
    }
    public function desfragmentar(){
        return "desfragmentar";
    }
}

$maquintosh=new iMac();
$maquintosh->setModelo("Pro");
var_dump($maquintosh);
echo $maquintosh->getModelo();
?>
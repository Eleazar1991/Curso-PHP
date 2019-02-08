<?php
require_once '../includes/conexion.php';
if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $entradaid=$_GET['id'];
    $usuarioid=$_SESSION['usuario']['id'];
    var_dump($entradaid);
    $sql="DELETE FROM entradas WHERE usuario_id=$usuarioid AND id=$entradaid;";
    $consulta= mysqli_query($conexiondb,$sql);
    if($consulta){
        $_SESSION['elim_completado']="La entrada se ha eliminado con exito";
    }else{
        $_SESSION['errores']['elim_general']="Fallo al eliminar la entrada";
    }
}
header("Location: ../index.php");
?>
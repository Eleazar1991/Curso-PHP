<?php
function mostrarError($errores, $campo){
    $alerta="";
    if(isset($errores[$campo]) && !empty($campo))
        $alerta= "<div class='alerta alerta-error'>".$errores[$campo]."</div>";

    return $alerta;
}

function borrarErrores(){
    if(isset($_SESSION['errores'])){
        $_SESSION['errores']=null;
        unset($_SESSION['errores']);
    }   
    if(isset($_SESSION['completado'])){
        $_SESSION['completado']=null;
        unset($_SESSION['completado']);
    }
    if(isset($_SESSION['elim_completado'])){
        $_SESSION['elim_completado']=null;
        unset($_SESSION['elim_completado']);
    }
    return;    
}

function conseguirCategorias($conexiondb){
    $sql="SELECT * FROM categorias ORDER BY id ASC;";
    $consulta=mysqli_query($conexiondb,$sql);
    if($consulta && mysqli_num_rows($consulta) >= 1){
        return $consulta;
    }
    return "";
}

function conseguirCategoria($conexiondb,$id){
    $sql="SELECT * FROM categorias WHERE id=$id;";
    $consulta=mysqli_query($conexiondb,$sql);
    if($consulta){
        return mysqli_fetch_assoc($consulta);
    }
    return "";
}


function conseguirEntradas($conexiondb, $limit=null){
    if($limit){
        $sql="SELECT entradas.*,categorias.nombre FROM entradas  
        INNER JOIN categorias ON entradas.categoria_id=categorias.id
        ORDER BY entradas.id DESC LIMIT 4;";
    }else{
        $sql="SELECT entradas.*,categorias.nombre FROM entradas  
        INNER JOIN categorias ON entradas.categoria_id=categorias.id
        ORDER BY entradas.id DESC;";
    }
    $consulta=mysqli_query($conexiondb,$sql);
    if($consulta && mysqli_num_rows($consulta) >= 1){
        return $consulta;
    }
    return "";
}

function conseguirEntradasCategoria($conexiondb, $id){
    if(!empty($id)){
        $sql="SELECT entradas.*,categorias.nombre FROM entradas  
        INNER JOIN categorias ON entradas.categoria_id=categorias.id
        WHERE categorias.id=$id;";
        $consulta=mysqli_query($conexiondb,$sql);
        if($consulta && mysqli_num_rows($consulta) >= 1){
            return $consulta;
        }
    }
    return "";
}

function conseguirEntrada($conexiondb,$id){
    $sql="SELECT entradas.*,categorias.nombre, CONCAT(usuarios.nombre,' ',usuarios.apellidos) AS 'usuario' FROM entradas  
    INNER JOIN categorias ON entradas.categoria_id=categorias.id
    INNER JOIN usuarios ON entradas.usuario_id=usuarios.id
    WHERE entradas.id=$id;";
    $consulta=mysqli_query($conexiondb,$sql);
    if($consulta && mysqli_num_rows($consulta) >= 1){
        return $consulta;
    }
    return "";
}

function buscarEntradas($conexiondb,$busqueda){
    $sql="SELECT entradas.*,categorias.nombre FROM entradas  
    INNER JOIN categorias ON entradas.categoria_id=categorias.id
    WHERE titulo LIKE '%$busqueda%'
    ORDER BY entradas.id;";
    $consulta=mysqli_query($conexiondb,$sql);
    if($consulta && mysqli_num_rows($consulta) >= 1){
        return $consulta;
    }
    return "";
}
?>
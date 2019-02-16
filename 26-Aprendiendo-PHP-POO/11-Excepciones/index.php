<?php
//Capturar excepcions en código susceptible a errores
try{
    throw new Exception("Errores de lógica");
}catch(Exception $e){
    echo "Ha habido un error: ".$e->getMessage();
}   
// }finally{
//     echo "Todo correcto";
// }

//Ejemplo

try{
    if(isset($_GET['id'])){
        echo "<h1>El parametro es: ".$_GET['id']."</h1>";
    }else{
        throw new Exception("No se encuentra el parametro id");
    }
}catch(Exception $e){
    echo "Ha habido un error: ".$e->getMessage();
}

?>
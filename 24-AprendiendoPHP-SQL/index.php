<?php
//Conectar a la base de datos
$conexion = mysqli_connect("localhost","root","","phpsql");

//Comprobar si la conexion es correcta
if(mysqli_connect_errno()){
    echo "La conexión a la base de datos SQL ha fallado: ".mysqli_connect_error();
}else{
    echo "La conexión se ha creado correctamente";
}

//Consulta para configurar la codificación de caracteres
mysqli_query($conexion,"SET names 'utf8'");

//Consulta SELECT a través de PHP
$query=mysqli_query($conexion,"SELECT * FROM notas");

//Obtenemos los datos en un array asociativo
while ($nota=mysqli_fetch_assoc($query)){
    //var_dump($nota);
    echo "<h3>".$nota["titulo"]."</h3>";
    echo $nota["descripcion"]."<br/>";
}

//Insertar en la bd desde PHP
$sql="INSERT INTO notas VALUES (NULL,'Nota desde PHP','Esto es una nota de PHP','green')";
$insert=mysqli_query($conexion, $sql);

if($insert){
    echo "Datos insertados correctamente";
}else{
    echo "Error:" .msqli_error($conexion);
}
?>
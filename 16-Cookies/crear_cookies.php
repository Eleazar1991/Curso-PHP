<?php   
//Crear Cookie básica
setcookie("micookie","Valor de mi cookie");

//Cookie con expiración
setcookie("unyear","Valor de mi cokkie de 365 días",time()+(60*60*24*365));

header('Location:ver_cookies.php'); 
?>
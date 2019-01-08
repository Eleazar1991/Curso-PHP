<?php

if(isset($_COOKIE['micookie'])){
    unset($_COOKIE['micookie']);
    setcookie('micookie','',time()-100);
    echo "La cookie se ha borrado";
}

header('Location:ver_cookies.php');

?>

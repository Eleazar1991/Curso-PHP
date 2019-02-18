<?php
 function autocargar($clase){
    require_once 'controllers/'.$clase.'.php';
 }

 spl_autoload_register('autocargar');

?>
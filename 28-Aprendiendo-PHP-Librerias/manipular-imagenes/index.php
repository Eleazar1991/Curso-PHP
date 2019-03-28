<?php
require_once '../vendor/autoload.php';

$foto_original='Linkedin_qr.png';
$foto_modificada='Linkedin_mod_qr.jpg';

$thumb=new PHPThumb\GD($foto_original);

//Redimensionar
$thumb->resize(250,250);
$thumb->show();

//Recortar
$thumb->crop(50,50,120,120);
$thumb->show();
$thumb->save($foto_modificada,"jpg");
?>    
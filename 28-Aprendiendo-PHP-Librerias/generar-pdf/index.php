<?php
require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

// $html= "<h1>Hola mundo desde una libreria de php para hacer PDFs</h1>";
// $html.= "<p>Master en PHP de Udemy</p>";
// $html2pdf->writeHTML($html);

//Recoger la vista a imprimir
ob_start();
require_once 'pdf_para_generar.php';
$html=ob_get_clean();
$html2pdf->writeHTML($html);
$html2pdf->output('pdf-generado.pdf');
?>
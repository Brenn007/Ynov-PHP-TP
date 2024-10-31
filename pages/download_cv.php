<?php
$title = "Téléchargement du CV";
$headerTitle = "Téléchargement du CV";
include('../includes/header.php');

require('../vendor/autoload.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Mon CV</h1><p>Contenu du CV...</p>');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("cv.pdf");

include('../includes/footer.php');
?>

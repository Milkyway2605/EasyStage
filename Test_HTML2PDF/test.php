<?php
    include_once '../Application/Features/fonctionImporteHtml.php';
    include_once '../Base/Ressources/html2pdf/html2pdf.class.php';

    $contenu = importe_HTML('html.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($contenu);
    $html2pdf->Output('exemple.pdf');
?>
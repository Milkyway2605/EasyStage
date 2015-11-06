<?php
    session_start();
    
    include_once '../Application/Features/fonctionImporteHtml.php';
    include_once '../Base/Ressources/html2pdf/html2pdf.class.php';
    include_once '../Application/Features/cryptage.php';
    include_once '../Application/Features/backConnexion.php';
    
    backConnexion();
    
    $_SESSION['codeStage'] = (int)decrypt($_GET['codeStage']);
    $contenu = importe_HTML('../Application/Views/conventionView.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($contenu);
    $html2pdf->Output('convention.pdf');
?>


<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/gererMonStageStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/stagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Gestion des stages
    <small>Récapitulatif de vos stages</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Mes stages</div>
        </div>
        <div class='panel-body'>
            
            <?php            
                include_once '../Application/Modules/gererMonStageModules/mesStagesModule.php';            
            ?>
            
        </div>
    </div>
</article>
    
<?php
include_once '../Application/Base/layout_content_03.php';
include_once '../Application/Base/layout_footer.php';
include_once '../Application/Base/layout_baseJavascript.php';
?>
    
<?php
include_once '../Application/Base/layout_endPage.php';
?>
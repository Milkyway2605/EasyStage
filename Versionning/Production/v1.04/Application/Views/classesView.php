<?php
include_once 'Application/Base/layout_head_01.php';
?>

<link href="Application/Ressources/CSS/classesStyle.css" rel="stylesheet" type="text/css"/>
<link href="Application/Ressources/CSS/classesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once 'Application/Base/layout_head_02.php';
include_once 'Application/Base/layout_header.php';
include_once 'Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'classes'));
include_once 'Application/Base/layout_content_01.php';
?>

    Mes classes
    <small>Récapitulatif des vos classes</small>

<?php
include_once 'Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-12 col-md-12'>
    <div class="tab-content">
        
        <?php 
        
            include_once 'Application/Modules/classesModules/choixClasseModule.php';  
            include_once 'Application/Modules/classesModules/affichageClasseModule.php';
            
        ?>
    </div>
</article>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>
    
<script src="Application/Ressources/Javascript/classesScript.js" type="text/javascript"></script>
    
<?php
include_once 'Application/Modules/classesModules/modalModifyPeriodeModule.php';
include_once 'Application/Modules/classesModules/modalAddPeriodeModule.php';
include_once 'Application/Modules/classesModules/modalShowEtudiantModule.php';
include_once 'Application/Base/layout_endPage.php';
?>


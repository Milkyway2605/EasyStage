<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/gererStageStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/stagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Gestion des stages
    <small>Gérer les stages en attente de validation.</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-12 col-md-12'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Gestion des stages</div>
        </div>
        <div class='panel-body' id="validationStage">
            <div class="container-fluid">
                <div class="tabbable tabs-vertical tabs-left">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#dash" data-toggle="tab">Vos validatons</a>
                        </li>
                        <li>
                            <a href="#blog" data-toggle="tab">Autres validations</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">                       
                      
                        <?php            
                            include_once '../Application/Modules/gererStageModules/vosValidationsModule.php';
                            include_once '../Application/Modules/gererStageModules/autresValidationsModule.php';
                        ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
    
<?php
include_once '../Application/Base/layout_content_03.php';
include_once '../Application/Base/layout_footer.php';
include_once '../Application/Base/layout_baseJavascript.php';
?>
    
<script src="../Application/Ressources/Javascript/gererStage.js" type="text/javascript"></script>
    
<?php
include_once '../Application/Base/layout_endPage.php';
?>
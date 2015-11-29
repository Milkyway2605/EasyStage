<?php
include_once 'Application/Base/layout_head_01.php';
?>

<link href="Application/Ressources/CSS/historiqueStagesStyle.css" rel="stylesheet" type="text/css"/>
<link href="Application/Ressources/CSS/historiqueStagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once 'Application/Base/layout_head_02.php';
include_once 'Application/Base/layout_header.php';
include_once 'Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once 'Application/Base/layout_content_01.php';
?>

    Historique des stages
    <small>Consulter l'historique des stages par classe</small>

<?php
include_once 'Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-12 col-md-12'>
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">Historique des stages</div>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <fieldset>
                    <label for="EtudiantAvecStages" class="checkbox-inline">
                        <input type="checkbox" name="EtudiantAvecStages" id="EtudiantAvecStages">
                        Etudiants avec stages
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox"> 
                        Etudiants sans stages
                    </label>
                    <button class="fa fa-print pull-right">
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
</article>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>
    
<?php
include_once 'Application/Modules/classesModules/modalModifyPeriodeModule.php';
include_once 'Application/Modules/classesModules/modalAddPeriodeModule.php';
include_once 'Application/Modules/classesModules/modalShowEtudiantModule.php';
include_once 'Application/Base/layout_endPage.php';
?>

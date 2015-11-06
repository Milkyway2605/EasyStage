<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/stagesStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/stagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Création d'un stage
    <small>Remplir les champs pour créer un stage.</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
<?php
    if(isset($succes))
    {
        if($succes == true)
        {
            echo('<div class="alert-container col-lg-10 col-lg-offset-1 col-md-12">
                    <div class="alert-success">
                        La création du stage a réussi :-) .
                    </div>
                </div>');
        }
        else 
        {
            echo('<div class="alert-container col-lg-10 col-lg-offset-1 col-md-12">
                    <div class="alert-danger">
                        La création du stage à échoué :-( .
                    </div>
                </div>');
        }
    }
?>
    
<article class='article col-lg-10 col-lg-offset-1 col-md-12'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Création d'un stage</div>
        </div>
        <div class='panel-body'>
            <form method="POST" action="creerStage.php" id="creerStage">
                <ul class='nav nav-tabs col-lg-5 col-md-5 hide4small'>
                    <li class='col-md-12 active'>
                        <a href="#sujetStage" class="step">
                        1. Sujet de stage
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#renseignementOrganisme" class="step">
                        2. Renseignement sur l'organisme
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#renseignementSignataire" class="step">
                        3. Renseignement sur le signataire
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#renseignementTuteur" class="step">
                        4. Renseignement sur le tuteur
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#choixProfesseur" class="step">
                        5. Choix d'un enseignant référent
                        </a>
                    </li>
                </ul>
                <div class="tab-content col-lg-7 col-md-7">
                    
                    <?php
                    
                        include_once '../Application/Modules/creerStageModules/sujetStageModule.php';
                        include_once '../Application/Modules/creerStageModules/renseignementOrganismeModule.php';
                        include_once '../Application/Modules/creerStageModules/renseignementSignataireModule.php';
                        include_once '../Application/Modules/creerStageModules/renseignementTuteurModule.php';
                        include_once '../Application/Modules/creerStageModules/choixProfesseurModule.php';
                        
                    ?>
                    
                </div>
                <div class='col-md-4 col-md-offset-5 col-xs-12'>
                    <div class='pull-left'>
                        <a class='btn inactive' id='btnPrevious'>Précédent</a>
                        <input type="submit" class='btn' id='btnNext' value="Suivant">
                    </div>
                </div>
                <div class='col-md-3'>
                    <input type='submit' class='pull-right btn hide' id="btnCreerStage" 
                    value="Créer le stage">
                </div>
            </form>
        </div>
    </div>
</article>
    
<?php
include_once '../Application/Base/layout_content_03.php';
include_once '../Application/Base/layout_footer.php';
include_once '../Application/Base/layout_baseJavascript.php';
?>
<script src="../Application/Ressources/Javascript/creationStageScript.js" type="text/javascript"></script>
<?php
include_once '../Application/Base/layout_endPage.php';
?>

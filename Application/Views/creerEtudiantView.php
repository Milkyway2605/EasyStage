<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/utilisateursStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/utilisateursResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'utilisateurs'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Etudiants
    <small>Créer un étudiant</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
 <article class='article col-lg-10 col-lg-offset-1 col-md-12'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Création d'un étudiant</div>
        </div>
        <div class='panel-body'>
            <form method="POST" action="creerEtudiant.php" id="creerEtudiant">
                <ul class='nav nav-tabs col-lg-5 col-md-5 hide4small'>
                    <li class='col-md-12 active'>
                        <a href="#informationsCompte" class="step">
                        1. Informations du compte
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#informationsPersonnelles" class="step">
                        2. Informations personnelles
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#coordonnees" class="step">
                        3. Coordonnées
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#choixClasse" class="step">
                        4. Choix d'une classe
                        </a>
                    </li>
                </ul>
                <div class="tab-content col-lg-7 col-md-7">
                    
                    <?php

                        include_once '../Application/Modules/creerEtudiantModules/informationsCompteModule.php';
                        include_once '../Application/Modules/creerEtudiantModules/informationsPersonnellesModule.php';
                        include_once '../Application/Modules/creerEtudiantModules/coordonneesModule.php';
                        include_once '../Application/Modules/creerEtudiantModules/choixClasseModule.php';
                    ?>                 

                </div>
                <div class='col-md-4 col-md-offset-5 col-xs-12'>
                    <div class='pull-left'>
                        <a class='btn inactive' id='btnPrevious'>Précédent</a>
                        <input type="submit" class='btn' id='btnNext' value="Suivant">
                    </div>
                </div>
                <div class='col-md-3'>
                    <input type='submit' class='pull-right btn hide' id="btnCreerEtudiant" 
                    value="Créer l'étudiant">
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
<script src="../Application/Ressources/Javascript/creationEtudiantScript.js" type="text/javascript"></script>
<?php
include_once '../Application/Base/layout_endPage.php';
?>


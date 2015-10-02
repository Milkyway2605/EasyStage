<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/utilisateursStyle.css" rel="stylesheet" type="text/css"/>

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
    
    <form id="createUser">
        <article class="col-lg-5 col-lg-offset-1 col-md-6  col-md-offset-0 col-sm-10 col-sm-offset-1">
            <div class="panel form-container">
                <div class="panel-body">
                    <h2>Informations générales</h2>
                    
                </div>
            </div>
            <div class="panel form-container">
                <div class="panel-body">
                    <h2>Informations personnelles</h2>
                    
                </div>
            </div>
        </article>
        
        <article class="col-lg-5 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1">
            <div class="panel form-container">
                <div class="panel-body">
                    <h2>Coordonnées</h2>
                    
                </div>
            </div>
            <div class="panel form-container">
                <div class="panel-body">
                    <h2>Classe</h2>
                    
                </div>
            </div>
        </article>
        <div class='row col-lg-12'>
                <input type="submit" value="Créer l'étudiant" class='btn col-lg-2 
                col-lg-offset-5 col-md-4-col-md-offset-4 col-sm-6 col-sm-offset-3
                col-xs-10 col-xs-offset-1'>
        </div>
    </form>
<?php
include_once '../Application/Base/layout_content_03.php';
include_once '../Application/Base/layout_footer.php';
include_once '../Application/Base/layout_baseJavascript.php';
?>

<?php
include_once '../Application/Base/layout_endPage.php';
?>


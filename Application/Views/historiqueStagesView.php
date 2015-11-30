<?php
include_once 'Application/Base/layout_head_01.php';
?>

<link href="Application/Ressources/CSS/historiqueStagesStyle.css" rel="stylesheet" type="text/css"/>
<link href="Application/Ressources/CSS/historiqueStagesResponsive.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="Base/Ressources/DataTables/DataTables-1.10.10/css/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="Base/Ressources/DataTables/Responsive-2.0.0/css/responsive.bootstrap.css"/>

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
            <form>
                <p class="filtre">Filtres :</p>
                <fieldset>
                    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
                        <label for="section" class="col-xs-2 col-md-4 col-lg-4 no-padding">Section :</label>
                        <select id="section" class="col-xs-10 col-md-7 no-padding">
                                <option value="">Toutes</option>
                                <option value="SIO">SIO</option>
                                <option value="MUC">MUC</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
                        <label for="niveau" class="col-xs-2 col-md-4 col-lg-4 no-padding">Niveau :</label>
                        <select id="niveau" class="col-xs-10 col-md-7 no-padding">
                            <option value="">Tous</option>
                            <option value="1">1ère annéee</option>
                            <option value="2">2ème annéee</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
                        <label for="anneee" class="col-xs-2 col-md-4 col-lg-4 no-padding">Année :</label>
                        <select id="anneee" class="col-xs-10 col-md-7 no-padding">
                            <option value="">Toutes</option>
                            <option value="SIO">2015</option>
                            <option value="MUC">2014</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
                        <label for="stage" class="col-xs-2 col-md-4 col-lg-4 no-padding">Stage :</label> 
                        <select id="stage" class="col-xs-10 col-md-7 no-padding">
                            <option value="">Tous</option>
                            <option value="Oui">Avec</option>
                            <option value="Non">Sans</option>
                        </select>
                    </div>
                </fieldset>
                <?php
                include_once 'Application/Modules/historiqueStagesModules/listeStagesModule.php';
                ?>
            </form>
        </div>
    </div>
</article>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>
    <script type="text/javascript" src="Base/Ressources/DataTables/DataTables-1.10.10/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="Base/Ressources/DataTables/DataTables-1.10.10/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="Base/Ressources/DataTables/Responsive-2.0.0/js/dataTables.responsive.js"></script>
    <script src="Application/Ressources/Javascript/historiqueStagesScript.js" type="text/javascript"></script>
<?php
include_once 'Application/Modules/classesModules/modalModifyPeriodeModule.php';
include_once 'Application/Modules/classesModules/modalAddPeriodeModule.php';
include_once 'Application/Modules/classesModules/modalShowEtudiantModule.php';
include_once 'Application/Base/layout_endPage.php';
?>

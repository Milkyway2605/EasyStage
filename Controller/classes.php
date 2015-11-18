<?php
session_start();
include_once 'Application/Features/backConnexion.php';
backConnexion();
?>
<?php
include_once 'Application/Base/layout_head_01.php';
?>

<link href="Application/Ressources/CSS/classes.css" rel="stylesheet" type="text/css"/>
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
        <div class="tab-pane fade" id="selectionClasse">
            <div class="panel col-lg-4 col-lg-offset-4">
                <div class="panel-heading">
                    <div class="panel-title">Sélectionner une classe</div>
                </div>
                <div class="panel-body">                            
                    <form class="col-lg-10 col-lg-offset-1">
                        <div class="form-group">
                            <label for="periodeStage">Section : </label>
                            <select id="periodeStage" name="periodeStage" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="periodeStage">Niveau : </label>
                            <select id="periodeStage" name="periodeStage" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="periodeStage">Période : </label>
                            <select id="periodeStage" name="periodeStage" class="form-control" required>
                            </select>
                        </div>
                        <p class="centrerButton">
                            <input type="button" value="Afficher la classe" class="btn" href="#livres" data-toggle="tab">
                        </p>
                    </form>                            
                </div>
            </div>
        </div>

        <div class="tab-pane fade active in" id="livres">
                <div class="col-lg-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Informations diverses</div>
                        </div>
                        <div class="panel-body">
                            <p>Section : SIO</p>
                            <p>Niveau: 1ère année</p>
                            <p>Période: 2014-2015</p>
                            <p>Période des stages :</p>
                            <form>
                                <fieldset>
                                    <a class="addPeriode" data-toggle="modal" 
                                       href="#addPeriode">
                                        <i class="fa fa-plus-circle"></i> 
                                        Ajouter une période
                                    </a>
                                    <div class="periode">
                                        11/01/2016 - 04/03/2016
                                        <a class="fa fa-pencil pull-right" 
                                        data-toggle="modal" href="#modifyPeriode"></a>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Liste des éleves</div>
                        </div>
                        <div class="panel-body">
                            Filtres :
                            <form class="form-inline">
                                <fieldset>
                                    <label for="EtudiantAvecStages" class="checkbox-inline">
                                        <input type="checkbox" name="EtudiantAvecStages" id="EtudiantAvecStages">
                                        Etudiants avec stages
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox"> Etudiants sans stages
                                    </label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-lg-12">
                <input type="button" value="Retour au menu" class="btn pull-left" 
                href="#selectionClasse" data-toggle="tab">
            </div>
        </div>
    </div>
</article>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>

    <div class="modal fade" id="modifyPeriode">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modifier une période</h4>
                </div>
                <div class="modal-body">
                  
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addPeriode">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter une période</h4>
                </div>
                <div class="modal-body">
                  
                </div>
            </div>
        </div>
    </div>
    
<?php
include_once 'Application/Base/layout_endPage.php';
?>
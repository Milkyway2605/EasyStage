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
        <div class="tab-pane fade active in" id="selectionClasse">
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

        <div class="tab-pane fade" id="livres">
            <div class="col-lg-12 containerRetourMenu">
                <a href="#selectionClasse" data-toggle="tab">
                    <small>Retour au menu précédent</small>
                </a>
            </div>
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
                                    <input type="checkbox"> 
                                    Etudiants sans stages
                                </label>
                                <button class="fa fa-print pull-right">
                                </button>
                            </fieldset>
                        </form>
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-toggle="modal" href="#showEtudiant">
                                    <td data-label="Nom">
                                        <span class="td-responsive">  
                                            Lespagnol
                                        </span>
                                    </td>     
                                    <td data-label="Prenom" id="UKI4KfE2KHRcmDDNWo/0dYLNRvM6N5dEHJOB+PMMQ72w6LL957vamg==">
                                        <span class="td-responsive">
                                            Guillaume
                                        </span>
                                    </td>  
                                    <td data-label="Date de naissance">
                                        <span class="td-responsive">
                                            26/05/1994
                                        </span>
                                    </td>  
                                    <td data-label="Adresse">                                            
                                        <span class="td-responsive">
                                            21 rue Jean Jacques Rousseau, 62114, Sains-en-Gohelle
                                        </span>
                                    </td>  
                                    <td data-label="Telephone">
                                        <span class="td-responsive">
                                            07.81.70.84.85
                                        </span>
                                    </td>  
                                    <td data-label="Email">                                            
                                        <span class="td-responsive">
                                            guillaume.lespagnol26@gmail.com
                                        </span>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" href="#showEtudiant">
                                    <td data-label="Nom">
                                        <span class="td-responsive">  
                                            Lespagnol
                                        </span>
                                    </td>     
                                    <td data-label="Prenom" id="UKI4KfE2KHRcmDDNWo/0dYLNRvM6N5dEHJOB+PMMQ72w6LL957vamg==">
                                        <span class="td-responsive">
                                            Guillaume
                                        </span>
                                    </td>  
                                    <td data-label="Date de naissance">
                                        <span class="td-responsive">
                                            26/05/1994
                                        </span>
                                    </td>  
                                    <td data-label="Adresse">                                            
                                        <span class="td-responsive">
                                            21 rue Jean Jacques Rousseau, 62114, Sains-en-Gohelle
                                        </span>
                                    </td>  
                                    <td data-label="Telephone">
                                        <span class="td-responsive">
                                            07.81.70.84.85
                                        </span>
                                    </td>  
                                    <td data-label="Email">                                            
                                        <span class="td-responsive">
                                            guillaume.lespagnol26@gmail.com
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomOrganisme">Date de début : </label>
                            <input id="nomOrganisme" name='nomOrganisme' 
                            type="text" class="form-control" placeholder="format: jj/mm/aaaa">
                        </div>
                        <div class="form-group">
                            <label for="metierPrincipal">Date de fin : </label>
                            <input id="metierPrincipal" name='metierPrincipal' 
                            type="text" class="form-control" placeholder="format: jj/mm/aaaa">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Modifier la période" class="btn pull-right">
                    </div>
                </form>
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
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomOrganisme">Date de début : </label>
                            <input id="nomOrganisme" name='nomOrganisme' 
                            type="text" class="form-control" placeholder="format: jj/mm/aaaa">
                        </div>
                        <div class="form-group">
                            <label for="metierPrincipal">Date de fin : </label>
                            <input id="metierPrincipal" name='metierPrincipal' 
                            type="text" class="form-control" placeholder="format: jj/mm/aaaa">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Ajouter la période" class="btn pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showEtudiant">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Informations sur les stages de l'étudiant</h4>
                </div>
                <div class="modal-body">
                    <h5>Etudiant : Guillaume LESPAGNOL</h5>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="periodeStage">Choisir une période </label>
                            <select id="periodeStage" name="periodeStage" class="form-control" required>
                            </select>
                        </div>
                    </form>
                    <table class='table-vertical'>
                        <tbody>
                            <tr>                      
                                <td data-label="Nom de l'organisme">
                                    <span class="td-responsive">                  
                                        Waigéo
                                    </span>
                                </td>                      
                                <td data-label="Adresse de l'organisme">
                                    <span class="td-responsive">
                                         Village d'Entreprises, Rue des Dames, 62620 Ruitz
                                    </span>
                                </td>                      
                                <td data-label="Nom du tuteur">
                                    <span class="td-responsive">
                                        Arnaud Montewis
                                    </span>
                                </td>                      
                                <td data-label="Nom du signataire">
                                    <span class="td-responsive">
                                        Arnaud Montewis
                                    </span>
                                </td>                      
                                <td data-label="Nom du professeur référent">                                            
                                    <span class="td-responsive">
                                        Séverine Quesque
                                    </span>
                                </td> 
                            </tr>              
                        </tbody>          
                    </table>
                </div>
            </div>
        </div>
    </div>
    
<?php
include_once 'Application/Base/layout_endPage.php';
?>


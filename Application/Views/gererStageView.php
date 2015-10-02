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
                        <div class="tab-pane fade in active" id="dash">
                            
                            <table>
                                <thead>
                                    <tr>
                                        <th>Statut</th>
                                        <th>Etudiant</th>
                                        <th>Classe</th>
                                        <th>Libellé</th>
                                        <th>Descriptif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Statut">
                                            <span class="td-responsive">
                                                <span class="label label-warning">
                                                    En attente
                                                </span>
                                            </span>
                                        </td>
                                        <td data-label="Etudiant">
                                            <span class="td-responsive">
                                                Lespagnol Guillaume
                                            </span></td></td>
                                        <td data-label="Classe">
                                            <span class="td-responsive">
                                                BTS SIO 2
                                            </span></td>
                                        </td>
                                        <td data-label="Libellé">                                            
                                            <span class="td-responsive">
                                                Développement web
                                            </span></td>
                                        <td data-label="Descriptif">
                                            <span class="td-responsive">
                                                Développement d'une application web pour la gestion de stage
                                            </span>
                                        </td>
                                        <td data-label="Action">                                            
                                            <span class="td-responsive">
                                                <span class="label label-default">Pas d'action</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                      
                        <div class="tab-pane fade" id="blog">
                            
                            <table>
                                <thead>
                                    <tr>
                                        <th>Statut</th>
                                        <th>Etudiant</th>
                                        <th>Classe</th>
                                        <th>Libellé</th>
                                        <th>Descriptif</th>
                                        <th>Professeur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Statut">
                                            <span class="td-responsive">
                                                <span class="label label-warning">
                                                    En attente
                                                </span>
                                            </span>
                                        </td>
                                        <td data-label="Etudiant">
                                            <span class="td-responsive">
                                                Lespagnol Guillaume
                                            </span></td></td>
                                        <td data-label="Classe">
                                            <span class="td-responsive">
                                                BTS SIO 2
                                            </span></td>
                                        </td>
                                        <td data-label="Libellé">                                            
                                            <span class="td-responsive">
                                                Développement web
                                            </span></td>
                                        <td data-label="Descriptif">
                                            <span class="td-responsive">
                                                Développement d'une application web pour la gestion de stage
                                            </span>
                                        </td>
                                        <td data-label="Professeur">                                            
                                            <span class="td-responsive">
                                                Non défini
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Statut">
                                            <span class="td-responsive">
                                                <span class="label label-success">
                                                    Validé
                                                </span>
                                            </span>
                                        </td>
                                        <td data-label="Etudiant">
                                            <span class="td-responsive">
                                                Lespagnol Guillaume
                                            </span></td></td>
                                        <td data-label="Classe">
                                            <span class="td-responsive">
                                                BTS SIO 2
                                            </span></td>
                                        </td>
                                        <td data-label="Libellé">                                            
                                            <span class="td-responsive">
                                                Développement web
                                            </span></td>
                                        <td data-label="Descriptif">
                                            <span class="td-responsive">
                                                Développement d'une application web pour la gestion de stage
                                            </span>
                                        </td>
                                        <td data-label="Professeur">                                            
                                            <span class="td-responsive">
                                                Non défini
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
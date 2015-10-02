<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/gererMonStageStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/stagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Gestion des stages
    <small>Récapitulatif de vos stages</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Mes stages</div>
        </div>
        <div class='panel-body'>
            
            <div id="mesStages" class="panel-group">
                
                <div class="panel">
                    <div class="panel-heading row"> 
                        <a href="#item1" data-parent="#monaccordeon" data-toggle="collapse">
                            Développement d'un site web
                        </a> 
                    </div>
                    <div id="item1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class='col-xs-12'>
                                <thead>
                                    <tr>
                                        <th>Descriptif</th>
                                        <th>Periode</th>
                                        <th>Organisme</th>
                                        <th>Professeur référent</th>
                                        <th>Statut</th>
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
                                        <td data-label="Descriptif">
                                            <span class="td-responsive">
                                                Développement d'une application web pour la gestion de stage
                                            </span>
                                        </td>
                                        <td data-label="Periode">
                                            <span class="td-responsive">
                                                00/00/0000 - 00/00/0000
                                            </span>
                                        </td>
                                        <td data-label="Organisme">
                                            <span class="td-responsive">
                                                Lycée André Malraux
                                            </span>
                                        </td>
                                        <td data-label="Professeur référent">                                            
                                            <span class="td-responsive">
                                                Séverine Quesque
                                            </span>
                                        </td>
                                        <td data-label="Action">                                            
                                            <span class="td-responsive">
                                                <span class="label label-default">
                                                    <i class="fa fa-print icon-right"></i>
                                                    Imprimer la convention
                                                </span>
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
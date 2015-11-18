<?php
include_once 'Application/Base/layout_head_01.php';
?>

<link href="Application/Ressources/CSS/gererMonStageStyle.css" rel="stylesheet" type="text/css"/>
<link href="Application/Ressources/CSS/stagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once 'Application/Base/layout_head_02.php';
include_once 'Application/Base/layout_header.php';
include_once 'Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once 'Application/Base/layout_content_01.php';
?>
    
    Gestion des stages
    <small>Récapitulatif de vos stages</small>

<?php
include_once 'Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Mes stages</div>
        </div>
        <div class='panel-body'>
            
            <?php            
                include_once 'Application/Modules/gererMonStageModules/mesStagesModule.php';            
            ?>
        
        </div>
    </div>
</article>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>
    <div class="modal" id="modificationStage">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modification du stage </h4>
                </div>
                <form>
                    <div class="modal-body">
                        
                        <legend>Sujet de stage</legend>
                        <div class="form-group">
                            <label for="libelleStage">Libelle : </label>
                            <input id="libelleStage" name="libelleStage" type="text" 
                            class="form-control" required="true"
                            placeholder="ex : Développement d'un site web, maintenance d'un serveur ...">
                        </div>
                        <div class="form-group">
                            <label for="descriptifStage">Descriptif : </label>
                            <textarea id="descriptifStage" name="descriptifStage"
                            type="textarea" class="form-control" required
                            placeholder="Renseigner une brève description de votre stage"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="periodeStage">Période : </label>
                            <select id="periodeStage" name="periodeStage" class="form-control" required>
                                <?php
                                
//                                    $lesPeriodes = getLesPeriodes($codeClasse, $anneeScolaire, $connexion);
//                                    
//                                    foreach($lesPeriodes as $unePeriode)
//                                    {
//                                        $dateDebut = dateAnglaisVersFrancais($unePeriode['dateDebut']);
//                                        $dateFin = dateAnglaisVersFrancais($unePeriode['dateFin']);
//                                        echo('<option value="'.$unePeriode['codePeriode'].'">Du '.$dateDebut.' jusqu\'au '.$dateFin.'</option>');
//                                    }
                                
                                ?>
                            </select>
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="Application/Ressources/Javascript/gererMesStages.js" type="text/javascript"></script>
    
<?php
include_once 'Application/Base/layout_endPage.php';
?>
<div id="mesStages" class="panel-group">
    
<?php
    $i = 0;
    foreach ($lesStages as $unStage)
    {
        
        $laPeriode = getLaPeriode((int)$unStage['codePeriode'], $connexion);
        $infoOrganisme = getInfosOrganisme((int)$unStage['codeOrganisme'], $connexion);
        $enseignantReferent = getInfosEnseignantReferentEmail($unStage['enseignantReferent'], $connexion);
        $codeStage = encrypt((int)$unStage['codeStage']);
        $_SESSION['lesStagesValides'] = array();
        
        echo('<div class="panel">');
        
        echo('  <div class="panel-heading row"> 
                    <a href="#stage'.$i.'" data-parent="#mesStages" data-toggle="collapse">
                        '.$unStage['libelle'].'
                    </a> 
                </div>');
        echo('  <div id="stage'.$i.'" class="panel-collapse collapse">');
        echo('      <div class="panel-body">');
        echo('          <table class="col-xs-12">');
        echo('              <thead>
                                <tr>
                                    <th>Descriptif</th>
                                    <th>Periode</th>
                                    <th>Organisme</th>
                                    <th>Professeur référent</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>');
        echo('              <tbody>');
        echo('                  <tr>');
        echo('                      <td data-label="Statut">
                                        <span class="td-responsive">');
        switch((int)$unStage['statut'])
        {
            case -1 :
                echo('                  <span class="label label-danger">
                                                Refusé
                                            </span>
                                        </span>
                                    </td>');
                break;
            case 0 :
                echo('                  <span class="label label-warning">
                                                En attente
                                            </span>
                                        </span>
                                    </td>');
                break;
            case 1 :
                echo('                  <span class="label label-success">
                                                Validé
                                            </span>
                                        </span>
                                    </td>');
                break;
        }
        echo('                      <td data-label="Descriptif">
                                        <span class="td-responsive">
                                            '.$unStage['descriptif'].'
                                        </span>
                                    </td>');
        echo('                      <td data-label="Periode">
                                        <span class="td-responsive">
                                            '.dateAnglaisVersFrancais($laPeriode->dateDebut).' - '.dateAnglaisVersFrancais($laPeriode->dateFin).'
                                        </span>
                                    </td>');
        echo('                      <td data-label="Organisme">
                                        <span class="td-responsive">
                                            '.$infoOrganisme->nom.'
                                        </span>
                                    </td>');
        echo('                      <td data-label="Professeur référent">                                            
                                        <span class="td-responsive">
                                            '.$enseignantReferent->prenom.' '.$enseignantReferent->nom.'
                                        </span>
                                    </td>');
        if((int)$unStage['statut'] == 1)
        {
        $_SESSION['lesStagesValides'][i] = $codeStage;
        echo('                      <td data-label="Action">                                            
                                        <span class="td-responsive">
                                            <a class="label label-default" href="convention.php?codeStage='.$codeStage.'">
                                                <i class="fa fa-print icon-right"></i>
                                                Voir la convention
                                            </a>
                                        </span>
                                    </td>');
        echo('                      <td>
                                        <span class="td-responsive">
                                            <p class="alert alert-info">
                                                Rappel : La convention doit être imprimé en 3 exemplaires.
                                            </p>
                                        </span>
                                    </td>');
        }
        echo('                  </tr>');
        echo('              </tbody>');
        echo('          </table>');
        echo('      </div>');
        echo('  </div>');
        echo('</div>');
        $i++;
    }
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
            <?php 
                foreach($mesStages as $unStage)
                {
                    $infosEtudiant = getInfosEtudiantCodeInscription($unStage['codeInscription'], $connexion);
                    $infosClasse = getInfosClasse($unStage['codeInscription'], $connexion);
                    
                    echo('<tr id="'.encrypt((int)$unStage['codeStage']).'"><div>');
                    echo('  <td data-label="Statut">
                                <span class="td-responsive">');
                    switch((int)$unStage['statut'])
                    {
                        case -1 :
                            echo('  <span class="label label-danger">
                                        Refusé
                                    </span>
                                </span>
                            </td>');
                            break;
                        case 0 :
                            echo('  <span class="label label-warning">
                                        En attente
                                    </span>
                                </span>
                            </td>');
                            break;
                        case 1 :
                            echo('  <span class="label label-success">
                                        Validé
                                    </span>
                                </span>
                            </td>');
                            break;
                    }
                    echo('     </span>
                            </td>');
                    echo('  <td data-label="Etudiant" id='.  encrypt($infosEtudiant->email).'>
                                <span class="td-responsive">
                                    '.$infosEtudiant->nom.' '.$infosEtudiant->prenom.'
                                </span>
                            </td>');
                    echo('  <td data-label="Classe">
                                <span class="td-responsive">
                                    '.$infosClasse->libelleSection.' '.$infosClasse->niveau.'
                                </span>
                            </td>');
                    echo('  <td data-label="Libellé">                                            
                                <span class="td-responsive">
                                    '.$unStage['libelle'].'
                                </span>
                            </td>');
                    echo('  <td data-label="Descriptif">
                                <span class="td-responsive">
                                    '.$unStage['descriptif'].'
                                </span>
                            </td>');
                    echo('  <td data-label="Action">                                            
                                <span class="td-responsive">
                                    <button class="fa fa-check-circle fa-lg confirm">
                                    </button>
                                    <button class="fa fa-times-circle fa-lg refuse">
                                    </button>
                                </span>
                            </td>
                            <div>');
                    echo('</tr>');
                }
            ?>
        </tbody>
    </table>

</div>

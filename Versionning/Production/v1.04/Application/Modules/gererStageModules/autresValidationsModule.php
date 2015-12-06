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
            <?php
                if(count($autreStages)== 0)
                {
                    echo('<tr class="odd"><td class="dataTables_empty" colspan="8" valign="top">Aucun élément à afficher</td></tr>');
                }
                foreach($autreStages as $unStage)
                {
                    $infosEtudiant = getInfosEtudiantCodeInscription($unStage['codeInscription'], $connexion);
                    $infosClasse = getInfosClasse($unStage['codeInscription'], $connexion);
                    $infoEnseignantReferent = getInfosEnseignantReferentEmail($unStage['enseignantReferent'], $connexion);
                    
                    echo('<tr id="'.$unStage['codeStage'].'">');
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
                    echo('  <td data-label="Etudiant">
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
                    echo('  <td data-label="Professeur">                                            
                                <span class="td-responsive">
                                    '.$infoEnseignantReferent->prenom.' '.$infoEnseignantReferent->nom.'
                                </span>
                            </td>');
                    echo('</tr>');
                }
            ?>
        </tbody>
    </table>

</div>
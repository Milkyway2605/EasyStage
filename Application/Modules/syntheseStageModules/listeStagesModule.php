<table id="listeStages">
    <thead>
        <tr>
            <th>Etat</th>
            <th>Etudiant</th>
            <th>Classe</th>
            <th>Organisme d'accueil</th>
            <th>Adresse de l'organisme</th>
            <th>Télephone de l'organisme</th>
            <th class="hide">Année</th>
            <th class="hide">Stage</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lesEtudiants as $unEtudiant)
        {
            if($unEtudiant['nomOrganisme'] == null)
            {
                $unEtudiant['nomOrganisme'] = "/";
                $unEtudiant['adresseOrganisme'] = "/";
                $unEtudiant['telephoneOrganisme'] = "/";
                $stage = "Non";
                $circle="circle-red";
            }
            else
            {
                $stage = "Oui";
                $circle="circle-green";
            }
        ?>
            <tr data-toggle="modal" class="sansStage" href="#">
                <td data-label="Etat">
                    <span class="td-responsive">
                        <div class="<?php echo($circle); ?>"></div>
                    </span>
                </td>
                <td data-label="Etudiant">
                    <span class="td-responsive">  
                        <?php echo($unEtudiant['nom'].' '.$unEtudiant['prenom']);?>
                    </span>
                </td> 
                <td data-label="Classe">
                    <span class="td-responsive">
                        <?php echo($unEtudiant['classe']);?>
                    </span>
                </td>  
                <td data-label="Organisme d'accueil">                                            
                    <span class="td-responsive">
                        <?php echo($unEtudiant['nomOrganisme']);?>
                    </span>
                </td>  
                <td data-label="Adresse de l'organisme">
                    <span class="td-responsive">
                        <?php echo($unEtudiant['adresseOrganisme']);?>
                    </span>
                </td>  
                <td data-label="Télephone de l'organisme">                                            
                    <span class="td-responsive">
                        <?php echo($unEtudiant['telephoneOrganisme']);?>
                    </span>
                </td>
                <td class="hide">                                            
                    <?php echo(dateAnglaisVersFrancais($unEtudiant['dateDebut'])
                    .'-'.dateAnglaisVersFrancais($unEtudiant['dateFin']));?>
                </td>
                <td class="hide">                                            
                    <?php echo($stage);?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
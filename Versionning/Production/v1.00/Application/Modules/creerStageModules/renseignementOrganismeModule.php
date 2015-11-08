<div class="tab-pane fade" id="renseignementOrganisme">

    <legend>Renseignement sur l'organisme</legend>
    <div class="form-group">
        <fieldset>                
            <div class="panel" id="choixOrganismeContainer">
                <div class="panel-heading">

                    <label class="checkbox-inline" for="organismeExistant">
                        <input type="checkbox" name="organismeExistant"
                        id="organismeExistant"> Choisir un organisme déjà existant
                    </label>

                </div>

                <div class="panel-collapse collapse" id="containerChoixOrganismeExistant">
                    <div class="panel-body">
                        <select id="choixOrganismeExistant" name="choixOrganismeExistant" class="form-control">
                            <?php

                                foreach ($lesOrganismes as $unOrganisme)
                                {
                                    echo('<option value="'.$unOrganisme['codeOrganisme'].'" '
                                            . 'data-nom="'.$unOrganisme['nom'].'" '
                                            . 'data-adresse="'.$unOrganisme['adresse'].'" '
                                            . 'data-ville="'.$unOrganisme['ville'].'" '
                                            . 'data-codePostal="'.$unOrganisme['codePostal'].'" '
                                            . 'data-metierPrincipal="'.$unOrganisme['metierPrincipal'].'" '
                                            . 'data-telephone="'.$unOrganisme['telephone'].'">'
                                          .$unOrganisme['nom'].', '.$unOrganisme['ville'].'</option>');
                                }

                            ?>
                        </select>
                    </div>
                </div>
            </div>                                
        </fieldset>
    </div>
    <div class="form-group">
        <label for="nomOrganisme">Nom : </label>
        <input id="nomOrganisme" name='nomOrganisme' 
        type="text" class="form-control" placeholder="ex: Lycée André Malraux">
    </div>
    <div class="form-group">
        <label for="metierPrincipal">Métier principal : </label>
        <input id="metierPrincipal" name='metierPrincipal' 
        type="text" class="form-control" placeholder="ex: Enseignement">
    </div>
    <div class="form-group">
        <label for="adresseOrganisme">Adresse : </label>
        <input id="adresseOrganisme" name='adresseOrganisme' 
        type="text" class="form-control" placeholder="ex: 314 Rue Jules Massenet">
    </div>
    <div class="form-group">
        <label for="villeOrganisme">Ville : </label>
        <input id="villeOrganisme" name='villeOrganisme' 
        type="text" class="form-control" placeholder="ex: Béthune">
    </div>
    <div class="form-group">
        <label for="codePostalOrganisme">Code Postal : </label>
        <input id="codePostalOrganisme" name='codePostalOrganisme' 
        type="text" class="form-control" placeholder="ex: 62400"
        data-mask="99999">
    </div>
    <div class="form-group">
        <label for="telephoneOrganisme">Téléphone : </label>
        <input id="telephoneOrganisme" name='telephoneOrganisme' 
        type="text" class="form-control" data-mask="99.99.99.99.99"
        placeholder="ex: 03.21.64.61.61">
    </div>

</div>
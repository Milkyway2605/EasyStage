                    <div class="tab-pane fade" id="renseignementSignataire">

                        <legend>Renseignement sur le signataire</legend>
                        <div class="form-group">
                            <fieldset>                
                                <div class="panel" id="choixSignataireContainer">
                                    <div class="panel-heading">

                                        <label class="checkbox-inline" for="signataireExistant">
                                            <input type="checkbox" name="signataireExistant"
                                            id="signataireExistant"> Choisir un signataire existant pour l'organisme
                                        </label>

                                    </div>

                                    <div class="panel-collapse collapse" id="containerChoixSignataireExistant">
                                        <div class="panel-body">
                                            <select id="choixSignataireExistant" class="form-control" name="choixSignataireExistant">
                                                <?php
                                                
                                                    foreach ($lesSignataires as $unSignataire)
                                                    {
                                                        echo('<option value="'.$unSignataire['codeEmploye'].'" '
                                                                . 'data-nom="'.$unSignataire['nom'].'" '
                                                                . 'data-prenom="'.$unSignataire['prenom'].'" '
                                                                . 'data-telephone="'.$unSignataire['telephone'].'" '
                                                                . 'data-email="'.$unSignataire['email'].'" '
                                                                . 'data-fonction="'.$unSignataire['fonction'].'" '
                                                                . 'data-codeEntreprise="'.$unSignataire['codeOrganisme'].'">'
                                                                .$unSignataire['nom'].' '
                                                                .$unSignataire['prenom'].'</option>');
                                                    }
                                                
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label for="nomSignataire">Nom : </label>
                            <input id="nomSignataire" name='nomSignataire' 
                            type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="prenomSignataire">Prenom : </label>
                            <input id="prenomSignataire" name='prenomSignataire' 
                            type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telephoneSignataire">Téléphone : </label>
                            <input id="telephoneSignataire" name='telephoneSignataire' 
                            type="text" class="form-control" data-mask="99.99.99.99.99">
                        </div>
                        <div class="form-group">
                            <label for="emailSignataire">E-mail : </label>
                            <input id="emailSignataire" name='emailSignataire' 
                            type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fonctionSignataire">Fonction : </label>
                            <input id="fonctionSignataire" name='fonctionSignataire' 
                            type="text" class="form-control" placeholder="ex: Directeur des ressources humaines">
                        </div>

                    </div>
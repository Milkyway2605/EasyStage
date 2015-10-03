                    <div class="tab-pane fade" id="renseignementTuteur">

                        <legend>Renseignement sur le tuteur</legend>
                        <div class="form-group">
                            <fieldset>
                                <label class="checkbox-inline" for="tuteurIdentique">
                                    <input type="checkbox" name="tuteurIdentique"
                                    id="tuteurIdentique"> Le tuteur est identique au signataire
                                </label>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>                
                                <div class="panel" id="choixTuteurContainer">
                                    <div class="panel-heading">

                                        <label class="checkbox-inline" for="tuteurExistant">
                                            <input type="checkbox" name="tuteurExistant"
                                            id="tuteurExistant"> Choisir un tuteur existant pour l'organisme
                                        </label>

                                    </div>

                                    <div class="panel-collapse collapse" id="containerChoixTuteurExistant">
                                        <div class="panel-body">
                                            <select id="choixTuteurExistant" class="form-control">
                                                <?php
                                                
                                                    foreach ($lesTuteurs as $unTuteur)
                                                    {
                                                        echo('<option value="'.$unTuteur['codeEmploye'].'" '
                                                                . 'data-nom="'.$unTuteur['nom'].'" '
                                                                . 'data-prenom="'.$unTuteur['prenom'].'" '
                                                                . 'data-telephone="'.$unTuteur['telephone'].'" '
                                                                . 'data-email="'.$unTuteur['email'].'" '
                                                                . 'data-fonction="'.$unTuteur['fonction'].'" '
                                                                . 'data-codeEntreprise="'.$unTuteur['codeEntreprise'].'">'
                                                                .$unTuteur['nom'].' '
                                                                .$unTuteur['prenom'].'</option>');
                                                    }
                                                
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label for="nomTuteur">Nom : </label>
                            <input id="nomTuteur" name='nomTuteur' 
                            type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="prenomTuteur">Prenom : </label>
                            <input id="prenomTuteur" name='prenomTuteur' 
                            type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telephoneTuteur">Téléphone : </label>
                            <input id="telephoneTuteur" name='telephoneTuteur' 
                            type="text" class="form-control" data-mask="99.99.99.99.99">
                        </div>
                        <div class="form-group">
                            <label for="emailTuteur">E-mail : </label>
                            <input id="emailTuteur" name='emailTuteur' 
                            type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fonctionTuteur">Fonction : </label>
                            <input id="fonctionTuteur" name='fonctionTuteur' 
                            type="text" class="form-control" placeholder="ex: Technicien">
                        </div>

                    </div>
                    <div class="tab-pane fade" id="informationsPersonnelles">

                        <legend>Informations personnelles</legend>
                        <div class="form-group">
                            <label for="nom">Nom : </label>
                            <input id="nom" name="nom" type="text" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="prenom">Prénom : </label>
                            <input id="prenom" name="prenom" type="text" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="dateNaissance">Date de naissance : </label>
                            <input type="text" id="dateNaissance" name="dateNaissance" class="form-control"
                            data-provide="datepicker" readonly>
                        </div>
                        <div class="form-group ">                        
                            <label>Sexe : </label>
                            <fieldset>
                                <div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1
                                col-sm-5 col-sm-offset-1">
                                    <label for="masculin" class="radio-inline">
                                        <input type="radio" name="sexe" value="0" id="masculin">
                                        Masculin 
                                    </label>
                                </div>

                                <div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1
                                col-sm-5 col-sm-offset-1">
                                    <label for="feminin" class="radio-inline">
                                        <input type="radio" name="sexe" value="1" id="feminin">
                                        Féminin 
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                    </div>


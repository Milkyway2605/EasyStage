                    <div class="tab-pane fade active in" id="sujetStage">

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
                            <select id="periodeStage" class="form-control" required>
                                <?php
                                
                                    $lesPeriodes = getLesPeriodes($codeClasse, $anneeScolaire, $connexion);
                                    
                                    foreach($lesPeriodes as $unePeriode)
                                    {
                                        $dateDebut = dateAnglaisVersFrancais($unePeriode['dateDebut']);
                                        $dateFin = dateAnglaisVersFrancais($unePeriode['dateFin']);
                                        echo('<option value="'.$unePeriode['codePeriode'].'">Du '.$dateDebut.' jusqu\'au '.$dateFin.'</option>');
                                    }
                                
                                ?>
                            </select>
                        </div>

                    </div>
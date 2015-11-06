                    <div class="tab-pane fade" id="choixProfesseur">      
                            <legend>Choix d'un enseignant référent</legend>
                            <div class="form-group">
                                <label for="selectionEnseignant">Sélectionner un enseignant : </label>
                                <select id="selectionEnseignant" class="form-control" name="selectionEnseignant">
                                    <?php
                                    
                                        foreach($lesEnseignantsReferents as $unEnseignantReferent)
                                        {
                                            echo('<option value="'.$unEnseignantReferent['email'].'">'
                                            .$unEnseignantReferent['prenom'].' '
                                            .$unEnseignantReferent['nom'].'</option>');
                                        }
                                    
                                    ?>
                                </select>
                            </div>
                    </div>
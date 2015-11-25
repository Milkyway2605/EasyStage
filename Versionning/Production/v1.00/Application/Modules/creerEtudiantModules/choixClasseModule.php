                    <div class="tab-pane fade" id="choixClasse">

                        <legend>Choix d'une classe</legend>
                        <div class="form-group">
                        <label for="section">Section : </label>
                        <select id="section" name="section" class="form-control">
                            <?php
                            
                                foreach($lesSection as $uneSection)
                                {
                                    echo('<option data-nbNiveau="'.$uneSection['nbNiveau']
                                        .'" value="'.$uneSection['codeSection'].'">'
                                        .$uneSection['libelleSection'].'</option>');
                                }
                                
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau : </label>
                        <select id="niveau" name="niveau" class="form-control">
                        </select>
                    </div>

                    </div>

<div class="tab-pane fade active in" id="selectionClasse">
    <div class="panel col-lg-4 col-lg-offset-4">
        <div class="panel-heading">
            <div class="panel-title">Sélectionner une classe</div>
        </div>
        <div class="panel-body">                            
            <form class="col-lg-10 col-lg-offset-1">
                <div class="form-group">
                    <label for="annee">Année :</label>
                    <select id="annee" name="annee" class="form-control" required>
                        <?php
                            $i = 1;
                            foreach($lesAnnees as $uneAnnee)
                            {
                                if($i == 1)
                                {
                                    $selected = "selected";
                                }
                                else
                                {
                                    $selected = "";
                                }
                                echo('<option '.$selected.' value="'.$uneAnnee['anneeScolaire'].'">'.$uneAnnee['anneeScolaire'].'</option>');
                            }
                                
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="section">Section : </label>
                    <select id="section" name="section" class="form-control" required>
                    </select>
                </div>
                <div class="form-group">
                    <label for="niveau">Niveau : </label>
                    <select id="niveau" name="niveau" class="form-control" required>
                    </select>
                </div>
                <p class="centrerButton">
                    <input type="button" value="Afficher la classe" class="btn" href="#affichageClasse" data-toggle="tab">
                </p>
            </form> 
        </div>
    </div>
</div>


                        <?php
//                            foreach($lesSections as $uneSection)
//                            {
//                                echo('<option value="'.$uneSection['codeSection'].'" data-nbNiveau="'.$uneSection['nbNiveau'].
//                                    '">'.$uneSection['libelleSection'].'</option>');
//                            }
                        ?>
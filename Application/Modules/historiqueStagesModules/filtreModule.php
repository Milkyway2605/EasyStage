<fieldset>
    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
        <label for="section" class="col-xs-2 col-md-4 col-lg-4 no-padding">Section :</label>
        <select id="section" class="col-xs-10 col-md-7 no-padding">
                <option value="">Toutes</option>
                <?php
                    foreach($lesSections as $uneSection)
                    {
                        echo('<option data-nbNiveau="'.$uneSection['nbNiveau'].'" value="'.$uneSection['libelleSection'].'">'.$uneSection['libelleSection'].'</option>');
                    }
                ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
        <label for="classe" class="col-xs-2 col-md-4 col-lg-4 no-padding">Classe :</label>
        <select id="classe" class="col-xs-10 col-md-7 no-padding" disabled>
            <option value="">Toutes</option>
        </select>
    </div>
    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
        <label for="annee" class="col-xs-2 col-md-4 col-lg-4 no-padding">Année :</label>
        <select id="annee" class="col-xs-10 col-md-7 no-padding">
            <option value="">Toutes</option>
            <?php
                    foreach($lesAnnees as $uneAnnee)
                    {
                        echo('<option value="'.$uneAnnee['dateDebut'].'">'.$uneAnnee['dateDebut'].'</option>');
                    }
                ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-3 col-lg-2 no-padding">
        <label for="stage" class="col-xs-2 col-md-4 col-lg-4 no-padding">Stage :</label> 
        <select id="stage" class="col-xs-10 col-md-7 no-padding">
            <option value="">Tous</option>
            <option value="Oui">Avec</option>
            <option value="Non">Sans</option>
        </select>
    </div>
</fieldset>

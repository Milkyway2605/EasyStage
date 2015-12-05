<fieldset>
    <div class="col-xs-12 col-md-12 col-lg-3 no-padding">
        <label for="section" class="col-xs-2 col-md-2 col-lg-4 no-padding">Section :</label>
        <select id="section" class="col-xs-10 col-md-8 col-lg-7 no-padding">
                <option value="">Toutes</option>
                <?php
                    foreach($lesSections as $uneSection)
                    {
                        echo('<option data-nbNiveau="'.$uneSection['nbNiveau'].'" value="'.$uneSection['libelleSection'].'">'.$uneSection['libelleSection'].'</option>');
                    }
                ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-3 no-padding">
        <label for="classe" class="col-xs-2 col-md-2 col-lg-4 no-padding">Classe :</label>
        <select id="classe" class="col-xs-10 col-md-8 col-lg-7 no-padding" disabled>
            <option value="">Toutes</option>
        </select>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-3 no-padding">
        <label for="periode" class="col-xs-2 col-md-2 col-lg-4 no-padding">Période :</label>
        <select id="periode" class="col-xs-10 col-md-8 col-lg-7 no-padding" disabled>
            <option value="">Pas de période disponible</option>
        </select>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-3 no-padding">
        <label for="stage" class="col-xs-2 col-md-2 col-lg-4 no-padding">Stage :</label> 
        <select id="stage" class="col-xs-10 col-md-8 col-lg-7 no-padding">
            <option value="">Tous</option>
            <option value="Oui">Avec</option>
            <option value="Non">Sans</option>
        </select>
    </div>
</fieldset>

<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/stagesStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/stagesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'stages'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Création d'un stage
    <small>Remplir les champs pour créer un stage.</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-10 col-lg-offset-1 col-md-12'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Création d'un stage</div>
        </div>
        <div class='panel-body'>
            <form method="POST" action="creerStage.php" id="creerStage">
                <ul class='nav nav-tabs col-lg-5 col-md-5 hide4small'>
                    <li class='col-md-12 active'>
                        <a href="#sujetStage" class="step">
                        1. Sujet de stage
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#renseignementOrganisme" class="step">
                        2. Renseignement sur l'organisme
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#renseignementSignataire" class="step">
                        3. Renseignement sur le signataire
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#renseignementTuteur" class="step">
                        4. Renseignement sur le tuteur
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#choixProfesseur" class="step">
                        5. Choix d'un enseignant référent
                        </a>
                    </li>
                </ul>
                <div class="tab-content col-lg-7 col-md-7">
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
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>

                    </div>
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

                                    <div id="containerPeriodeStage" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <select id="periodeStage" class="form-control" required>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
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
                            type="text" class="form-control" placeholder="ex: 314 Rue Jules Massenet, 62400 Béthune">
                        </div>
                        <div class="form-group">
                            <label for="telephoneOrganisme">Téléphone : </label>
                            <input id="telephoneOrganisme" name='telephoneOrganisme' 
                            type="text" class="form-control" data-mask="99.99.99.99.99"
                            placeholder="ex: 03.21.64.61.61">
                        </div>

                    </div>
                    <div class="tab-pane fade" id="renseignementSignataire">

                        <legend>Renseignement sur le signataire</legend>
                        <div class="form-group">
                            <label for="nomSignataire">Nom : </label>
                            <input id="nomSignataire" name='nomSignataire' 
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
                            type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fonctionSignataire">Fonction : </label>
                            <input id="fonctionSignataire" name='fonctionSignataire' 
                            type="text" class="form-control" placeholder="ex: Directeur des ressources humaines">
                        </div>

                    </div>
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
                            <label for="nomTuteur">Nom : </label>
                            <input id="nomTuteur" name='nomTuteur' 
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
                    <div class="tab-pane fade" id="choixProfesseur">      
                            <legend>Choix d'un enseignant référent</legend>
                            <div class="form-group">
                                <label for="select">Sélectionner un enseignant : </label>
                                <select id="select" class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class='col-md-4 col-md-offset-5 col-xs-12'>
                    <div class='pull-left'>
                        <a class='btn inactive' id='btnPrevious'>Précédent</a>
                        <input type="submit" class='btn' id='btnNext' value="Suivant">
                    </div>
                </div>
                <div class='col-md-3'>
                    <input type='submit' class='pull-right btn hide' id="btnCreerStage" 
                    value="Créer le stage">
                </div>
            </form>
        </div>
    </div>
</article>
    
<?php
include_once '../Application/Base/layout_content_03.php';
include_once '../Application/Base/layout_footer.php';
include_once '../Application/Base/layout_baseJavascript.php';
?>
<script src="../Application/Ressources/Javascript/creationStageScript.js" type="text/javascript"></script>
<?php
include_once '../Application/Base/layout_endPage.php';
?>

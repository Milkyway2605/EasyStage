<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/utilisateursStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/utilisateursResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'utilisateurs'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Etudiants
    <small>Créer un étudiant</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
 <article class='article col-lg-10 col-lg-offset-1 col-md-12'>
    <div class='panel'>
        <div class='panel-heading'>
            <div class="panel-title">Création d'un étudiant</div>
        </div>
        <div class='panel-body'>
            <form method="POST" action="creerEtudiant.php" id="creerEtudiant">
                <ul class='nav nav-tabs col-lg-5 col-md-5 hide4small'>
                    <li class='col-md-12 active'>
                        <a href="#informationsCompte" class="step">
                        1. Informations du compte
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#informationsPersonnelles" class="step">
                        2. Informations personnelles
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#coordonnees" class="step">
                        3. Coordonnées
                        </a>
                    </li>
                    <li class='col-md-12'>
                        <a href="#choixClasse" class="step">
                        4. Choix d'une classe
                        </a>
                    </li>
                </ul>
                <div class="tab-content col-lg-7 col-md-7">
                    
                    <div class="tab-pane fade active in" id="informationsCompte">

                        <legend>Informations du compte</legend>
                        <div class="form-group">
                            <label for="email">Adresse e-mail : </label>
                            <input id="email" name="email" type="email" class="form-control"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe : </label>
                            <input id="password" name="password" type="password" class="form-control" 
                            required >
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmation">Confirmation du mot de passe : </label>
                            <input id="passwordConfirmation" name="passwordConfirmation" type="password" class="form-control" 
                            required>
                        </div>

                    </div>
                    
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
                                        <input type="radio" name="sexe" value="masculin" id="masculin">
                                        Masculin 
                                    </label>
                                </div>

                                <div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1
                                col-sm-5 col-sm-offset-1">
                                    <label for="feminin" class="radio-inline">
                                        <input type="radio" name="sexe" value="feminin" id="feminin">
                                        Féminin 
                                    </label>
                                </div>
                            </fieldset>              
                        </div>

                    </div>
                    
                    <div class="tab-pane fade" id="coordonnees">

                        <legend>Coordonnées</legend>
                        <div class="form-group ">
                            <label for="adresse">Adresse : </label>
                            <input id="adresse" name="adresse" type="text" class="form-control" 
                            placeholder="ex: 314 Rue Jules Massenet">
                        </div>
                        <div class="form-group ">
                            <label for="ville">Ville : </label>
                            <input id="ville" name="ville" type="text" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="codePostal">Code Postal : </label>
                            <input id="codePostal" name="codePostal" type="text" class="form-control"
                            data-mask='99999'>
                        </div>
                        <div class="form-group ">
                            <label for="telephone">Téléphone portable : </label>
                            <input id="telephone" name="telephone" type="tel" class="form-control"
                            data-mask='99.99.99.99.99'>
                        </div>

                    </div>
                    
                    <div class="tab-pane fade" id="choixClasse">

                        <legend>Choix d'une classe</legend>
                        <div class="form-group">
                        <label for="section">Section : </label>
                        <select id="section" name="section" class="form-control">
                            <option value="SIO">SIO</option>
                            <option>MUC</option>
                            <option>Etudiant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau : </label>
                        <select id="niveau" name="niveau" class="form-control">
                            <option value="1">1ère année</option>
                            <option value="2">2ème année</option>
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
                    <input type='submit' class='pull-right btn hide' id="btnCreerEtudiant" 
                    value="Créer l'étudiant">
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
<script src="../Application/Ressources/Javascript/creationEtudiantScript.js" type="text/javascript"></script>
<?php
include_once '../Application/Base/layout_endPage.php';
?>


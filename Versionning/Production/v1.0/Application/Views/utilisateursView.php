<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/utilisateursStyle.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'utilisateurs'));
include_once '../Application/Base/layout_content_01.php';
?>
    
    Utilisateurs
    <small>Créer et gérer des utilisateurs</small>

<?php
include_once '../Application/Base/layout_content_02.php';
?>
    
    <article class="col-md-10 col-md-offset-1">
        <div class="panel form-container">
            <div class="panel-body">
                    <h2>Informations générales</h2>
                    <form>
                        <fieldset class='col-lg-6'>
                            <div class="form-group col-lg-10 col-lg-offset-1">
                                <label for="email">Adresse email de l'utilisateur : </label>
                                <input id="email" name="email" type="email" class="form-control"
                                required>
                            </div>
                            <div class="form-group col-lg-10 col-lg-offset-1">
                                <label for="nom">Mot de passe : </label>
                                <input id="nom" name="nom" type="text" class="form-control" 
                                required>
                            </div>
                            <div class="form-group col-lg-10 col-lg-offset-1">
                                <label for="nom">Confirmation du mot de passe : </label>
                                <input id="nom" name="nom" type="text" class="form-control" 
                                required>
                            </div>
                            <div class="form-group col-lg-10 col-lg-offset-1">
                                <label for="select">Type d'utilisateur : </label>
                                <select id="select" class="form-control" required>
                                    <option>Administrateur</option>
                                    <option>Enseignant</option>
                                    <option>Etudiant</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class='col-lg-6'>
                            <div class="form-group col-lg-10 col-lg-offset-1">
                                <label for="nom">Nom de l'utilisateur : </label>
                                <input id="nom" name="nom" type="text" class="form-control" 
                                required>
                            </div>
                            <div class="form-group col-lg-10 col-lg-offset-1">
                                <label for="prenom">Prénom de l'utilisateur : </label>
                                <input id="prenom" name="prenom" type="text" class="form-control" 
                                required>
                            </div>
                        </fieldset>
                        <fieldset class='col-lg-6'>

                        </fieldset>
                    </form>
            </div>
        </div>
    </article>
    
    <article class="col-md-10 col-md-offset-1">
        <div class="panel form-container">
            <div class="panel-body">
                    <h2>Informations complémentaires</h2>
                    <form>
                        <div class="form-group col-lg-8 col-lg-offset-2">
                            <label for="telephone">Téléphone de l'étudiant : </label>
                            <input id="telephone" name="telephone" type="tel" class="form-control"
                            required>
                        </div>
                        <div class="form-group col-lg-8 col-lg-offset-2">
                            <label for="nom">Nom de l'utilisateur : </label>
                            <input id="nom" name="nom" type="text" class="form-control" 
                            required>
                        </div>
                        <div class="form-group col-lg-8 col-lg-offset-2">
                            <label for="prenom">Prénom de l'utilisateur : </label>
                            <input id="prenom" name="prenom" type="text" class="form-control" 
                            required>
                        </div>
                        <div class="form-group col-lg-8 col-lg-offset-2">
                            <label for="select">Type d'utilisateur : </label>
                            <select id="select" class="form-control" required>
                                <option>Administrateur</option>
                                <option>Enseignant</option>
                                <option>Etudiant</option>
                            </select>
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

<?php
include_once '../Application/Base/layout_endPage.php';
?>


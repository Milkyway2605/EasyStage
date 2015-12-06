<?php
include_once 'Base/layout_head_01.php';
?>

<?php
include_once 'Base/layout_head_02.php';
include_once 'Base/layout_content_01.php';
?>
                    <p id='signupInformation'>Bienvenu(e) Prénom Nom. 
                    Merci de renseigner quelques informations supplémentaires pour valider votre inscription.</p>
                    <hr>
                    <form method="POST" action="authentification.php">
                        <div class="input-group">
                            <input type='password' id="login" name="login" class='
                            form-control' placeholder="Saisir votre mot de passe" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-lock"></span>
                            </div>
                        </div><br>
                        <div class="input-group">
                            <input type='password' id="login" name="login" class='
                            form-control' placeholder="Confirmer votre mot de passe" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-repeat"></span>
                            </div>
                        </div><br>
                        <input type='submit' id="submit" name="submit" 
                        value="Valider l'inscription" class='form-control btn'></br>
                    </form>

<?php
include_once 'Base/layout_content_02.php';
include_once 'Base/layout_baseJavascript.php';
?>
    
<?php
include_once 'Base/layout_endPage.php';
?>
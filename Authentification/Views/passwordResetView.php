<?php
include_once '../Authentification/Base/layout_head_01.php';
?>

<?php
include_once '../Authentification/Base/layout_head_02.php';
include_once '../Authentification/Base/layout_content_01.php';
?>
                    <p id='signupInformation'>Vous avez demandé la réinitialisation
                    de votre mot de passe. Veuillez saisir votre nouveau mot de passe
                    et confirmer celui-ci.</p>
                    <hr>
                    <form method="POST" action="passwordReset.php?email=<?php echo($email.'&cle='.$cle);?>">
                        <div class="input-group">
                            <input type='password' id="password" name="password" class='
                            form-control' placeholder="Saisir votre mot de passe" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-lock"></span>
                            </div>
                        </div><br>
                        <div class="input-group">
                            <input type='password' id="passwordConfirmation" name="passwordConfirmation" 
                            class='form-control' placeholder="Confirmer votre mot de passe" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-repeat"></span>
                            </div>
                        </div><br>
                        <input type='submit' id="submit" name="submit" 
                        value="Modifier le mot de passe" class='form-control btn'></br>
                    </form>

<?php
include_once '../Authentification/Base/layout_content_02.php';
include_once '../Authentification/Base/layout_baseJavascript.php';
?>
    
<?php
include_once '../Authentification/Base/layout_endPage.php';
?>
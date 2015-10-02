<?php
include_once '../Authentification/Base/layout_head_01.php';
?>

<?php
include_once '../Authentification/Base/layout_head_02.php';
include_once '../Authentification/Base/layout_content_01.php';
?>

                    <p id='passwordInstruction'>Un email contenant les instructions pour réinitaliser votre
                        mot de passe sera envoyé à l'adresse mail saisie.</p>
                    <form method="POST" action="forgetPassword.php">
                        <div class="input-group">
                            <input type='email' id="email" name="email" class='
                            form-control' placeholder="E-mail" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                        </div><br>
                        <input type='submit' id="submit" name="submit" 
                        value="Soumettre" class='form-control btn'></br>
                    </form>

<?php
include_once '../Authentification/Base/layout_content_02.php';
include_once '../Authentification/Base/layout_baseJavascript.php';
?>
    
<?php
include_once '../Authentification/Base/layout_endPage.php';
?>
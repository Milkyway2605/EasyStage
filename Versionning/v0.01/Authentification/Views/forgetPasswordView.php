<?php
include_once '../Authentification/Base/layout_head_01.php';
?>

<?php
include_once '../Authentification/Base/layout_head_02.php';
include_once '../Authentification/Base/layout_content_01.php';
?>                        
                    <?php
                        if(isset($emailExistant))
                        {
                            if($emailExistant == true)
                            {
                                echo('<p id="passwordInstruction" class="alert-success">
                                    Un lien de récupération de mot de passe vous a été envoyé à l\'adresse email saisie.
                                    Merci de consulter votre courriel indésirable en cas de non-réception du mail.
                                    </p>
                                    <a href="http://easystage.malrauxbethune.fr" class="btn">
                                        Retour à l\'accueil
                                    </a>');
                            }
                            else
                            {
                                echo('<p id="passwordInstruction" class="alert-danger">
                                    L\'adresse email saisie ne correspond à aucun compte.
                                    </p>
                                    <form method="POST" action="forgetPassword.php">
                                        <div class="input-group">
                                            <input type="email" id="email" name="email" class="
                                            form-control" placeholder="E-mail" required="true">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                            </div>
                                        </div><br>
                                        <input type="submit" id="submit" name="submit" 
                                        value="Soumettre" class="form-control btn"></br>
                                    </form>');
                            }
                        }
                        else
                        {
                            echo('<p id="passwordInstruction" class="alert-info">
                                    Un email contenant les instructions pour réinitialiser votre mot de passe sera envoyé à l\'adresse mail saisie.
                                </p>
                                <form method="POST" action="forgetPassword.php">
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" class="
                                        form-control" placeholder="E-mail" required="true">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                    </div><br>
                                    <input type="submit" id="submit" name="submit" 
                                    value="Soumettre" class="form-control btn"></br>
                                </form>');
                        }
                    ?>

<?php
include_once '../Authentification/Base/layout_content_02.php';
include_once '../Authentification/Base/layout_baseJavascript.php';
?>
    
<?php
include_once '../Authentification/Base/layout_endPage.php';
?>
<?php
include_once '../Authentification/Base/layout_head_01.php';
?>

<?php
include_once '../Authentification/Base/layout_head_02.php';
include_once '../Authentification/Base/layout_content_01.php';
?>
                    <p id='loginError'>Email ou mot de passe incorrect</p>
                    <form method="POST" action="connexion.php">
                        <div class="input-group">
                            <input type='email' id="email" name="email" class='
                            form-control' placeholder="E-mail" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                        </div><br>
                        <div class="input-group">
                            <input type='password' id="password" name="password" 
                            class='form-control' placeholder="Mot de passe" required="true">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </div>
                        </div><br>
                        <input type='submit' id="submit" name="submit" 
                        value="Connexion" class='form-control btn'></br>
                    </form>

<?php
include_once '../Authentification/Base/layout_content_02.php';
include_once '../Authentification/Base/layout_baseJavascript.php';
?>
    
<?php
include_once '../Authentification/Base/layout_endPage.php';
?>
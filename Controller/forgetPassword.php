<?php
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesUtilisateurs.php';
include_once 'Application/Features/cryptage.php';

$connexion = getConnexion();

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $emailExistant = checkEmail($email, $connexion);
    
    if($emailExistant != false)
    {
        $cle = md5(microtime(TRUE)*100000);
        $finValidite = time() + (0 * 24 * 0 * 0);
        setCle($email, $cle, $finValidite, $connexion);
        $headers ='From: "EasyStage"<easystage@malrauxbethune.fr>'."\n";
        $headers .='Reply-To: bts.sio@malrauxbethune.fr'."\n";
        $headers .='Content-Type: text/html; charset="UTF-8"'."\n";
        $headers .='Content-Transfer-Encoding: 8bit';

        $message ='
        <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body style="color: #888; font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; font-size: 14px; line-height: 1.42857; background-color: #FFF; margin: 0px;">
                <div>
                    <div style="text-align: center; margin: 30px auto auto; min-width: 290px; width: 25%; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05); background-color: #FFF; border: 1px solid #DDD; border-radius: 4px;">
                        <div style="height: 240px; background: transparent url(http://sio2.malrauxbethune.fr/easystage/Authentification/Base/Ressources/Images/logoEasyStage.png) no-repeat scroll center top; border: medium none; color: #333; padding: 10px 15px; border-top-left-radius: 3px; border-top-right-radius: 3px; text-align: center;"> 
                        </div>
                        <div style="padding: 15px; text-align: center;">
                            <p style="margin: 0px 0px 10px; ">Les stages n\'ont jamais été aussi simple.</p>
                            <hr style="margin-top: 20px; margin-bottom: 20px; border-width: 1px 0px 0px; border-style: solid; border-color: #DDD;-moz-border-top-colors: none;-moz-border-right-colors: none;-moz-border-bottom-colors: none;-moz-border-left-colors: none; border-image: none; height: 0px; box-sizing: content-box;">
                            <div style="text-align: justify">
                            <p>Madame, monsieur</p>
                            <p>Merci de cliquer sur le lien ci-dessous pour accéder à la page de récupération de votre mot de passe. 
                                Ce lien n\'est valide que pour une période de 24 heures et une récupération de mot de passe.
                                Après quoi, il sera rendu inutilisable.</p>
                            <p>En cas de problème avec la réinitialisation de mot de passe, merci de contacter un administrateur.</p>
                            </div>
                            <a href="http://localhost/EasyStage/passwordReset.php?email='.$email.'&cle='.$cle.'" style="text-decoration: none; cursor: pointer; background-color: #466FC1; color: #FFF; display: inline-block; padding: 6px 12px; margin-bottom: 0px; font-size: 14px; font-weight: 400; line-height: 1.42857; text-align: center; white-space: nowrap; vertical-align: middle; -moz-user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px;">
                                Réinitialiser mon mot de passe
                            </a>
                        </div>
                    </div>
                </div>
            </body>
        </html>';

        $mail = mail($email, '[NE PAS REPONDRE] Réinitialisation de votre mot de passe', $message, $headers);
    }
}

include_once 'Authentification/Views/forgetPasswordView.php';

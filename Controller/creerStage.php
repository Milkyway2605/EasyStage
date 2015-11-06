<?php
session_start();

//Fonction utilitaires
include_once 'Application/Features/backConnexion.php';
include_once 'Application/Features/getAnneeScolaire.php';
include_once 'Application/Features/date.php';

//Fonction d'accès aux données
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesPeriodeStage.php';
include_once 'Modeles/accesOrganisme.php';
include_once 'Modeles/accesClasse.php';
include_once 'Modeles/accesEnseigne.php';
include_once 'Modeles/accesEmployes.php';
include_once 'Modeles/accesOrganisme.php';
include_once 'Modeles/accesSignataire.php';
include_once 'Modeles/accesTuteur.php';
include_once 'Modeles/accesInscrit.php';
include_once 'Modeles/accesStage.php';

backConnexion();
$connexion = getConnexion();
$anneeScolaire = getAnneeScolaire();
$codeClasse = (int)$_SESSION['codeClasse'];
$lesOrganismes = getLesOrganismes($connexion);
$codeSection = (int)getCodeSection($codeClasse, $connexion)->codeSection;
$lesEnseignantsReferents = getInfosEnseignantReferentCodeSection($codeSection, $connexion);
$lesSignataires = getLesSignataires($connexion);
$lesTuteurs = getLesTuteurs($connexion);
$codeOrganisme;

if(isset($_POST['fonctionTuteur']))
{
    //Etape 1
    $libelleStage = $_POST['libelleStage'];
    $descriptifStage = $_POST['descriptifStage'];
    $codePeriode = (int)$_POST['periodeStage'];
    
    //Etape 2
    if(isset($_POST['organismeExistant']))
    {
        $codeOrganisme = (int)$_POST['choixOrganismeExistant'];    
    }
    else
    {
        $nomOrganisme = $_POST['nomOrganisme'];
        $metierPrincipal = $_POST['metierPrincipal'];
        $adresseOrganisme = $_POST['adresseOrganisme'];
        $villeOrganisme = $_POST['villeOrganisme'];
        $codePostalOrganisme = (int)$_POST['codePostalOrganisme'];
        $telephoneOrganisme = $_POST['telephoneOrganisme'];
        $codeOrganisme = (int)createOrganisme($nomOrganisme, $adresseOrganisme, 
                                              $villeOrganisme, $codePostalOrganisme, 
                                              $metierPrincipal, $telephoneOrganisme, $connexion);
    }
    
    //Etape 3
    if(isset($_POST['signataireExistant']))
    {
        $codeSignataire = (int)$_POST['choixSignataireExistant'];
    }
    else
    {
        $nomSignataire = $_POST['nomSignataire'];
        $prenomSignataire = $_POST['prenomSignataire'];
        $telephoneSignataire = $_POST['telephoneSignataire'];
        $emailSignataire = $_POST['emailSignataire'];
        $fonctionSignataire = $_POST['fonctionSignataire'];
        $codeSignataire = (int)createEmploye($nomSignataire, $prenomSignataire, $telephoneSignataire, 
                                        $emailSignataire, $fonctionSignataire, $codeOrganisme, 1, $connexion);
        createSignataire($codeSignataire, $connexion);
    }
    
    //Etape 4
    if(isset($_POST['tuteurIdentique']))
    {
        if(isset($_POST['signataireExistant']))
        {
            $codeTuteur = (int)$_POST['choixSignataireExistant'];
        }
        else
        {
            $nomTuteur = $_POST['nomSignataire'];
            $prenomTuteur = $_POST['prenomSignataire'];
            $telephoneTuteur = $_POST['telephoneSignataire'];
            $emailTuteur = $_POST['emailSignataire'];
            $fonctionTuteur = $_POST['fonctionSignataire'];
            $codeTuteur = (int)createEmploye($nomTuteur, $prenomTuteur, $telephoneTuteur, 
                                        $emailTuteur, $fonctionTuteur, $codeOrganisme, 2, $connexion);
            createTuteur($codeTuteur, $connexion);
        }
    }
    else
    {
        if(isset($_POST['tuteurExistant']))
        {
            $codeTuteur = (int)$_POST['choixTuteurExistant'];
            createTuteur($codeTuteur, $connexion);
        }
        else
        {
            $nomTuteur = $_POST['nomTuteur'];
            $prenomTuteur = $_POST['prenomTuteur'];
            $telephoneTuteur = $_POST['telephoneTuteur'];
            $emailTuteur = $_POST['emailTuteur'];
            $fonctionTuteur = $_POST['fonctionTuteur'];
            $codeTuteur = (int)createEmploye($nomTuteur, $prenomTuteur, $telephoneTuteur,
                                        $emailTuteur, $fonctionTuteur, $codeOrganisme, 2, $connexion);
            createTuteur($codeTuteur, $connexion);
        }
    }
    
    $emailProfesseurReferent = $_POST['selectionEnseignant'];
    $codeInscription = (int)getCodeInscrit($_SESSION['email'], $codeClasse, $anneeScolaire, $connexion)->codeInscription;
    $succes = createStage($codeTuteur, $codeSignataire, $codeInscription, $codeOrganisme, 
                          $codePeriode, $libelleStage, $descriptifStage, $emailProfesseurReferent, $connexion); 

    //ENVOI DU MAIL

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
                        <p>L\'étudiant '.$_SESSION['prenom'].' '.$_SESSION['nom'].' vous a choisie comme référent pour son stage.</p>
                        <p>Afin d\'administrer sa demande, veuillez vous rendre sur le site en cliquant sur le lien ci-dessous et identifiez-vous puis, rendez-vous dans la section stage de votre compte.</p>
                        <p>Pour tout problème relatif à l\'administration des stages, veuillez contacter un administrateur</p>
                        </div>
                        <a href="http://easystage.malrauxbethune.fr" style="text-decoration: none; cursor: pointer; background-color: #466FC1; color: #FFF; display: inline-block; padding: 6px 12px; margin-bottom: 0px; font-size: 14px; font-weight: 400; line-height: 1.42857; text-align: center; white-space: nowrap; vertical-align: middle; -moz-user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px;">
                            Se rendre sur EasyStage
                        </a>
                    </div>
                </div>
            </div>
        </body>
    </html>';

    $mail = mail($emailProfesseurReferent, '[NE PAS REPONDRE] Nouvelle validation en attente', $message, $headers);
}

include_once 'Application/Views/creerStageView.php';

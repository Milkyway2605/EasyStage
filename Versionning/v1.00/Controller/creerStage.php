<?php
session_start();

//Fonction utilitaires
include_once '../Application/Features/backConnexion.php';
include_once '../Application/Features/getAnneeScolaire.php';
include_once '../Application/Features/date.php';

//Fonction d'accès aux données
include_once '../Modeles/accesBDD.php';
include_once '../Modeles/accesPeriodeStage.php';
include_once '../Modeles/accesOrganisme.php';
include_once '../Modeles/accesClasse.php';
include_once '../Modeles/accesEnseigne.php';
include_once '../Modeles/accesEmployes.php';
include_once '../Modeles/accesOrganisme.php';
include_once '../Modeles/accesSignataire.php';
include_once '../Modeles/accesTuteur.php';
include_once '../Modeles/accesInscrit.php';
include_once '../Modeles/accesStage.php';

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
}

include_once '../Application/Views/creerStageView.php';

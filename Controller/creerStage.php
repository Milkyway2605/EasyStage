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

backConnexion();
$connexion = getConnexion();
$anneeScolaire = getAnneeScolaire();
$codeClasse = (int)$_SESSION['codeClasse'];
$lesOrganismes = getLesOrganismes($connexion);
$codeSection = (int)getCodeSection($codeClasse, $connexion)->codeSection;
$lesEnseignantsReferents = getInfoEnseignantReferent($codeSection, $connexion);
$lesSignataires = getLesSignataires($connexion);
$lesTuteurs = getLesTuteurs($connexion);

if(isset($_POST['fonctionTuteur']))
{
    $libelleStage = $_POST['libelleStage'];
    $descriptifStage = $_POST['descriptifStage'];
    $periodeStage = $_POST['periodeStage'];
    
    if(isset($_POST['organismeExistant']))
    {
        $codeOrganisme = (int)$_POST['choixOrganismeExistant'];    
    }
    else
    {
        $codeOrganisme = $_POST['codeOrganisme'];
        $metierPrincipal = $_POST['metierPrincipal'];
        $adresseOrganisme = $_POST['adresseOrganisme'];
        $villeOrganisme = $_POST['villeOrganisme'];
        $codePostalOrganisme = $_POST['codePostalOrganisme'];
        $telephoneOrganisme = $_POST['telephoneOrganisme'];
    }
    
    $nomSignataire = $_POST['nomSignataire'];
    $prenomSignataire = $_POST['prenomSignataire'];
    $telephoneSignataire = $_POST['telephoneSignataire'];
    $emailSignataire = $_POST['emailSignataire'];
    $fonctionSignataire = $_POST['fonctionSignataire'];
    
    if(isset($_POST['tuteurIdentique']))
    {
        $nomTuteur = $nomSignataire;
        $prenomTuteur = $prenomSignataire;
        $telephoneTuteur = $telephoneSignataire;
        $emailTuteur = $emailSignataire;
        $fonctionTuteur = $fonctionSignataire;
    }
    else
    {
        $nomTuteur = $_POST['nomTuteur'];
        $prenomTuteur = $_POST['prenomTuteur'];
        $telephoneTuteur = $_POST['telephoneTuteur'];
        $emailTuteur = $_POST['emailTuteur'];
        $fonctionTuteur = $_POST['fonctionTuteur'];
    }
    
    $emailProfesseurReferent = $_POST['selectionEnseignant'];
}

include_once '../Application/Views/creerStageView.php';

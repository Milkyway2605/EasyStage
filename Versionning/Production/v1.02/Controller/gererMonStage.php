<?php
session_start();

//Fonction utilitaires
include_once 'Application/Features/backConnexion.php';
include_once 'Application/Features/date.php';
include_once 'Application/Features/getAnneeScolaire.php';
include_once 'Application/Features/cryptage.php';
include_once 'Application/Features/autorisationAcces.php';

//Fonction d'accès aux données
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesStage.php';
include_once 'Modeles/accesInscrit.php';
include_once 'Modeles/accesPeriodeStage.php';
include_once 'Modeles/accesOrganisme.php';
include_once 'Modeles/accesEnseigne.php';
include_once 'Modeles/accesEmployes.php';

backConnexion();
$connexion = getConnexion();
$email = $_SESSION['email'];
$codeClasse = $_SESSION['codeClasse'];
$anneeScolaire = $_SESSION['anneeScolaire'];
$codeInscription = (int)getCodeInscrit($email, $codeClasse, $anneeScolaire, $connexion)->codeInscription;
$lesStages = getLesStages($codeInscription, $connexion);

if(autorisationAcces($_SESSION['codeUtilisateur'], '!=', 3) == false)
{
    header('Location: accueil.php');
    exit;
}
else
{
    include_once 'Application/Views/gererMonStageView.php';
}

?>
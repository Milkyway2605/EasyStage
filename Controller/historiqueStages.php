<?php
session_start();

//Fonction utilitaires
include_once 'Application/Features/backConnexion.php';
include_once 'Application/Features/autorisationAcces.php';
include_once 'Application/Features/date.php';

//Fonction d'accès aux données
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesSection.php';
include_once 'Modeles/accesAnneeScolaire.php';
include_once 'Modeles/accesEnseigne.php';

backConnexion();
$connexion = getConnexion();
$emailEnseignant = $_SESSION['email'];
$lesSections = getLesSections($emailEnseignant, $connexion);
$lesAnnees = getLesAnnees($connexion);
$lesEtudiants = getLesEtudiants($emailEnseignant, $connexion);

include_once 'Application/Views/historiqueStagesView.php';
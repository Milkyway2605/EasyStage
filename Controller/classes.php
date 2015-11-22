<?php
session_start();

//Fonction utilitaires
include_once 'Application/Features/backConnexion.php';
include_once 'Application/Features/date.php';
include_once 'Application/Features/getAnneeScolaire.php';
include_once 'Application/Features/autorisationAcces.php';

//Fonction d'accès aux données
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesHistorique.php';

backConnexion();
$connexion = getConnexion();
$emailEnseignant = $_SESSION['email'];
$lesAnnees = getLesAnnees($emailEnseignant, $connexion);

include_once 'Application/Views/classesView.php';
    

<?php
session_start();

//Fonction utilitaires
include_once 'Application/Features/backConnexion.php';
include_once 'Application/Features/autorisationAcces.php';

//Fonction d'accès aux données
include_once 'Modeles/accesBDD.php';

backConnexion();
$connexion = getConnexion();

include_once 'Application/Views/gestionPeriodeView.php';

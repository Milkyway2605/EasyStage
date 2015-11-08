<?php
session_start();

//Fonction utilitaires
include_once 'Application/Features/backConnexion.php';
include_once 'Application/Features/date.php';
include_once 'Application/Features/cryptage.php';

//Fonction d'accès aux données
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesStage.php';
include_once 'Modeles/accesInscrit.php';
include_once 'Modeles/accesEnseigne.php';

backConnexion();
$connexion = getConnexion();
$email = $_SESSION['email'];
$mesStages = getLesStagesProfesseurReferent($email, $connexion);
$autreStages = getLesStagesAutreProfesseurReferent($email, $connexion);

include_once 'Application/Views/gererStageView.php';
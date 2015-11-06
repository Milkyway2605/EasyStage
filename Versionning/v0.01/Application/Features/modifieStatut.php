<?php
session_start();

include_once 'cryptage.php';
include_once '../../Modeles/accesBDD.php';
include_once '../../Modeles/accesStage.php';
if(isset($_GET['id']))
{
    $connexion = getConnexion();
    $codeStage = decrypt($_GET['id']);
    $emailEtudiant = decrypt($_GET['email']);
    $emailEnseignant = $_SESSION['email'];
    $statut = (int)$_GET['statut'];
    $anneeUniversitaire = $_SESSION['anneeScolaire'];
    
    $reussite = setStatut($codeStage, $emailEtudiant, $emailEnseignant, $statut, $anneeUniversitaire, $connexion);
    
}


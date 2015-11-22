<?php
session_start();

include_once '../../Modeles/accesBDD';
include_once '../../Modeles/accesHistorique.php';
include_once '../../Modeles/acceesClasse.php';

$connexion = getConnexion();
$emailEnseignant = $_SESSION['email'];

if(isset($_GET['anneeScolaire']))
{
    $annee = $_GET['anneeScolaire'];
    $lesSections = getLesSection($emailEnseignant, $annee, $connexion);
    foreach ($lesSections as $uneSection) 
    {
        echo('<option value="'.$uneSection['codeSection'].'">'.$uneSection['libelleSection'].'</option>');
    }
}



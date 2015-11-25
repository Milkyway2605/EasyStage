<?php
session_start();

include_once '../../Modeles/accesBDD.php';
include_once '../../Modeles/accesHistorique.php';

$connexion = getConnexion();
$emailEnseignant = $_SESSION['email'];

if(isset($_POST['anneeScolaire']))
{
    $annee = (int)$_POST['anneeScolaire'];
    $lesSections = getLesSection($emailEnseignant, $annee, $connexion);
    foreach ($lesSections as $uneSection) 
    {
        echo('<option value="'.$uneSection['codeSection'].'">'.$uneSection['libelleSection'].'</option>');
    }
}



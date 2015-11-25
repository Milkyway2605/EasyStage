<?php
session_start();

include_once '../../Modeles/accesBDD.php';
include_once '../../Modeles/accesHistorique.php';

$connexion = getConnexion();
$emailEnseignant = $_SESSION['email'];

if(isset($_POST['anneeScolaire']) && isset($_POST['codeSection']))
{
    $annee = (int)$_POST['anneeScolaire'];
    $codeSection = (int)$_POST['codeSection'];
    $suffixe = " ère";
    $lesClasses = getLesClasses($emailEnseignant, $annee, $codeSection, $connexion);
    foreach ($lesClasses as $uneClasse)
    {
        if($uneClasse['niveau'] > 1)
        {
            $suffixe = " ème";
        }
        echo('<option value="'.$uneClasse['codeClasse'].'">'.$uneClasse['niveau'].$suffixe.'</option>');
    }
}
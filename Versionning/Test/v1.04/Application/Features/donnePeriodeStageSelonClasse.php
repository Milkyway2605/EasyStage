<?php

include_once 'date.php';
include_once '../../Modeles/accesBDD.php';
include_once '../../Modeles/accesPeriodeStage.php';
if(isset($_POST['libelleSection']))
{
    $connexion = getConnexion();
    $libelleSection = $_POST['libelleSection'];
    $niveau = $_POST['niveau'];
    $lesPeriodes = getLesPeriodesParClasse($libelleSection, $niveau, $connexion);
    
    if(count($lesPeriodes) == 0)
    {
        echo('<option>Aucune période disponible</option>');
    }
    else
    {
        echo('<option value="">Toutes</option>');
        foreach ($lesPeriodes as $unePeriode) 
        {
            $dateDebut = dateAnglaisVersFrancais($unePeriode['dateDebut']);
            $dateFin = dateAnglaisVersFrancais($unePeriode['dateFin']);
            echo('<option value="'.$dateDebut.'-'.$dateFin.'">'
                    .$dateDebut.' au '.$dateFin.'</option>');
        }
    }
}

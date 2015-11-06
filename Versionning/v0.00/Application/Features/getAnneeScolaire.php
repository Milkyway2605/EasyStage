<?php

function getAnneeScolaire()
{
    $dateActuelle = new DateTime();
    $dateNouvelleAnnee = new DateTime($dateActuelle->format('Y').'-09-01');
    $unAn = DateInterval::createFromDateString('1 year');
    if($dateActuelle < $dateNouvelleAnnee)
    {
        $dateUniversitaire = $dateActuelle->sub($unAn)->format('Y');
    }
    else
    {
        $dateUniversitaire = $dateActuelle->format('Y');
    }
    
    return $dateUniversitaire;
}



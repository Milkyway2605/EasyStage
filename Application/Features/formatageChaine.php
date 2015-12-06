<?php

function premiereLettreMajuscule($chaine)
{
    $premiereLettreMajuscule = strtoupper(substr($chaine, 0, 1));
    
    $resteChaineMinuscule = strtolower(substr($chaine, 1, strlen($chaine) - 1));
    $chaineFormatee = $premiereLettreMajuscule.$resteChaineMinuscule;
    return $chaineFormatee;
}


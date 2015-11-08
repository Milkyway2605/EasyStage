<?php

function calculPeriode($dateDebut,$dateFin)
{
    $dateDebutObj = new DateTime($dateDebut);
    $dateFinObj = new DateTime($dateFin);
    $intervalle = (int)$dateDebutObj->diff($dateFinObj)->format('%a');
    if($intervalle < 7)
    {
        $intervalle = $intervalle.' jours';
    }
    else
    {
        $intervalle = ceil($intervalle/7).' semaines';
    }
    
    return $intervalle;
}


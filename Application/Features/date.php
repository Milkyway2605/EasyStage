<?php

/**
 * Fonction qui transforme une date au format jj/mm/aaaa au format aaaa-mm-jj
 * @param string $maDate Date au format jj/mm/aaaa
 * @return string $date Date au format aaaa-mm-jj
 */
function dateFrancaisVersAnglais($maDate){
    @list($jour,$mois,$annee) = explode('/',$maDate);
    $date = date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
    return $date;
}

/**
 * Fonction qui transforme une date au format aaaa-mm-jj au format jj/mm/aaaa
 * @param string $maDate Date au format aaaa-mm-jj
 * @return string $date Date au format jj/mm/aaaa
 */
function dateAnglaisVersFrancais($maDate){
   @list($annee,$mois,$jour)=explode('-',$maDate);
   $date="$jour"."/".$mois."/".$annee;
   return $date;
}


<?php

function dateFrancaisVersAnglais($maDate){
    @list($jour,$mois,$annee) = explode('/',$maDate);
    return date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
}

function dateAnglaisVersFrancais($maDate){
   @list($annee,$mois,$jour)=explode('-',$maDate);
   $date="$jour"."/".$mois."/".$annee;
   return $date;
}


<?php

function createStage($codeTuteur,$codeSignataire,$codeInscription,$codeOrganisme,
                     $codePeriode,$libelle,$descriptif,$enseignantReferent,$connexion)
{
    $req = $connexion->prepare('INSERT INTO stage (codeTuteur,codeSignataire,codeInscription,'
            . 'codeOrganisme,codePeriode,libelle,descriptif,enseignantReferent) '
            . 'VALUES(:codeTuteur,:codeSignataire,:codeInscription,'
            . ':codeEntreprise,:codePeriode,:libelle,:descriptif,:enseignantReferent)');
    
    $req->bindValue(':codeTuteur',$codeTuteur);
    $req->bindValue(':codeSignataire',$codeSignataire);
    $req->bindValue(':codeInscription',$codeInscription);
    $req->bindValue(':codeEntreprise',$codeOrganisme);
    $req->bindValue(':codePeriode',$codePeriode);
    $req->bindValue(':libelle',$libelle);
    $req->bindValue(':descriptif',$descriptif);
    $req->bindValue(':enseignantReferent',$enseignantReferent);
    
    $reussite = $req->execute();
    
    return $reussite;
}


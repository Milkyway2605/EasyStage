<?php

function createStage($codeTuteur,$codeSignataire,$codeInscription,$codeOrganisme,
                     $codePeriode,$libelle,$descriptif,$enseignantReferent,$connexion)
{
    $req = $connexion->prepare('INSERT INTO stage (codeTuteur,codeSignataire,codeInscription,'
            . 'codeOrganisme,codePeriode,libelle,descriptif,enseignantReferent) '
            . 'VALUES(:codeTuteur,:codeSignataire,:codeInscription,'
            . ':codeOrganisme,:codePeriode,:libelle,:descriptif,:enseignantReferent)');
    
    $req->bindValue(':codeTuteur',$codeTuteur);
    $req->bindValue(':codeSignataire',$codeSignataire);
    $req->bindValue(':codeInscription',$codeInscription);
    $req->bindValue(':codeOrganisme',$codeOrganisme);
    $req->bindValue(':codePeriode',$codePeriode);
    $req->bindValue(':libelle',$libelle);
    $req->bindValue(':descriptif',$descriptif);
    $req->bindValue(':enseignantReferent',$enseignantReferent);
    
    $reussite = $req->execute();
    
    return $reussite;
}

function getLesStages($codeInscription,$connexion)
{
    $req = $connexion->prepare('SELECT codeStage, codeTuteur, codeSignataire, '
            . 'codeOrganisme, codePeriode, libelle, descriptif, statut, enseignantReferent '
            . 'FROM stage '
            . 'WHERE codeInscription = :codeInscription');
    
    $req->bindValue(':codeInscription',$codeInscription);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}


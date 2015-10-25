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

function getLesStagesProfesseurReferent($email,$connexion)
{
    $req = $connexion->prepare('SELECT codeStage, codeTuteur, codeSignataire, statut, '
            . 'codeOrganisme, codeInscription, codePeriode, libelle, descriptif '
            . 'FROM stage '
            . 'WHERE enseignantReferent = :email '
            . 'AND statut = 0');
    
    $req->bindValue(':email',$email);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getLesStagesAutreProfesseurReferent($email,$connexion)
{
    $req = $connexion->prepare('SELECT codeStage, codeTuteur, codeSignataire, statut, '
            . 'codeOrganisme, codePeriode, codeInscription, libelle, descriptif, enseignantReferent '
            . 'FROM stage '
            . 'WHERE enseignantReferent != :email '
            . 'AND statut = 0');
    
    $req->bindValue(':email',$email);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function setStatut($codeStage,$emailEtudiant,$emailEnseignant,$statut,$anneeUniversitaire,$connexion)
{
    $req = $connexion->prepare('UPDATE stage '
            . 'SET statut = :statut '
            . 'WHERE codeInscription IN '
            . '(SELECT codeInscription '
            . 'FROM inscrit '
            . 'WHERE email = :emailEtudiant '
            . 'AND dateDebut = :anneeUniversitaire) '
            . 'AND enseignantReferent = :emailEnseignant '
            . 'AND codeStage = :codeStage ');
    
    $req->bindValue(':codeStage',$codeStage);
    $req->bindValue(':emailEtudiant',$emailEtudiant);
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    $req->bindValue(':statut',$statut);
    $req->bindValue(':anneeUniversitaire',$anneeUniversitaire);
    
    $reussite = $req->execute();
    
    return $reussite;
}

function getUnStage($codeStage,$connexion)
{
    $req = $connexion->prepare('SELECT codeTuteur, codeSignataire, codeOrganisme, '
            . 'codePeriode, libelle, descriptif, statut, enseignantReferent, codeInscription '
            . 'FROM stage '
            . 'WHERE codeStage = :codeStage');
    
    $req->bindValue(':codeStage',$codeStage);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}
<?php

function getLesOrganismes($connexion)
{
    $req = $connexion->prepare('SELECT codeOrganisme, nom, adresse, ville, codePostal, metierPrincipal, telephone '
            . 'FROM organisme');    
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getInfoOrganisme($codeOrganisme, $connexion)
{
    $req = $connexion->prepare('SELECT nom, adresse, ville, codePostal, '
            . 'metierPrincipal, telephone '
            . 'FROM organisme '
            . 'WHERE codeOrganisme = :codeOrganisme');  
    
    $req->bindValue(':codeOrganisme',$codeOrganisme);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function createOrganisme($nom, $adresse, $ville, $codePostal, $metierPrincipal,
                         $telephone, $connexion)
{
    $req = $connexion->prepare('INSERT INTO organisme '
            . '(nom,adresse,ville,codePostal,metierPrincipal,telephone) '
            . 'VALUES (:nom,:adresse,:ville,:codePostal,:metierPrincipal,:telephone)');
    
    $req->bindValue(':nom',$nom);
    $req->bindValue(':adresse',$adresse);
    $req->bindValue(':ville',$ville);
    $req->bindValue(':codePostal',$codePostal);
    $req->bindValue(':metierPrincipal',$metierPrincipal);
    $req->bindValue(':telephone',$telephone);
    
    $reussite = $req->execute();
    $resultat = $connexion->lastInsertId();
    
    return $resultat;
}

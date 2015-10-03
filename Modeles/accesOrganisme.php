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

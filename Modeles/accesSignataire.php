<?php

function createSignataire($codeSignataire,$connexion)
{
    $req = $connexion->prepare('INSERT INTO signataire '
            . '(codeSignataire) '
            . 'VALUES(:codeSignataire)');
    
    $req->bindValue(':codeSignataire',$codeSignataire);
    
    $reussite = $req->execute();
    
    return $reussite;
}

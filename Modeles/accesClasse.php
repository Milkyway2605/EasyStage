<?php

function getCodeClasse($codeSection, $niveau, $connexion)
{
    $req = $connexion->prepare('SELECT codeClasse '
            . 'FROM classe '
            . 'WHERE codeSection = :codeSection '
            . 'AND niveau = :niveau');
    
    $req->bindValue(':codeSection',$codeSection);
    $req->bindValue(':niveau',$niveau);
    
    $req->execute();
    $ligne = $req->fetch(PDO::FETCH_OBJ);
    
    if($ligne == false)
    {
        $resultat = null;
    }
    else
    {
        $resultat = $ligne;                
    }
    
    return $resultat;
}

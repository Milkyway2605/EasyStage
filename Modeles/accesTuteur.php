<?php

function createTuteur($codeTuteur,$connexion)
{
    $req = $connexion->prepare('INSERT INTO tuteur '
            . '(codeTuteur) '
            . 'VALUES(:codeTuteur)');
    
    $req->bindValue(':codeTuteur',$codeTuteur);
    
    $reussite = $req->execute();
    
    return $reussite;
}


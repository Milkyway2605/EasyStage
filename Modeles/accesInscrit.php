<?php

function createInscrit($codeClasse,$email,$anneeScolaire, $connexion)
{
    $req = $connexion->prepare('INSERT INTO inscrit '
            . '(codeClasse,email,dateDebut) '
            . 'VALUES (:codeClasse,:email,:anneeScolaire)');
    
    $req->bindValue(':codeClasse',$codeClasse);
    $req->bindValue(':email',$email);
    $req->bindValue(':anneeScolaire',$anneeScolaire);
    
    $reussite = $req->execute();
    
    return $reussite;
}

function getCodeClasseInscrit($email, $connexion)
{
    $req = $connexion->prepare('SELECT codeClasse '
            . 'FROM inscrit '
            . 'WHERE email = :email ');
    
    $req->bindValue(':email',$email);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function getCodeInscrit($email,$codeClasse,$anneeScolaire,$connexion)
{
    $req = $connexion->prepare('SELECT codeInscription '
            . 'FROM inscrit '
            . 'WHERE email = :email AND codeClasse = :codeClasse AND dateDebut = :anneeScolaire ');
    
    $req->bindValue(':email',$email);
    $req->bindValue(':codeClasse',$codeClasse);
    $req->bindValue(':anneeScolaire',$anneeScolaire);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function getInfosEtudiantCodeInscription($codeInscription,$connexion)
{
    $req = $connexion->prepare('SELECT nom, prenom, e.email '
            . 'FROM utilisateurs u '
            . 'INNER JOIN etudiant e '
            . 'ON u.email = e.email '
            . 'INNER JOIN inscrit i '
            . 'ON e.email = i.email '
            . 'WHERE codeInscription = :codeInscription ');
    
    $req->bindValue(':codeInscription',$codeInscription);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function getInfosClasse($codeInscription,$connexion)
{
   $req = $connexion->prepare('SELECT libelleSection, niveau '
           . 'FROM section s '
           . 'INNER JOIN classe c '
           . 'ON s.codeSection = c.codeSection '
           . 'INNER JOIN inscrit i '
           . 'ON c.codeClasse = i.codeClasse '
           . 'WHERE codeInscription = :codeInscription');
    
    $req->bindValue(':codeInscription',$codeInscription);
    
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
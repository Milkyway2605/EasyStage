<?php

/**
 * Fonction qui permet d'accéder au information d'un étudiant dont l'email est spécifié en paramètre
 * si il existe sinon, la fonction retourne null.
 * @param string $email Email de l'étudiant.
 * @param pdo $connexion Objet PDO où sont définies les paramètres de connexion à la base de données.
 * @return pdo $resultat Objet PDO qui contient les informations de l'étudiant si il est définie et  
 * qui contient null si ce n'est pas le cas.
 */

function getInfosEtudiant($email, $connexion)
{
    $req = $connexion->prepare('SELECT telephone, adresse, codePostal, ville, dateNaissance, sexe '
        . 'FROM etudiant '
        . 'WHERE email = :email');
    
    $req->bindValue(':email',$email);
    
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

/**
 * 
 * @param type $email
 * @param type $telephone
 * @param type $adresse
 * @param type $ville
 * @param type $codePostal
 * @param type $dateNaissance
 * @param type $sexe
 * @param type $connexion
 * @return type
 */
function createEtudiant($email, $telephone, $adresse, $ville, $codePostal, 
                        $dateNaissance, $sexe, $connexion)
{
    $dateNaissance = dateFrancaisVersAnglais($dateNaissance);
    $req = $connexion->prepare();
    
    $req->bindValue(':email',$email);
    $req->bindValue(':telephone',$telephone);
    $req->bindValue(':adresse',$adresse);
    $req->bindValue(':ville',$ville);
    $req->bindValue(':codePostal',$codePostal);
    $req->bindValue(':dateNaissance',$dateNaissance);
    $req->bindValue(':sexe',$sexe);
    
    $reussite = $req->execute();
    
    return $reussite;
}
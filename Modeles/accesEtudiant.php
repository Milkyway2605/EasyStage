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
 * Fonction qui permet la création d'un étudiant a partir des informations saisies en paramètres.
 * @param string $email Email de l'etudiant
 * @param string $telephone Numero de telephone portable de l'etudiant
 * @param string $adresse Adresse de l'etudiant (Uniquement n° et rue)
 * @param string $ville Nom de la ville de l'etudiant
 * @param int $codePostal Code postal de l'etudiant
 * @param string $dateNaissance Date de naissance de l'etudiant
 * @param int $sexe Sexe de l'etudiant (0 : masculin, 1 : féminin)
 * @param pdo $connexion Objet PDO où sont définies les paramètres de connexion à la base de données.
 * @return boolean $reussite Retourne un booléen true si la requête a correctement été exécuté, si retourne false.
 */
function createEtudiant($email, $telephone, $adresse, $ville, $codePostal, 
                        $dateNaissance, $sexe, $connexion)
{
    $dateNaissance = dateFrancaisVersAnglais($dateNaissance);
    $req = $connexion->prepare('INSERT INTO etudiant'
            . '(email, telephone, adresse, ville, codePostal, dateNaissance, sexe) '
            . 'VALUES (:email,:telephone,:adresse,:ville,:codePostal,:dateNaissance,:sexe)');
    
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
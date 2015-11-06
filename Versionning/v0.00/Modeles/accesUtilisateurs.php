<?php

/**
 * Fonction permettant la création d'un nouvel utilisateur dans la base de données.
 * @param string $email Email de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.
 * @param string $nom Nom de l'utilisateur.
 * @param string $prenom Prénom de l'utilisateur.
 * @param int $codeUtilisateur Code du groupe de l'utilisateur (Administrateur, Etudiant, Professeur).
 * @param pdo $connexion Objet PDO où sont définies les paramètres de connexion à la base de données.
 * @return boolean $reussite Retourne un booléen true si la requête a correctement été exécuté, si retourne false.
 */
function createUtilisateur($email, $password, $nom, $prenom, $codeUtilisateur, $connexion)
{
    $req = $connexion->prepare('INSERT INTO utilisateurs '
            . '(email, password, nom, prenom, typeUtilisateur) '
            . 'VALUES(:email,SHA1(:password), :nom, :prenom, :codeUtilisateur)');
    
    $req->bindValue(':email',$email);
    $req->bindValue(':password',$password);
    $req->bindValue(':nom',$nom);
    $req->bindValue(':prenom',$prenom);
    $req->bindValue(':codeUtilisateur',$codeUtilisateur);
    
    $reussite = $req->execute();
    
    return $reussite;
}

/**
 * Fonction permettant de vérifié l'existance d'un utilisateur dans la base de données
 * à partir des identifiants passés en paramètre. Si l'utilisateur existe dans la base.
 * de données, la fonction retourne les informations le concernant, sinon elle retournera null. 
 * @param string $email Email de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.
 * @param pdo $connexion Objet PDO où sont définies les paramètres de connexion à la base de données.
 * @return pdo $resultat Objet PDO qui contient les informations (nom, prenom, code du type d'utilisateur) 
 * de l'utilisateur si celui-ci existe dans la base de données et qui contient null si ce n'est pas le cas. 
 */
function checkAccount($email, $password, $connexion)
{
    $req = $connexion->prepare('SELECT typeUtilisateur,nom,prenom '
            . 'FROM utilisateurs '
            . 'WHERE email = :email AND password = SHA1(:password)');
    
    $req->bindValue(':email',$email);
    $req->bindValue(':password',$password);
    
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
 * Fonction permettant de modifier le mot de passe d'un utilisateur.
 * @param string $email Email de l'utilisateur.
 * @param string $password Nouveau mot de passe de l'utilisateur.
 * @param pdo $connexion Objet PDO où sont définies les paramètres de connexion à la base de données.
 * @return boolean $reussite Retourne un booléen true si la requête a correctement été exécuté, si retourne false.
 */
function setPassword($email, $password, $connexion)
{
    $req = $connexion->prepare('UPDATE utilisateurs '
            . 'SET password = SHA1(:password) '
            . 'WHERE email = :email');
    
    $req->bindValue(':email',$email);
    $req->bindValue(':password',$password);
    
    $reussite = $req->execute();
    
    return $reussite;
}

/**
 * Fonction qui retourne une clé unique lié à l'utilisateur si elle est définie, sinon retourne null.
 * @param string $email Email de l'utilisateur.
 * @param pdo $connexion Objet PDO où sont définies les paramètres de connexion à la base de données.
 * @return pdo $resultat Objet PDO qui contient la clé de l'utilisateur si elle est définie et  
 * qui contient null si ce n'est pas le cas.
 */
function getCle($email, $connexion)
{
    $req = $connexion->prepare('SELECT cle '
        . 'FROM utilisateurs '
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
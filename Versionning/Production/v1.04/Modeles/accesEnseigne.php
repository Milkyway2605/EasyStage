<?php

function getInfosEnseignantReferentCodeSection($codeSection,$connexion)
{
    $req = $connexion->prepare('SELECT e.email, nom, prenom FROM enseigne e '
            . 'INNER JOIN utilisateurs u '
            . 'ON e.email = u.email '
            . 'WHERE codeSection = :codeSection '
            . 'AND estReferent = 1');
    
    $req->bindValue(':codeSection',$codeSection);
    $req->execute();
    $resultat = $req->fetchAll();    

    return $resultat;
}

function getInfosEnseignantReferentEmail($email, $connexion)
{
    $req = $connexion->prepare('SELECT e.email, nom, prenom FROM enseigne e '
            . 'INNER JOIN utilisateurs u '
            . 'ON e.email = u.email '
            . 'WHERE e.email = :email ');
    
    $req->bindValue(':email',$email);
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);    

    return $resultat;
}

/**
 * Fonction retournant la liste des étudiants ayant fréquentés les sections dans lesquels
 * le professeur à enseigner. Les champs disponibles sont le nom et le prénom de l'étudiant,
 * la classe de l'étudiant, l'année d'étude et le nom de l'organisme(S'il il a trouvé un stage)
 * @param type $emailEnseignant
 * @param type $connexion
 * @return type
 */
function getLesEtudiants($emailEnseignant,$connexion)
{
    $req = $connexion->prepare('SELECT u.nom, u.prenom,'
            . 'CONCAT(libelleSection, niveau)AS classe,'
            . 'p.dateDebut, p.dateFin,o.nom AS nomOrganisme,'
            . 'o.telephone AS telephoneOrganisme,'
            . 'CONCAT(o.adresse,", ",o.codePostal," ",o.ville) AS adresseOrganisme '
            . 'FROM classe c '
            . 'RIGHT JOIN periode_stage p '
            . 'ON p.codeClasse = c.codeClasse '
            . 'LEFT OUTER JOIN inscrit i '
            . 'ON i.codeClasse = c.codeClasse '
            . 'INNER JOIN utilisateurs u '
            . 'ON u.email = i.email '
            . 'LEFT OUTER JOIN stage s '
            . 'ON s.codeperiode = p.codeperiode '
            . 'AND s.codeinscription = i.codeinscription '
            . 'LEFT JOIN organisme o '
            . 'ON o.codeOrganisme = s.codeOrganisme '
            . 'INNER JOIN section se '
            . 'ON se.codeSection = c.codeSection '
            . 'INNER JOIN enseigne e '
            . 'ON e.codeSection = se.codeSection '
            . 'WHERE e.email = :emailEnseignant '
            . 'UNION SELECT u.nom, u.prenom,'
            . 'CONCAT(libelleSection, niveau)AS classe,'
            . 'p.dateDebut, p.dateFin,o.nom AS nomOrganisme,'
            . 'o.telephone AS telephoneOrganisme,'
            . 'CONCAT(o.adresse,", ",o.codePostal," ",o.ville) AS adresseOrganisme '
            . 'FROM classe c '
            . 'LEFT JOIN periode_stage p '
            . 'ON p.codeClasse = c.codeClasse '
            . 'LEFT OUTER JOIN inscrit i '
            . 'ON i.codeclasse = c.codeclasse '
            . 'INNER JOIN utilisateurs u '
            . 'ON u.email = i.email '
            . 'LEFT OUTER JOIN stage s '
            . 'ON s.codeperiode = p.codeperiode '
            . 'AND s.codeinscription = i.codeinscription '
            . 'LEFT JOIN organisme o '
            . 'ON o.codeOrganisme = s.codeOrganisme '
            . 'INNER JOIN section se '
            . 'ON se.codeSection = c.codeSection '
            . 'INNER JOIN enseigne e '
            . 'ON e.codeSection = se.codeSection '
            . 'WHERE e.email = :emailEnseignant');
    
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    $req->execute();
    $resultat = $req->fetchAll();    

    return $resultat;
}


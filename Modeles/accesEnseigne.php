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
    $req = $connexion->prepare('SELECT DISTINCT u.nom, prenom, '
            . 'CONCAT( libelleSection, niveau ) AS classe, '
            . 'i.dateDebut AS annee, o.nom AS nomOrganisme, '
            . 'o.adresse as adresseOrganisme, o.telephone as telephoneOrganisme '
            . 'FROM utilisateurs u '
            . 'INNER JOIN etudiant e '
            . 'ON u.email = e.email '
            . 'INNER JOIN inscrit i '
            . 'ON e.email = i.email '
            . 'INNER JOIN classe c '
            . 'ON i.codeClasse = c.codeClasse '
            . 'INNER JOIN section s '
            . 'ON c.codeSection = s.codeSection '
            . 'INNER JOIN enseigne en '
            . 'ON s.codeSection = en.codeSection '
            . 'LEFT JOIN stage st '
            . 'ON i.codeInscription = st.codeInscription '
            . 'LEFT JOIN organisme o '
            . 'ON st.codeOrganisme = o.codeOrganisme '
            . 'WHERE en.email = :emailEnseignant ');
    
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    $req->execute();
    $resultat = $req->fetchAll();    

    return $resultat;
}


<?php
session_start();

//Fonction utilitaires
include_once '../Application/Features/backConnexion.php';
include_once '../Application/Features/date.php';
include_once '../Application/Features/getAnneeScolaire.php';

//Fonction d'accès aux données
include_once '../Modeles/accesBDD.php';
include_once '../Modeles/accesUtilisateurs.php';
include_once '../Modeles/accesEtudiant.php';
include_once '../Modeles/accesSection.php';
include_once '../Modeles/accesClasse.php';
include_once '../Modeles/accesInscrit.php';

backConnexion();
$connexion = getConnexion();

if(isset($_POST['telephone']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $codeUtilisateur = 3;
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = (int)$_POST['codePostal'];
    $dateNaissance = $_POST['dateNaissance'];
    $sexe = (int)$_POST['sexe'];
    $codeSection = (int)$_POST['section'];
    $niveau = (int)$_POST['niveau'];
    $codeClasse = (int)getCodeClasse($codeSection, $niveau, $connexion)->codeClasse;
    $anneeScolaire = getAnneeScolaire();

    $succes = createUtilisateur($email, $password, $nom, $prenom, $codeUtilisateur, $connexion);
    
    if($succes == TRUE)
    {
        $succes = createEtudiant($email, $telephone, $adresse, $ville, $codePostal, $dateNaissance, $sexe, $connexion);
        
        if($succes == TRUE)
        {
            $succes = createInscrit($codeClasse, $email, $anneeScolaire, $connexion);
        }
    }
}

include_once '../Application/Views/creerEtudiantView.php';

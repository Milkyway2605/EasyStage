<?php
include_once '../Modeles/accesBDD.php';
include_once '../Modeles/accesUtilisateurs.php';
include_once '../Modeles/accesEtudiant.php';
include_once '../Modeles/accesInscrit.php';

if(isset($_POST['email']) == true)
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connexion = getConnexion();
    $authentification = checkAccount($email, $password, $connexion);
    
    if( $authentification != null)
    {
        session_start();
        $_SESSION['email']= $email;
        $_SESSION['password']= $password;
        $_SESSION['nom']= $authentification->nom;
        $_SESSION['prenom']=$authentification->prenom;
        $_SESSION['codeUtilisateur']=(int)$authentification->typeUtilisateur;
        
        switch ($_SESSION['codeUtilisateur'])
        {
            case 1:
                $_SESSION['typeUtilisateur']= "Administrateur";
                break;
                
            case 2:
                
                $_SESSION['typeUtilisateur']= "Enseignant";
                break;
            
            case 3:
                
                $_SESSION['typeUtilisateur']= "Etudiant";
                $etudiant = getInfosEtudiant($email, $connexion);
                $_SESSION['telephone'] = $etudiant->telephone;
                $_SESSION['adresse'] = $etudiant->adresse;
                $_SESSION['codePostal'] = $etudiant->codePostal;
                $_SESSION['ville'] = $etudiant->ville;
                $_SESSION['dateNaissance'] = $etudiant->dateNaissance;
                $_SESSION['sexe'] = $etudiant->sexe;
                $_SESSION['codeClasse'] = (int)getCodeClasseInscrit($email, $connexion)->codeClasse;
                        
                break;
        }
        
        header('Location: accueil.php');
        exit;
    }
    else
    {
        include_once '../Authentification/Views/loginErrorView.php';
    }
}
else
{
    include_once '../Authentification/Views/loginView.php';
}




?>


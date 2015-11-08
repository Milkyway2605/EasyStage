<?php
include_once 'Modeles/accesBDD.php';
include_once 'Modeles/accesUtilisateurs.php';

$connexion = getConnexion();

if(isset($_POST['password']) == true)
{
    session_start();
    $email= $_SESSION['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];

    if($password == $passwordConfirmation)
    {
        setPassword($email, $password, $connexion);
        setCle($email, null, null, $connexion);
        include_once 'Authentification/Views/passwordResetSuccessView.php';
        session_destroy();
        unset($_SESSION);
    }
    else
    {
        include_once 'Authentification/Views/passwordResetErrorView.php';
    }

}

if(isset($_GET['email']))
{
    $email= $_GET['email'];
    $cle = $_GET['cle'];
    $resultat = getCle($email, $connexion);
    $tempsActuel = time();
    $cleBDD = $resultat->cle;
    
    if($cleBDD == $cle)
    {
        if(strtotime($resultat->finValidite) < $tempsActuel)
        {
            session_start();
            $_SESSION['email'] = $email;
            include_once 'Authentification/Views/passwordResetView.php';
        }
        else
        {
            setCle($email, null, null, $connexion);
            include_once 'Authentification/Views/erreurCleExpireView.php';
        }
    }
    
    else
    {
        include_once 'Authentification/Views/erreurCleInvalideView.php';
    }
}
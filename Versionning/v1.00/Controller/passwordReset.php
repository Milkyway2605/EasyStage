<?php
include_once '../Modeles/accesBDD.php';
include_once '../Modeles/accesUtilisateurs.php';

$connexion = getConnexion();

if(isset($_GET['email']))
{
    $email= $_GET['email'];
    $cle = $_GET['cle'];
//    $email= 'guillaume.lespagnol26@gmail.com';
//    $cle = '01';
    $resultat = getCle($email, $connexion);
    
    if($resultat->cle == $cle)
    {
        
        include_once '../Authentification/Views/passwordResetView.php';

    }
    else
    {
        echo('Réussite');
    }
}

if(isset($_POST['password']) == true)
{
    $email= $_GET['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];

    if($password == $passwordConfirmation)
    {
        setPassword($email, $password, $connexion);
    }
    else
    {
        include_once '../Authentification/Views/passwordResetErrorView.php';
    }

}


<?php

if(isset($_POST['email']) == true)
{
    
    echo("Bravo, ça fonctionne !");
    
}
else
{
    include_once '../Authentification/Views/forgetPasswordView.php';
}
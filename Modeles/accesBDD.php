<?php

function getConnexion()
{
    $dsn='mysql:host=localhost;dbname=easystage';
    $utilisateur='root';
    $motdepasse='';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8");
    $connexion= new PDO($dsn,$utilisateur,$motdepasse,$options);

    return $connexion;
}
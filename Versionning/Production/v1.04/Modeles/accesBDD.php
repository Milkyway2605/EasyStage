<?php

function getConnexion()
{
    $dsn='mysql:host=db599571773.db.1and1.com;dbname=db599571773';
    $utilisateur='dbo599571773';
    $motdepasse='EasyStage';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8");
    $connexion= new PDO($dsn,$utilisateur,$motdepasse,$options);

    return $connexion;
}
<?php

function getConnexion()
{
    $dsn='mysql:host=db577617087.db.1and1.com;dbname=db577617087';
    $utilisateur='dbo577617087';
    $motdepasse='EasyStage';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8");
    $connexion= new PDO($dsn,$utilisateur,$motdepasse,$options);

    return $connexion;
}
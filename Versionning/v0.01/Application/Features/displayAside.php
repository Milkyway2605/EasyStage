<?php

/**
 * Procédure qui définie les catégories du menu de navigation disponible selon le type de l'utilisateur.
 * @param int $userType code du type de l'utilisateur
 * @param string $activeCategory nom de la catégorie active
 */
function displayAside($userType, $activeCategory)
{
    include_once '../Application/Base/layout_aside_01.php';
    
    $navigationPrincipale = '../Application/Base/AsideModules/navigationPrincipaleCategory.php';
    $accueil = '../Application/Base/AsideModules/accueil.php';
    $accueilActive = '../Application/Base/AsideModules/accueilActive.php';
    $profil = '../Application/Base/AsideModules/profil.php';
    $profilActive = '../Application/Base/AsideModules/profilActive.php';
    $gestion = '../Application/Base/AsideModules/gestionCategory.php';
    $utilisateurs = '../Application/Base/AsideModules/utilisateurs.php';
    $utilisateursActive = '../Application/Base/AsideModules/utilisateursActive.php';
    $classes = '../Application/Base/AsideModules/classes.php';
    $classesActive = '../Application/Base/AsideModules/classesActive.php';
    $stages = '../Application/Base/AsideModules/stages.php';
    $stagesActive = '../Application/Base/AsideModules/stagesActive.php';
    $autres = '../Application/Base/AsideModules/autresCategory.php';
    $annuaire = '../Application/Base/AsideModules/annuaire.php';
    $annuaireActive = '../Application/Base/AsideModules/annuaireActive.php';
    $etudiants = '../Application/Base/AsideModules/etudiants.php';
    $etudiantsActive = '../Application/Base/AsideModules/etudiantsActive.php';
    
    
    switch($userType)
    {
        case 1:
            
            switch($activeCategory)
            {
                case 'accueil' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueilActive);
                    include_once($profil);
                    include_once($gestion);
                    include_once($utilisateurs);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'profil' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profilActive);
                    include_once($gestion);
                    include_once($utilisateurs);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'utilisateurs' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($utilisateursActive);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'stages' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($utilisateurs);
                    include_once($classes);
                    include_once($stagesActive);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'classes' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($utilisateurs);
                    include_once($classesActive);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'annuaire' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($utilisateurs);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaireActive);
                    
                    break;
            }            
            break;
        
        case 2:
            
            switch($activeCategory)
            {
                case 'accueil' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueilActive);
                    include_once($profil);
                    include_once($gestion);
                    include_once($etudiants);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'profil' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profilActive);
                    include_once($gestion);
                    include_once($etudiants);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'utilisateurs' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($etudiantsActive);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'stages' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($etudiants);
                    include_once($classes);
                    include_once($stagesActive);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'classes' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($etudiants);
                    include_once($classesActive);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'annuaire' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($etudiants);
                    include_once($classes);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaireActive);
                    
                    break;
            }
            break;
        
        case 3 :
            
            switch($activeCategory)
            {
                case 'accueil' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueilActive);
                    include_once($profil);
                    include_once($gestion);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'profil' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profilActive);
                    include_once($gestion);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'utilisateurs' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'stages' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($stagesActive);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'classes' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaire);
                    
                    break;
                
                case 'annuaire' :
                    
                    include_once($navigationPrincipale);
                    include_once($accueil);
                    include_once($profil);
                    include_once($gestion);
                    include_once($stages);
                    include_once($autres);
                    include_once($annuaireActive);
                    
                    break;
            }
            break;
    }
    
        include_once '../Application/Base/layout_aside_02.php';
}

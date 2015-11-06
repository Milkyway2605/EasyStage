<?php
//Organisation d'une page.
// (*)Composants obligatoires

//Balises Head + Fichier CSS obligatoires
include_once '../Base/layout_head_01.php';//(*)
?>

    <!-- Partie modifiable -->
    <!-- Insertion des fichiers CSS spécifiques à la fonctionnalité développée -->
    <link href="Ressources/CSS/style.css" rel="stylesheet" type="text/css"/>
    
<?php
//Fin de la balise head + Ouverture balise Body
include_once '../Base/layout_head_02.php';//(*)

//Barre haute (Header)
include_once '../Base/layout_header.php';//(*)

//Insertion du menu utilisateurs (Menu administrateur, étudiants, ...)
include_once '../Base/layout_aside_admin.php';//(*)

//Ouverture balise contenu + ouverture balise titre de la page
include_once '../Base/layout_content_01.php';//(*)
?>
    
    <!-- Partie modifiable -->
    <!-- Insertion du titre et du descriptif de la fonctionnalité développée -->
    Accueil
    <small>Bienvenu(e) Utilisateur</small>

<?php
//Fermeture balise titre de la page
include_once '../Base/layout_content_02.php';//(*)
?>
    <!-- Partie modifiable -->
    <!-- Insertion du contenu (balises HTML) de la fonctionnalité développée -->
    <h1>Page d'exemple</h1>
    
<?php
//Fermeture balise contenu
include_once '../Base/layout_content_03.php';//(*)

//Footer
include_once '../Base/layout_footer.php';//(*)

//Fichier Javascript obligatoires
include_once '../Base/layout_baseJavascript.php';//(*)
?>

    <!-- Insertion des fichiers Javascript spécifique à la fonctionnalité développée -->
    
<?php
//Fermeture balise body et html
include_once '../Base/layout_endPage.php';//(*)
?>
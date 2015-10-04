<?php
include_once '../Application/Base/layout_head_01.php';
?>

<link href="../Application/Ressources/CSS/profilStyle.css" rel="stylesheet" type="text/css"/>
<link href="../Application/Ressources/CSS/profilResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../Application/Base/layout_head_02.php';
include_once '../Application/Base/layout_header.php';
include_once '../Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'profil'));
include_once '../Application/Base/layout_content_01.php';
?>
    Profil
    <small>Editer vos informations personnelles</small>

<?php
include_once '../Application/Base/layout_content_02.php';

//Modules de la page profil

switch($_SESSION['typeUtilisateur'])
{
    case 'Administrateur':
        include_once '../Application/Modules/profilModules/informationsGeneralesModule.php';
//        include_once '../Application/Modules/profilModules/informationsComplementairesModule.php'; 
        break;
    
    case 'Enseignant':
        include_once '../Application/Modules/profilModules/informationsGeneralesModule.php';
//        include_once '../Application/Modules/profilModules/informationsComplementairesModule.php'; 
        break;
    
    case 'Etudiant':
        include_once '../Application/Modules/profilModules/informationsGeneralesModule.php';
        include_once '../Application/Modules/profilModules/informationsComplementairesModule.php'; 
        break;
}

//Fin des modules

include_once '../Application/Base/layout_content_03.php';
include_once '../Application/Base/layout_footer.php';
include_once '../Application/Base/layout_baseJavascript.php';
?>
    
<script src="../Application/Ressources/Javascript/profilScript.js" type="text/javascript"></script>
    
<?php
include_once '../Application/Base/layout_endPage.php';
?>




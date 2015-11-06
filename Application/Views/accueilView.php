<?php
include_once 'Application/Base/layout_head_01.php';
?>

<?php
include_once 'Application/Base/layout_head_02.php';
include_once 'Application/Base/layout_header.php';
include_once 'Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'accueil'));
include_once 'Application/Base/layout_content_01.php';
?>
    
    Accueil
    <small>Bienvenue <?php echo($_SESSION['prenom']); ?></small>

<?php
include_once 'Application/Base/layout_content_02.php';
?>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>

<?php
include_once 'Application/Base/layout_endPage.php';
?>
<?php
include_once 'Application/Base/layout_head_01.php';
?>

<link href="Application/Ressources/CSS/classesStyle.css" rel="stylesheet" type="text/css"/>
<link href="Application/Ressources/CSS/classesResponsive.css" rel="stylesheet" type="text/css"/>

<?php
include_once 'Application/Base/layout_head_02.php';
include_once 'Application/Base/layout_header.php';
include_once 'Application/Features/displayAside.php';
echo(displayAside($_SESSION['codeUtilisateur'], 'classes'));
include_once 'Application/Base/layout_content_01.php';
?>

    Gestion des périodes de stages
    <small>Ajouter ou modifier les périodes d'une classe</small>

<?php
include_once 'Application/Base/layout_content_02.php';
?>
    
<article class='article col-lg-12 col-md-12'>
    <div class='col-lg-5 col-lg-offset-1'>
        <div class="panel">
            
        </div>
    </div>
    <div class="col-lg-5">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">Informations diverses</div>
            </div>
            <div class="panel-body">
                <p>Section : SIO</p>
                <p>Niveau: 1ère année</p>
                <p>Période: 2014-2015</p>
                <p>Période des stages :</p>
                <form>
                    <fieldset>
                        <a class="addPeriode" data-toggle="modal" 
                           href="#addPeriode">
                            <i class="fa fa-plus-circle"></i> 
                            Ajouter une période
                        </a>
                        <div class="periode">
                            11/01/2016 - 04/03/2016
                            <a class="fa fa-pencil pull-right" 
                            data-toggle="modal" href="#modifyPeriode"></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</article>
    
<?php
include_once 'Application/Base/layout_content_03.php';
include_once 'Application/Base/layout_footer.php';
include_once 'Application/Base/layout_baseJavascript.php';
?>
    
    
<?php
include_once 'Application/Base/layout_endPage.php';
?>

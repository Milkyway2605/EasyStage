<li class="panel active">       
    <a href="#stagesList" data-parent="#asideMenu" data-toggle="collapse">
        <i class="fa fa-building-o fa-lg icon-right"></i>
        Stages
    </a>      
    <ul id="stagesList" class="nav collapse in submenu">
        <li><a href="creerStage.php">Création</a></li>
        <li>
            <a href="<?php if($_SESSION['typeUtilisateur'] != 'Etudiant'){echo('gererStage.php');}else{echo('gererMonStage.php');}?>">
                Gestion
            </a>
        </li>
    </ul>
</li>


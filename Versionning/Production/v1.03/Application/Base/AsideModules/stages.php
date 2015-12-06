<li class="panel">       
    <a href=<?php
       
        if($_SESSION['typeUtilisateur'] == 'Etudiant')
        {
            echo('"#stagesList" data-parent="#asideMenu" data-toggle="collapse">');
        }
        else
        {
            echo('"gererStage.php">');
        }
       ?> 
        <i class="fa fa-building-o fa-lg icon-right"></i>
        Stages
    </a>
    <?php
        if($_SESSION['typeUtilisateur'] == 'Etudiant')
        {
            echo('<ul id="stagesList" class="nav collapse submenu">
                    <li><a href="creerStage.php">Création</a></li>
                    <li>
                        <a href="gererMonStage.php">
                            Gestion
                        </a>
                    </li>
                </ul>');
        }
    ?>
</li>

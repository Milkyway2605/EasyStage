<li class="panel">       
    <a href="#stagesList" data-parent="#asideMenu" data-toggle="collapse">
        <i class="fa fa-building-o fa-lg icon-right"></i>
        Stages
    </a>
    <ul id="stagesList" class="nav collapse submenu">
        <li>
            <?php

                if($_SESSION['typeUtilisateur'] == 'Etudiant')
                {
                    echo('<a href="creerStage.php">Création</a>');
                }
                else
                {
                    echo('<a href="gererStage.php">Validations</a>');
                }

            ?>
        </li>
        <li>
            <?php

                if($_SESSION['typeUtilisateur'] == 'Etudiant')
                {
                    echo('<a href="gererMonStage.php">Gestion</a>');
                }
                else
                {
                    echo('<a href="gestionPeriode.php">Périodes</a>');
                }

            ?>
        </li>
        <?php

            if($_SESSION['typeUtilisateur'] == 'Enseignant')
            {
                echo('<li>');
                echo('<a href="syntheseStage.php">Synthèse</a>');
                echo('</li>');
            }
        ?>
    </ul>
</li>
